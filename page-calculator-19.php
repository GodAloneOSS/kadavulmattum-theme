<?php
/**
 * 19 Calculator (Tamil) — checks whether any number (however long) is
 * divisible by 19, the number at the heart of the Quran's mathematical
 * structure (Quran 74:30). Routed via the rewrite rule added in
 * functions.php (no WP Page exists for this slug). Fully self-contained:
 * markup + scoped <style> + inline <script>, matching this theme's
 * convention for page-specific interactive templates (same pattern as
 * godalone.in's own page-calculator-19.php).
 */
if (!defined('ABSPATH')) exit;
get_header();
?>
<div class="page-hero">
  <div class="wrap">
    <div class="crumb">Kadavulmattum.org</div>
    <h1 class="reveal">🔢 19 கால்குலேட்டர்</h1>
    <p class="reveal c19-sub">பெரிய எண்களை 19 ஆல் வகுத்துப் பார்க்கும் நடைமுறை கால்குலேட்டர் — எத்தனை நீளமான எண்ணாக இருந்தாலும், அது 19 ஆல் வகுபடுகிறதா என உடனடியாக சரிபார்க்கும்.</p>
  </div>
</div>

<section class="blk c19-sec">
  <div class="wrap">

    <div class="c19-card reveal">
      <label class="c19-label" for="c19Input">எண்ணை உள்ளிடவும்</label>
      <div class="c19-inputwrap">
        <input type="text" inputmode="numeric" autocomplete="off" spellcheck="false" id="c19Input" class="c19-input" placeholder="எ.கா. 2698" aria-describedby="c19Hint">
        <span class="c19-hint" id="c19Hint">÷ 19</span>
      </div>
      <div class="c19-actions">
        <button type="button" id="c19Calc" class="btn btn-gold">🧮 கணக்கிடு</button>
        <button type="button" id="c19Clear" class="btn btn-ghost">🗑️ அழி</button>
      </div>
      <div class="c19-result" id="c19Result" hidden></div>
    </div>

    <div class="grid grid-2 c19-info">
      <div class="card c19-howto reveal">
        <h3>ℹ️ எவ்வாறு பயன்படுத்துவது?</h3>
        <ol>
          <li>கணக்கிட விரும்பும் எண்ணை உள்ளிடவும்</li>
          <li>"கணக்கிடு" பொத்தானை அழுத்தவும்</li>
          <li>பச்சை (வகுபடும்) அல்லது சிவப்பு (வகுபடாது) நிறத்தில் முடிவைக் காணவும்</li>
          <li>புதிய கணக்கீட்டிற்கு "அழி" பொத்தானைப் பயன்படுத்தவும்</li>
        </ol>
      </div>
      <div class="card c19-examples reveal">
        <h3>💡 உதாரண கணக்கீடுகள்</h3>
        <div class="c19-ex-list" id="c19ExList">
          <button type="button" class="c19-ex" data-n="114">
            <span class="c19-ex-top"><span class="c19-ex-n">114</span><span class="c19-ex-f">19 × 6 ✓</span></span>
            <span class="c19-ex-d">குர்ஆனில் உள்ள ஸூராக்களின் எண்ணிக்கை</span>
          </button>
          <button type="button" class="c19-ex" data-n="2698">
            <span class="c19-ex-top"><span class="c19-ex-n">2698</span><span class="c19-ex-f">19 × 142 ✓</span></span>
            <span class="c19-ex-d">"அல்லாஹ்" என்ற வார்த்தையின் நிகழ்வுகள்</span>
          </button>
          <button type="button" class="c19-ex" data-n="6346">
            <span class="c19-ex-top"><span class="c19-ex-n">6346</span><span class="c19-ex-f">19 × 334 ✓</span></span>
            <span class="c19-ex-d">குர்ஆனில் உள்ள மொத்த வசனங்களின் எண்ணிக்கை</span>
          </button>
        </div>
        <p class="c19-ex-note">விரைவாக சோதிக்க எந்த உதாரணத்தையும் அழுத்தவும்</p>
      </div>
    </div>

  </div>
</section>

<div class="verse">
  <div class="q">&#8220;</div>
  <blockquote>அதன் மேல் பத்தொன்பது (19) உள்ளன.</blockquote>
  <cite>குர்ஆன் 74:30</cite>
</div>

<style>
.c19-sub{max-width:640px;margin:14px auto 0;color:var(--ink-soft);font-size:clamp(15px,2vw,17.5px)}
.c19-sec{padding-top:56px}
.c19-card{max-width:640px;margin:0 auto 40px;padding:36px 32px;border-radius:var(--radius-lg);
  background:linear-gradient(180deg,var(--panel),var(--panel-2));border:1px solid var(--line-2);
  box-shadow:var(--shadow-sm)}
.c19-label{display:block;font-weight:700;font-size:14px;letter-spacing:.3px;color:var(--ink-soft);margin-bottom:10px}
.c19-inputwrap{position:relative}
.c19-input{width:100%;box-sizing:border-box;padding:20px 74px 20px 20px;border-radius:14px;
  border:1px solid var(--line);background:var(--bg-2);color:var(--ink);
  font-family:var(--font-body);font-variant-numeric:tabular-nums;font-weight:700;
  font-size:clamp(20px,4vw,28px);letter-spacing:.5px;transition:border-color .2s,box-shadow .2s}
.c19-input:focus{outline:none;border-color:var(--gold);box-shadow:0 0 0 3px rgba(216,180,94,.15)}
.c19-input.err{border-color:#f87171;animation:c19shake .32s}
@keyframes c19shake{0%,100%{transform:translateX(0)}25%{transform:translateX(-6px)}75%{transform:translateX(6px)}}
.c19-hint{position:absolute;right:18px;top:50%;transform:translateY(-50%);color:var(--muted);
  font-weight:600;font-size:15px;pointer-events:none}
.c19-actions{display:flex;gap:14px;margin-top:20px;flex-wrap:wrap}
.c19-actions .btn{flex:1;min-width:150px}
.c19-result{margin-top:26px;padding:28px 22px;border-radius:16px;text-align:center;border:1px solid;
  animation:c19in .3s ease}
@keyframes c19in{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}
.c19-result.ok{border-color:rgba(52,211,153,.4);background:rgba(52,211,153,.08)}
.c19-result.bad{border-color:rgba(248,113,113,.4);background:rgba(248,113,113,.08)}
.c19-r-icon{width:52px;height:52px;margin:0 auto 14px;border-radius:50%;display:grid;place-items:center;font-size:24px}
.c19-result.ok .c19-r-icon{background:rgba(52,211,153,.15);color:#34d399}
.c19-result.bad .c19-r-icon{background:rgba(248,113,113,.15);color:#f87171}
.c19-r-title{font-size:clamp(20px,3vw,26px);margin:0 0 10px}
.c19-result.ok .c19-r-title{color:#34d399}
.c19-result.bad .c19-r-title{color:#f87171}
.c19-r-formula{font-family:var(--font-body);font-variant-numeric:tabular-nums;font-weight:700;
  font-size:clamp(15px,2.6vw,19px);color:var(--ink);word-break:break-all;margin-bottom:8px}
.c19-r-note{color:var(--muted);font-size:14.5px;margin:0}
.c19-info{margin-top:8px}
.c19-howto ol{margin:0;padding-left:1.2em;color:var(--ink-soft);font-size:15px}
.c19-howto li{margin:.55em 0}
.c19-examples h3,.c19-howto h3{margin-bottom:16px}
.c19-ex-list{display:flex;flex-direction:column;gap:10px}
.c19-ex{display:flex;flex-direction:column;gap:4px;text-align:left;padding:13px 15px;border-radius:12px;
  border:1px solid var(--line-2);background:rgba(255,255,255,.02);color:var(--ink);cursor:pointer;
  font-family:inherit;transition:.18s}
.c19-ex:hover,.c19-ex.active{border-color:var(--gold);background:rgba(216,180,94,.08)}
.c19-ex-top{display:flex;align-items:baseline;justify-content:space-between;gap:10px}
.c19-ex-n{font-weight:700;font-size:17px;font-variant-numeric:tabular-nums}
.c19-ex-f{color:var(--gold-bright);font-weight:600;font-size:13.5px;white-space:nowrap}
.c19-ex-d{color:var(--muted);font-size:13.5px}
.c19-ex-note{margin:14px 0 0;text-align:center;color:var(--muted);font-size:13px}
@media(max-width:560px){
  .c19-card{padding:26px 20px}
  .c19-actions .btn{min-width:0}
}
</style>

<script>
(function () {
  "use strict";
  var input = document.getElementById("c19Input");
  var hint = document.getElementById("c19Hint");
  var resultBox = document.getElementById("c19Result");
  var calcBtn = document.getElementById("c19Calc");
  var clearBtn = document.getElementById("c19Clear");
  var exList = document.getElementById("c19ExList");

  function formatBig(numStr) {
    var s = String(numStr);
    var out = "";
    var count = 0;
    for (var i = s.length - 1; i >= 0; i--) {
      out = s.charAt(i) + out;
      count++;
      if (count % 3 === 0 && i !== 0) out = "," + out;
    }
    return out;
  }

  function sanitize(raw) {
    var digits = String(raw).replace(/[^0-9]/g, "");
    digits = digits.replace(/^0+(?=[0-9])/, "");
    return digits;
  }

  function showError() {
    resultBox.hidden = true;
    input.classList.remove("err");
    void input.offsetWidth;
    input.classList.add("err");
    input.focus();
    setTimeout(function () { input.classList.remove("err"); }, 350);
  }

  function calculate() {
    var digits = sanitize(input.value);
    if (!digits) {
      showError();
      return;
    }
    input.value = digits;

    var n = BigInt(digits);
    var r = n % 19n;
    var ok = r === 0n;

    resultBox.classList.remove("ok", "bad");
    resultBox.hidden = false;

    if (ok) {
      var q = n / 19n;
      resultBox.classList.add("ok");
      resultBox.innerHTML =
        '<div class="c19-r-icon">✅</div>' +
        '<h3 class="c19-r-title">19 ஆல் வகுபடுகிறது!</h3>' +
        '<div class="c19-r-formula">' + formatBig(digits) + " = 19 &times; " + formatBig(q.toString()) + '</div>' +
        '<p class="c19-r-note">இந்த எண் 19 code உடன் பொருந்துகிறது.</p>';
    } else {
      var q2 = (n - r) / 19n;
      resultBox.classList.add("bad");
      resultBox.innerHTML =
        '<div class="c19-r-icon">❌</div>' +
        '<h3 class="c19-r-title">19 ஆல் வகுபடவில்லை</h3>' +
        '<div class="c19-r-formula">' + formatBig(digits) + " &divide; 19 = " + formatBig(q2.toString()) + ", மீதி " + r.toString() + '</div>' +
        '<p class="c19-r-note">இந்த எண் 19 code உடன் பொருந்தவில்லை.</p>';
    }
    resultBox.scrollIntoView({ behavior: "smooth", block: "nearest" });
  }

  function clearAll() {
    input.value = "";
    resultBox.hidden = true;
    resultBox.innerHTML = "";
    var active = exList.querySelectorAll(".c19-ex.active");
    for (var i = 0; i < active.length; i++) active[i].classList.remove("active");
    input.focus();
  }

  calcBtn.addEventListener("click", calculate);
  clearBtn.addEventListener("click", clearAll);
  input.addEventListener("keydown", function (evt) {
    if (evt.key === "Enter") calculate();
  });
  input.addEventListener("input", function () {
    var digits = input.value.replace(/[^0-9]/g, "");
    if (digits !== input.value) input.value = digits;
  });

  var exButtons = exList.querySelectorAll(".c19-ex");
  for (var i = 0; i < exButtons.length; i++) {
    exButtons[i].addEventListener("click", function () {
      for (var j = 0; j < exButtons.length; j++) exButtons[j].classList.remove("active");
      this.classList.add("active");
      input.value = this.getAttribute("data-n");
      calculate();
    });
  }
})();
</script>

<?php get_footer(); ?>
