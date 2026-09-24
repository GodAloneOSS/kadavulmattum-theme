<?php
/**
 * ரமலான் கால்குலேட்டர் (Ramadan Calculator) — Tamil port of godalone.in's
 * /ramadan-calculator/ page. Finds the First Fasting Day, Last Fasting Day,
 * the start of the last 10 blessed nights, and the Night of Destiny (Laylat
 * al-Qadr) for any place on Earth, for a chosen Gregorian year.
 *
 * Method: the astronomical New Moon (lunar conjunction) nearest the start
 * of Ramadan is located using the standard published lunation algorithm
 * (Jean Meeus, "Astronomical Algorithms", ch. 49 — accurate to within a
 * couple of minutes). The first LOCAL sunset after that New Moon marks the
 * start of the new Hijri month (Islamic days run sunset-to-sunset), so the
 * following Gregorian day is the first day of fasting. The same logic
 * applied to the *next* New Moon (marking the start of Shawwal) gives the
 * last day of Ramadan. Sunset itself is computed with the same solar-
 * position formulas used on the Salat & Ramadan Timing page — this is the
 * exact same math already verified live on godalone.in/ramadan-calculator/,
 * only the visible UI strings below are translated into Tamil.
 *
 * IMPORTANT: the New-Moon/sunset instants are astronomical (UTC) instants;
 * the *calendar date* on which each sunset falls must be read in the
 * place's own local timezone (localDateOnly()), not in UTC — otherwise
 * locations west of Greenwich (the Americas, etc.) come out a day late.
 * The "Begin the 10 Blessed Nights" date is 10 days before the Last
 * Fasting Day (not a fixed +18 from the First Fasting Day), because
 * Ramadan can run 29 or 30 days depending on where the two New Moons'
 * sunsets fall locally.
 *
 * Fully self-contained: markup + scoped <style> + inline <script>, matching
 * this theme's convention for page-specific interactive templates.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>
<div class="page-hero">
  <div class="wrap">
    <div class="crumb">Kadavulmattum.org</div>
    <h1 class="reveal">🌙 ரமலான் கால்குலேட்டர்</h1>
    <p class="reveal rc-sub">பூமியில் எந்த இடத்திற்கும் இந்த ஆண்டின் ரமலான் தேதிகளைக் கண்டறியவும் — நிலவிலிருந்து கணக்கிடப்படுகிறது, இன்ஷா அல்லாஹ்.</p>
  </div>
</div>

<section class="blk rc-sec">
  <div class="wrap">

    <div class="rc-card reveal">
      <label class="rc-label" for="rcPlace">இடத்தின் பெயரை உள்ளிடவும்</label>
      <div class="rc-inputwrap">
        <input type="text" id="rcPlace" class="rc-input" placeholder="எ.கா. சென்னை, மக்கா, லண்டன்..." autocomplete="off" />
      </div>

      <label class="rc-label rc-label-year" for="rcYear">ஆண்டைத் தேர்ந்தெடுக்கவும்</label>
      <select id="rcYear" class="rc-select"></select>

      <div class="rc-btnrow">
        <button type="button" id="rcFind" class="btn btn-gold">🌙 ரமலான் தேதிகளைக் கணக்கிடு</button>
        <button type="button" id="rcLocate" class="btn btn-ghost">📍 எனது இருப்பிடத்தைப் பயன்படுத்து</button>
      </div>
      <div id="rcMsg" class="rc-msg" hidden></div>
      <div id="rcSuggestions" class="rc-suggestions" hidden></div>
    </div>

    <div id="rcResults" class="rc-results" hidden>

      <div class="rc-place-line reveal">
        <div class="rc-place-name" id="rcPlaceName">—</div>
        <div class="rc-place-meta" id="rcPlaceMeta">—</div>
      </div>

      <h2 class="rc-heading reveal" id="rcHeading">—</h2>

      <div class="grid rc-grid reveal">
        <div class="card rc-stat">
          <div class="rc-stat-icon">🌙</div>
          <div class="rc-stat-label">முதல் நோன்பு நாள்</div>
          <div class="rc-stat-val" id="rcFirstDay">—</div>
        </div>
        <div class="card rc-stat">
          <div class="rc-stat-icon">🌗</div>
          <div class="rc-stat-label">கடைசி நோன்பு நாள்</div>
          <div class="rc-stat-val" id="rcLastDay">—</div>
        </div>
        <div class="card rc-stat">
          <div class="rc-stat-icon">✨</div>
          <div class="rc-stat-label">10 அருள் இரவுகள் தொடக்கம்</div>
          <div class="rc-stat-val" id="rcTenNights">—</div>
        </div>
        <div class="card rc-stat rc-stat-special">
          <div class="rc-stat-icon">🌟</div>
          <div class="rc-stat-label">விதியின் இரவு</div>
          <div class="rc-stat-val" id="rcNightOfDestiny">—</div>
        </div>
      </div>

      <div class="rc-calc reveal">
        <h3 class="rc-calc-title">ℹ️ இந்த தேதிகள் எவ்வாறு கணக்கிடப்பட்டன</h3>
        <div class="rc-calc-grid">
          <div class="rc-calc-block">
            <div class="rc-calc-block-title">🌑 ரமலானின் அமாவாசை</div>
            <div class="rc-calc-row"><span>அமாவாசை (UTC)</span><strong id="rcCalcRamUtc">—</strong></div>
            <div class="rc-calc-row"><span>உங்கள் உள்ளூர் நேரம்</span><strong id="rcCalcRamLocal">—</strong></div>
            <div class="rc-calc-row"><span>அடுத்த சூரிய அஸ்தமனம்</span><strong id="rcCalcRamSunset">—</strong></div>
          </div>
          <div class="rc-calc-block">
            <div class="rc-calc-block-title">🌑 ஷவ்வாலின் அமாவாசை</div>
            <div class="rc-calc-row"><span>அமாவாசை (UTC)</span><strong id="rcCalcShaUtc">—</strong></div>
            <div class="rc-calc-row"><span>உங்கள் உள்ளூர் நேரம்</span><strong id="rcCalcShaLocal">—</strong></div>
            <div class="rc-calc-row"><span>அடுத்த சூரிய அஸ்தமனம்</span><strong id="rcCalcShaSunset">—</strong></div>
          </div>
        </div>
        <p class="rc-calc-note">இஸ்லாமிய நாட்கள் சூரிய அஸ்தமனத்தில் தொடங்குகின்றன — எனவே ஒவ்வொரு அமாவாசைக்குப் பின்னரான சூரிய அஸ்தமனத்திற்குப் பின் வரும் முதல் முழு நாள் புதிய மாதத்தின் முதல் நாளாகும்.</p>
      </div>

      <div class="rc-cta reveal">
        <a href="<?php echo esc_url(home_url('/salat-timing')); ?>" class="btn btn-ghost">🕌 தொழுகை மற்றும் ரமலான் நேரத்திற்குச் செல்க</a>
      </div>

    </div>

  </div>
</section>

<div class="verse">
  <div class="q">&#8220;</div>
  <blockquote>குர்ஆன் மனிதர்களுக்கு வழிகாட்டியாகவும், தெளிவான போதனைகளாகவும், சட்டநூலாகவும் அருளப்பட்ட மாதம் ரமலான். இந்த மாதத்தைக் காணும் உங்களில் எவரும் அதில் நோன்பு நோற்கவும். நோயாளியோ அல்லது பயணத்திலோ இருப்பவர் மற்ற நாட்களில் அதே எண்ணிக்கையை ஈடுசெய்யலாம். கடவுள் உங்களுக்கு எளிமையை விரும்புகிறான், கடினத்தை அல்ல — நீங்கள் உங்கள் கடமைகளை நிறைவேற்றவும், உங்களுக்கு வழிகாட்டியதற்காக கடவுளை மகிமைப்படுத்தவும், நன்றி செலுத்தவும் வேண்டும் என்பதற்காக.</blockquote>
  <cite>குர்ஆன் 2:185</cite>
</div>

<p class="rc-disclaimer">குறிப்பு: இந்தத் தேதிகள் நீங்கள் வழங்கும் இடத்திற்கான துல்லியமான வானியல் அமாவாசை மற்றும் சூரிய அஸ்தமன சூத்திரங்களைப் பயன்படுத்தி கணக்கிடப்படுகின்றன. ஏதேனும் பிழை கண்டால், தயவுசெய்து <a href="<?php echo esc_url(home_url('/contact')); ?>">எங்களைத் தொடர்பு கொள்ளவும்</a>.</p>

<style>
.rc-sub{max-width:640px;margin:14px auto 0;color:var(--ink-soft);font-size:clamp(15px,2vw,17.5px)}
.rc-sec{padding-top:56px}

.rc-card{max-width:640px;margin:0 auto 32px;padding:32px 30px;border-radius:var(--radius-lg);
  background:linear-gradient(180deg,var(--panel),var(--panel-2));border:1px solid var(--line);box-shadow:var(--shadow-sm)}
.rc-label{display:block;font-family:var(--font-display);font-size:14px;letter-spacing:.04em;
  text-transform:uppercase;color:var(--muted);margin-bottom:10px}
.rc-label-year{margin-top:18px}
.rc-inputwrap{margin-bottom:0}
.rc-input,.rc-select{width:100%;box-sizing:border-box;padding:14px 16px;border-radius:12px;border:1px solid var(--line);
  background:var(--bg-3);color:var(--ink);font-size:16px;font-family:var(--font-body)}
.rc-select{padding:12px 16px;font-size:15px;cursor:pointer}
.rc-input:focus,.rc-select:focus{outline:2px solid var(--gold);outline-offset:1px}
.rc-input.err{animation:rcshake .35s}
@keyframes rcshake{0%,100%{transform:translateX(0)}25%{transform:translateX(-6px)}75%{transform:translateX(6px)}}
.rc-btnrow{display:flex;gap:12px;flex-wrap:wrap;margin-top:22px}
.rc-btnrow .btn{flex:1 1 200px}
.rc-msg{margin-top:14px;padding:12px 14px;border-radius:10px;font-size:14.5px;
  background:rgba(248,113,113,.1);border:1px solid rgba(248,113,113,.35);color:#f87171}
.rc-msg.rc-msg-loading{background:rgba(34,197,94,.1);border-color:rgba(34,197,94,.35);color:var(--ink-soft)}
.rc-suggestions{margin-top:14px;display:flex;flex-direction:column;gap:8px}
.rc-suggestion{text-align:left;padding:12px 14px;border-radius:10px;border:1px solid var(--line);
  background:var(--bg-3);color:var(--ink);cursor:pointer;font-family:var(--font-body);font-size:15px}
.rc-suggestion:hover{border-color:var(--gold);background:rgba(34,197,94,.08)}
.rc-suggestion small{display:block;color:var(--muted);margin-top:2px;font-size:13px}

.rc-results{max-width:900px;margin:0 auto}
.rc-place-line{text-align:center;margin-bottom:6px}
.rc-place-name{font-family:var(--font-display);font-size:clamp(20px,3vw,26px);color:var(--ink)}
.rc-place-meta{color:var(--muted);font-size:14px;margin-top:4px}
.rc-heading{text-align:center;font-family:var(--font-display);font-size:clamp(19px,2.8vw,24px);
  color:var(--gold-bright);margin:18px 0 28px}

.rc-grid{grid-template-columns:repeat(4,1fr);gap:16px;margin-bottom:32px}
@media (max-width:860px){.rc-grid{grid-template-columns:repeat(2,1fr)}}
@media (max-width:480px){.rc-grid{grid-template-columns:1fr}}
.rc-stat{padding:26px 18px;text-align:center;border:1px solid var(--line);transition:transform .25s ease,box-shadow .25s ease}
.rc-stat:hover{transform:translateY(-3px);box-shadow:var(--shadow-sm)}
.rc-stat-icon{font-size:30px;margin-bottom:10px}
.rc-stat-label{font-family:var(--font-display);font-size:13px;color:var(--ink-soft);margin-bottom:10px;letter-spacing:.01em}
.rc-stat-val{font-variant-numeric:tabular-nums;font-weight:700;font-size:clamp(15px,2vw,17.5px);color:var(--ink)}
.rc-stat-special{background:linear-gradient(180deg,rgba(212,175,55,.16),var(--panel-2));
  border-color:rgba(212,175,55,.45);box-shadow:0 0 0 1px rgba(212,175,55,.2) inset}
.rc-stat-special .rc-stat-val{color:var(--gold-bright)}

.rc-calc{max-width:760px;margin:0 auto 30px;padding:26px 28px;border-radius:var(--radius-lg);
  background:var(--panel-2);border:1px solid var(--line)}
.rc-calc-title{font-family:var(--font-display);font-size:15.5px;color:var(--ink);margin:0 0 18px;text-align:center;font-weight:600}
.rc-calc-grid{display:grid;grid-template-columns:1fr 1fr;gap:20px}
@media (max-width:600px){.rc-calc-grid{grid-template-columns:1fr}}
.rc-calc-block{padding:16px 18px;border-radius:12px;background:var(--bg-3);border:1px solid var(--line)}
.rc-calc-block-title{font-family:var(--font-display);font-size:13.5px;color:var(--gold-bright);margin-bottom:12px;font-weight:600}
.rc-calc-row{display:flex;justify-content:space-between;align-items:baseline;gap:10px;padding:6px 0;
  font-size:13px;color:var(--ink-soft);border-top:1px solid var(--line)}
.rc-calc-row:first-of-type{border-top:none}
.rc-calc-row strong{color:var(--ink);font-weight:600;text-align:right;font-variant-numeric:tabular-nums}
.rc-calc-note{margin:18px 0 0;text-align:center;color:var(--muted);font-size:13px;line-height:1.6}

.rc-cta{text-align:center}

.rc-disclaimer{max-width:640px;margin:26px auto 48px;padding:0 20px;color:var(--muted);
  font-size:12px;line-height:1.6;text-align:center}
.rc-disclaimer a{color:var(--gold-bright);text-decoration:underline}
</style>

<script>
(function () {
  "use strict";

  // ---------- Shared solar-position math (see Salat & Ramadan Timing page) ----------
  // Identical, verified logic already live on godalone.in/ramadan-calculator/ — only the
  // visible UI strings below are translated into Tamil.

  function deg2rad(d) { return d * Math.PI / 180; }
  function rad2deg(r) { return r * 180 / Math.PI; }
  function norm360(x) { x = x % 360; return x < 0 ? x + 360 : x; }

  function julianDay(y, m, d) {
    if (m <= 2) { y -= 1; m += 12; }
    var A = Math.floor(y / 100);
    var B = 2 - A + Math.floor(A / 4);
    return Math.floor(365.25 * (y + 4716)) + Math.floor(30.6001 * (m + 1)) + d + B - 1524.5;
  }

  function sunPosition(jd) {
    var T = (jd - 2451545.0) / 36525.0;
    var L0 = norm360(280.46646 + 36000.76983 * T + 0.0003032 * T * T);
    var M = norm360(357.52911 + 35999.05029 * T - 0.0001537 * T * T);
    var e = 0.016708634 - 0.000042037 * T - 0.0000001267 * T * T;
    var Mrad = deg2rad(M);
    var C = (1.914602 - 0.004817 * T - 0.000014 * T * T) * Math.sin(Mrad)
          + (0.019993 - 0.000101 * T) * Math.sin(2 * Mrad)
          + 0.000289 * Math.sin(3 * Mrad);
    var trueLong = L0 + C;
    var omega = 125.04 - 1934.136 * T;
    var appLong = trueLong - 0.00569 - 0.00478 * Math.sin(deg2rad(omega));
    var eps0 = 23 + (26 + (21.448 - T * (46.815 + T * (0.00059 - T * 0.001813))) / 60) / 60;
    var eps = eps0 + 0.00256 * Math.cos(deg2rad(omega));
    var decl = rad2deg(Math.asin(Math.sin(deg2rad(eps)) * Math.sin(deg2rad(appLong))));
    var y = Math.pow(Math.tan(deg2rad(eps) / 2), 2);
    var eqTimeMin = 4 * rad2deg(
      y * Math.sin(2 * deg2rad(L0)) - 2 * e * Math.sin(Mrad)
      + 4 * e * y * Math.sin(Mrad) * Math.cos(2 * deg2rad(L0))
      - 0.5 * y * y * Math.sin(4 * deg2rad(L0)) - 1.25 * e * e * Math.sin(2 * Mrad)
    );
    return { decl: decl, eqTimeMin: eqTimeMin };
  }

  function hourAngle(lat, decl, angle) {
    var latR = deg2rad(lat), declR = deg2rad(decl);
    var cosH = (-Math.sin(deg2rad(angle)) - Math.sin(latR) * Math.sin(declR)) / (Math.cos(latR) * Math.cos(declR));
    if (cosH < -1 || cosH > 1 || isNaN(cosH)) return null;
    return rad2deg(Math.acos(cosH));
  }

  function sunsetUT(y, m, d, lat, lng) {
    var jd = julianDay(y, m, d) + 0.5 - lng / 360;
    var pos = sunPosition(jd);
    var solarNoonUT = 12 - lng / 15 - pos.eqTimeMin / 60;
    var ha = hourAngle(lat, pos.decl, 0.833);
    return ha === null ? null : solarNoonUT + ha / 15;
  }

  function utHourToDate(y, m, d, utHours) {
    return new Date(Date.UTC(y, m - 1, d, 0, 0, 0) + utHours * 3600 * 1000);
  }

  // ---------- New Moon (lunar conjunction) — Meeus' published algorithm ----------

  function sinD(d) { return Math.sin(deg2rad(d)); }

  function newMoonJDE(k) {
    var T = k / 1236.85, T2 = T * T, T3 = T2 * T, T4 = T3 * T;
    var JDE = 2451550.09766 + 29.530588861 * k + 0.00015437 * T2 - 0.000000150 * T3 + 0.00000000073 * T4;
    var E = 1 - 0.002516 * T - 0.0000074 * T2;
    var M = norm360(2.5534 + 29.10535669 * k - 0.0000014 * T2 - 0.00000011 * T3);
    var Mp = norm360(201.5643 + 385.81693528 * k + 0.0107582 * T2 + 0.00001238 * T3 - 0.000000058 * T4);
    var F = norm360(160.7108 + 390.67050284 * k - 0.0016118 * T2 - 0.00000227 * T3 + 0.000000011 * T4);
    var Omega = norm360(124.7746 - 1.56375588 * k + 0.0020672 * T2 + 0.00000215 * T3);

    var corr =
        -0.40720 * sinD(Mp) + 0.17241 * E * sinD(M) + 0.01608 * sinD(2 * Mp) + 0.01039 * sinD(2 * F)
      + 0.00739 * E * sinD(Mp - M) - 0.00514 * E * sinD(Mp + M) + 0.00208 * E * E * sinD(2 * M)
      - 0.00111 * sinD(Mp - 2 * F) - 0.00057 * sinD(Mp + 2 * F) + 0.00056 * E * sinD(2 * Mp + M)
      - 0.00042 * sinD(3 * Mp) + 0.00042 * E * sinD(M + 2 * F) + 0.00038 * E * sinD(M - 2 * F)
      - 0.00024 * E * sinD(2 * Mp - M) - 0.00017 * sinD(Omega) - 0.00007 * sinD(Mp + 2 * M)
      + 0.00004 * sinD(2 * Mp - 2 * F) + 0.00004 * sinD(3 * M) + 0.00003 * sinD(Mp + M - 2 * F)
      + 0.00003 * sinD(2 * Mp + 2 * F) - 0.00003 * sinD(Mp + M + 2 * F) + 0.00003 * sinD(Mp - M + 2 * F)
      - 0.00002 * sinD(Mp - M - 2 * F) - 0.00002 * sinD(3 * Mp + M) + 0.00002 * sinD(4 * Mp);

    var A1 = norm360(299.77 + 0.107408 * k - 0.009173 * T2);
    var A2 = norm360(251.88 + 0.016321 * k);
    var A3 = norm360(251.83 + 26.651886 * k);
    var A4 = norm360(349.42 + 36.412478 * k);
    var A5 = norm360(84.66 + 18.206239 * k);
    var A6 = norm360(141.74 + 53.303771 * k);
    var A7 = norm360(207.14 + 2.453732 * k);
    var A8 = norm360(154.84 + 7.306860 * k);
    var A9 = norm360(34.52 + 27.261239 * k);
    var A10 = norm360(207.19 + 0.121824 * k);
    var A11 = norm360(291.34 + 1.844379 * k);
    var A12 = norm360(161.72 + 24.198154 * k);
    var A13 = norm360(239.56 + 25.513099 * k);
    var A14 = norm360(331.55 + 3.592518 * k);

    var additional =
        0.000325 * sinD(A1) + 0.000165 * sinD(A2) + 0.000164 * sinD(A3) + 0.000126 * sinD(A4)
      + 0.000110 * sinD(A5) + 0.000062 * sinD(A6) + 0.000060 * sinD(A7) + 0.000056 * sinD(A8)
      + 0.000047 * sinD(A9) + 0.000042 * sinD(A10) + 0.000040 * sinD(A11) + 0.000037 * sinD(A12)
      + 0.000035 * sinD(A13) + 0.000023 * sinD(A14);

    return JDE + corr + additional;
  }

  function jdeToDate(jde) { return new Date((jde - 2440587.5) * 86400000); }

  // lunation k such that newMoonJDE(k) is the New Moon marking the start of
  // Ramadan for the given Gregorian target year. Ramadan starts are always
  // exactly 12 lunations apart (a Hijri year is always 12 lunar months), so
  // a single validated reference point lets us reach any other year.
  var K_REF = 335, GREG_YEAR_REF = 2027; // validated: k=335 -> New Moon 2027-02-06, First Fasting Day 2027-02-08

  function findRamadanStartK(targetYear) {
    var n = Math.round((targetYear - GREG_YEAR_REF) * 0.97014);
    var k = K_REF + 12 * n;
    for (var tries = 0; tries < 8; tries++) {
      var nmYear = jdeToDate(newMoonJDE(k)).getUTCFullYear();
      if (nmYear === targetYear) break;
      k += (nmYear < targetYear) ? 12 : -12;
    }
    return k;
  }

  // ---------- Approximate (tabular/calculated) Hijri date, for the heading ----------

  function gregorianToHijri(y, m, d) {
    var jd = julianDay(y, m, d);
    var jdn = Math.floor(jd + 0.5);
    var l = jdn - 1948440 + 10632;
    var n = Math.floor((l - 1) / 10631);
    l = l - 10631 * n + 354;
    var j = Math.floor((10985 - l) / 5316) * Math.floor((50 * l) / 17719) + Math.floor(l / 5670) * Math.floor((43 * l) / 15238);
    l = l - Math.floor((30 - j) / 15) * Math.floor((17719 * j) / 50) - Math.floor(j / 16) * Math.floor((15238 * j) / 43) + 29;
    var year = 30 * n + j - 30;
    return { year: year };
  }

  // "next sunset strictly after `instant`" at lat/lng — returns a Date, or
  // null if sunset is not astronomically defined there for several days
  // (extreme latitude in summer).
  function nextSunsetAfter(instant, lat, lng) {
    var y = instant.getUTCFullYear(), m = instant.getUTCMonth() + 1, d = instant.getUTCDate();
    for (var i = 0; i < 4; i++) {
      var ut = sunsetUT(y, m, d, lat, lng);
      if (ut !== null) {
        var sunsetInstant = utHourToDate(y, m, d, ut);
        if (sunsetInstant.getTime() > instant.getTime()) return sunsetInstant;
      }
      var next = new Date(Date.UTC(y, m - 1, d + 1));
      y = next.getUTCFullYear(); m = next.getUTCMonth() + 1; d = next.getUTCDate();
    }
    return null;
  }

  // "which LOCAL calendar date (in timezone tz) does this instant fall on" —
  // returns a Date at UTC-midnight standing in for that calendar date. This
  // must be timezone-aware: for places west of Greenwich, an instant's UTC
  // calendar date is a day AHEAD of its local calendar date (e.g. 6pm local
  // in Los Angeles, UTC-8, is already the next UTC day), so reading the date
  // from UTC fields would misdate the Islamic day by one day for those places.
  function localDateParts(instant, tz) {
    var parts = new Intl.DateTimeFormat("en-CA", { timeZone: tz, year: "numeric", month: "2-digit", day: "2-digit" }).formatToParts(instant);
    var y, m, d;
    for (var i = 0; i < parts.length; i++) {
      if (parts[i].type === "year") y = parseInt(parts[i].value, 10);
      else if (parts[i].type === "month") m = parseInt(parts[i].value, 10);
      else if (parts[i].type === "day") d = parseInt(parts[i].value, 10);
    }
    return { y: y, m: m, d: d };
  }
  function localDateOnly(instant, tz) {
    var p = localDateParts(instant, tz);
    return new Date(Date.UTC(p.y, p.m - 1, p.d));
  }
  function addDays(d, n) { return new Date(d.getTime() + n * 86400000); }

  function formatDate(d, tz) {
    return new Intl.DateTimeFormat("en-US", { timeZone: tz, weekday: "short", year: "numeric", month: "short", day: "numeric" }).format(d);
  }
  function formatDateTime(d, tz) {
    return new Intl.DateTimeFormat("en-US", { timeZone: tz, year: "numeric", month: "short", day: "numeric", hour: "numeric", minute: "2-digit", hour12: true }).format(d);
  }

  // ---------- UI wiring ----------

  var placeInput = document.getElementById("rcPlace");
  var yearSelect = document.getElementById("rcYear");
  var findBtn = document.getElementById("rcFind");
  var locateBtn = document.getElementById("rcLocate");
  var msgBox = document.getElementById("rcMsg");
  var suggestBox = document.getElementById("rcSuggestions");
  var resultsBox = document.getElementById("rcResults");
  var placeNameEl = document.getElementById("rcPlaceName");
  var placeMetaEl = document.getElementById("rcPlaceMeta");
  var headingEl = document.getElementById("rcHeading");
  var firstDayEl = document.getElementById("rcFirstDay");
  var lastDayEl = document.getElementById("rcLastDay");
  var tenNightsEl = document.getElementById("rcTenNights");
  var nightOfDestinyEl = document.getElementById("rcNightOfDestiny");
  var calcRamUtcEl = document.getElementById("rcCalcRamUtc");
  var calcRamLocalEl = document.getElementById("rcCalcRamLocal");
  var calcRamSunsetEl = document.getElementById("rcCalcRamSunset");
  var calcShaUtcEl = document.getElementById("rcCalcShaUtc");
  var calcShaLocalEl = document.getElementById("rcCalcShaLocal");
  var calcShaSunsetEl = document.getElementById("rcCalcShaSunset");

  var current = null; // {lat, lng, tz, label}

  // populate year select: this year through +6, defaulting to the next
  // Ramadan that has not yet started (using the visitor's own browser
  // timezone for "today", and Mecca's timezone for the moon/sunset estimate)
  (function initYears() {
    var nowInstant = new Date();
    var browserTz = Intl.DateTimeFormat().resolvedOptions().timeZone || "UTC";
    var thisYear = localDateParts(nowInstant, browserTz).y;
    var defaultYear = thisYear;
    var startK = findRamadanStartK(thisYear);
    var startDate = jdeToDate(newMoonJDE(startK));
    var sunsetAfter = nextSunsetAfter(startDate, 21.4225, 39.8262); // Mecca proxy, just to pick a sensible default year
    var firstDayThisYear = sunsetAfter ? addDays(localDateOnly(sunsetAfter, "Asia/Riyadh"), 1) : null;
    var todayLocal = localDateOnly(nowInstant, browserTz);
    if (firstDayThisYear && firstDayThisYear.getTime() < todayLocal.getTime()) {
      defaultYear = thisYear + 1;
    }
    for (var y = thisYear - 1; y <= thisYear + 6; y++) {
      var opt = document.createElement("option");
      opt.value = String(y);
      opt.textContent = String(y);
      if (y === defaultYear) opt.selected = true;
      yearSelect.appendChild(opt);
    }
  })();

  function showMsg(text, loading) {
    msgBox.hidden = false;
    msgBox.textContent = text;
    msgBox.classList.toggle("rc-msg-loading", !!loading);
  }
  function hideMsg() { msgBox.hidden = true; }
  function hideSuggestions() { suggestBox.hidden = true; suggestBox.innerHTML = ""; }

  function saveLast(place) {
    try { localStorage.setItem("rc_last_place_km", JSON.stringify(place)); } catch (e) {}
  }
  function loadLast() {
    try {
      var raw = localStorage.getItem("rc_last_place_km");
      return raw ? JSON.parse(raw) : null;
    } catch (e) { return null; }
  }

  async function geocode(query) {
    var url = "https://geocoding-api.open-meteo.com/v1/search?name=" + encodeURIComponent(query) + "&count=6&language=en&format=json";
    var res = await fetch(url);
    if (!res.ok) throw new Error("network");
    var data = await res.json();
    return (data && data.results) ? data.results : [];
  }

  function resultLabel(r) {
    var bits = [r.name];
    if (r.admin1 && r.admin1 !== r.name) bits.push(r.admin1);
    if (r.country) bits.push(r.country);
    return bits.join(", ");
  }

  function pickPlace(r) {
    hideSuggestions();
    hideMsg();
    var place = { lat: r.latitude, lng: r.longitude, tz: r.timezone || "UTC", label: resultLabel(r) };
    current = place;
    saveLast(place);
    placeInput.value = r.name;
    render();
  }

  async function handleFind() {
    var q = placeInput.value.trim();
    if (!q) {
      placeInput.classList.remove("err"); void placeInput.offsetWidth; placeInput.classList.add("err");
      placeInput.focus();
      setTimeout(function () { placeInput.classList.remove("err"); }, 350);
      return;
    }
    hideSuggestions();
    showMsg("“" + q + "”-ஐத் தேடுகிறது…", true);
    try {
      var results = await geocode(q);
      if (!results.length) {
        showMsg("இடம் கிடைக்கவில்லை. வேறு எழுத்துப்பிழையை முயற்சிக்கவும், அல்லது நாட்டைச் சேர்க்கவும் (எ.கா. “Springfield, USA”).");
        return;
      }
      hideMsg();
      if (results.length === 1) {
        pickPlace(results[0]);
      } else {
        suggestBox.hidden = false;
        suggestBox.innerHTML = "";
        results.forEach(function (r) {
          var btn = document.createElement("button");
          btn.type = "button";
          btn.className = "rc-suggestion";
          btn.innerHTML = resultLabel(r) + "<small>" + r.latitude.toFixed(2) + "°, " + r.longitude.toFixed(2) + "° · " + (r.timezone || "") + "</small>";
          btn.addEventListener("click", function () { pickPlace(r); });
          suggestBox.appendChild(btn);
        });
      }
    } catch (e) {
      showMsg("இட தேடல் சேவையை அடைய முடியவில்லை. உங்கள் இணைப்பைச் சரிபார்த்து மீண்டும் முயற்சிக்கவும்.");
    }
  }

  function handleLocate() {
    if (!navigator.geolocation) {
      showMsg("உங்கள் உலாவி இருப்பிட தேடலை ஆதரிக்கவில்லை — தயவுசெய்து ஒரு இடத்தின் பெயரை உள்ளிடவும்.");
      return;
    }
    showMsg("உங்கள் தற்போதைய இருப்பிடத்தைப் பெறுகிறது…", true);
    navigator.geolocation.getCurrentPosition(function (pos) {
      hideMsg();
      var tz = Intl.DateTimeFormat().resolvedOptions().timeZone || "UTC";
      var place = { lat: pos.coords.latitude, lng: pos.coords.longitude, tz: tz, label: "உங்கள் தற்போதைய இருப்பிடம்" };
      current = place;
      saveLast(place);
      placeInput.value = "";
      render();
    }, function () {
      showMsg("உங்கள் இருப்பிடத்தைப் பெற முடியவில்லை — இருப்பிட அணுகலை அனுமதிக்கவும், அல்லது ஒரு இடத்தின் பெயரை உள்ளிடவும்.");
    }, { timeout: 10000 });
  }

  function render() {
    if (!current) return;
    var year = parseInt(yearSelect.value, 10);

    var kRamadan = findRamadanStartK(year);
    var kShawwal = kRamadan + 1;
    var nmRamadan = jdeToDate(newMoonJDE(kRamadan));
    var nmShawwal = jdeToDate(newMoonJDE(kShawwal));

    var sunsetR = nextSunsetAfter(nmRamadan, current.lat, current.lng);
    var sunsetS = nextSunsetAfter(nmShawwal, current.lat, current.lng);

    if (!sunsetR || !sunsetS) {
      showMsg("இந்த இடத்தில் ஆண்டின் சில பகுதிகளில் சூரிய அஸ்தமனம் வானியல் ரீதியாக வரையறுக்கப்படவில்லை (மிக அதிக அட்சரேகை) — முடிவுகள் நம்பகத்தன்மை குறைவாக இருக்கலாம். மிதமான அட்சரேகையில் உள்ள அருகிலுள்ள நகரத்தை முயற்சிக்கவும்.");
    } else {
      hideMsg();
    }

    // Calendar dates must be read in the PLACE's own local timezone, not UTC
    // — see the localDateOnly() note above.
    var firstFastingDay = sunsetR ? addDays(localDateOnly(sunsetR, current.tz), 1) : null;
    var lastFastingDay = sunsetS ? localDateOnly(sunsetS, current.tz) : null;
    // The last 10 nights are always the 10 nights immediately before the end
    // of Ramadan — counted from the LAST day, not a fixed +18 from the first,
    // because Ramadan can be 29 or 30 days depending on where the two New
    // Moons' local sunsets fall.
    var beginTenNights = lastFastingDay ? addDays(lastFastingDay, -10) : null;
    var nightOfDestiny = firstFastingDay ? addDays(firstFastingDay, 25) : null;

    placeNameEl.textContent = "📍 " + current.label;
    placeMetaEl.textContent = current.lat.toFixed(3) + "°, " + current.lng.toFixed(3) + "° · " + (current.tz || "");

    var hijriYear = firstFastingDay ? gregorianToHijri(firstFastingDay.getUTCFullYear(), firstFastingDay.getUTCMonth() + 1, firstFastingDay.getUTCDate()).year : null;
    headingEl.textContent = "ரமலான் " + (hijriYear ? hijriYear + " ஹிஜ்ரி " : "") + "(" + year + ")";

    firstDayEl.textContent = firstFastingDay ? formatDate(firstFastingDay, "UTC") : "—";
    lastDayEl.textContent = lastFastingDay ? formatDate(lastFastingDay, "UTC") : "—";
    tenNightsEl.textContent = beginTenNights ? formatDate(beginTenNights, "UTC") : "—";
    nightOfDestinyEl.textContent = nightOfDestiny ? formatDate(nightOfDestiny, "UTC") : "—";

    if (sunsetR) {
      calcRamUtcEl.textContent = formatDateTime(nmRamadan, "UTC");
      calcRamLocalEl.textContent = formatDateTime(nmRamadan, current.tz);
      calcRamSunsetEl.textContent = formatDateTime(sunsetR, current.tz);
    } else {
      calcRamUtcEl.textContent = calcRamLocalEl.textContent = calcRamSunsetEl.textContent = "—";
    }
    if (sunsetS) {
      calcShaUtcEl.textContent = formatDateTime(nmShawwal, "UTC");
      calcShaLocalEl.textContent = formatDateTime(nmShawwal, current.tz);
      calcShaSunsetEl.textContent = formatDateTime(sunsetS, current.tz);
    } else {
      calcShaUtcEl.textContent = calcShaLocalEl.textContent = calcShaSunsetEl.textContent = "—";
    }

    resultsBox.hidden = false;
  }

  findBtn.addEventListener("click", handleFind);
  locateBtn.addEventListener("click", handleLocate);
  placeInput.addEventListener("keydown", function (e) { if (e.key === "Enter") handleFind(); });
  yearSelect.addEventListener("change", function () { if (current) render(); });

  var last = loadLast();
  if (last && typeof last.lat === "number" && typeof last.lng === "number") {
    current = last;
    placeInput.value = last.label === "உங்கள் தற்போதைய இருப்பிடம்" ? "" : (last.label.split(",")[0] || "");
    render();
  }
})();
</script>

<?php get_footer(); ?>
