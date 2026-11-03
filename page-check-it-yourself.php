<?php
/**
 * Template Name: Check it yourself
 * Simple page for new visitors. Routed in functions.php (no wp-admin page).
 * Quran verses come from the site's own Quran data.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>
<style>
.en-s{font-size:1.02rem;line-height:1.8;color:var(--ink-soft);margin:0 0 .6em}
.vc{margin-top:14px;padding:16px 16px 10px;border-radius:14px;background:rgba(0,0,0,.18);border:1px solid var(--line)}
.vc cite{display:block;font-style:normal;font-weight:600;font-size:13px;letter-spacing:.5px;color:var(--gold-tan);text-align:center;padding-bottom:4px}
.stack{max-width:820px;margin:0 auto}
.stack .card{margin-bottom:18px}
.stack p{line-height:1.8}
.who{width:100%;border-collapse:separate;border-spacing:0;border:1px solid var(--line);border-radius:16px;overflow:hidden;background:linear-gradient(180deg,var(--panel),var(--panel-2,var(--panel)))}
.who th,.who td{padding:14px 16px;text-align:left;vertical-align:top;line-height:1.6;border-bottom:1px solid var(--line)}
.who th{background:rgba(0,0,0,.2);color:var(--gold-bright);font-weight:700}
.who tr:last-child td{border-bottom:0}
.who td:first-child{font-weight:600;color:var(--ink);width:38%}
.who td:last-child{color:var(--ink-soft)}
.big{font-size:1.25rem;color:var(--ink);text-align:center;margin:0 0 6px}
.steps{counter-reset:s;list-style:none;margin:0;padding:0}
.steps li{counter-increment:s;position:relative;padding:12px 0 12px 52px;color:var(--ink);line-height:1.6}
.steps li::before{content:counter(s);position:absolute;left:0;top:8px;width:36px;height:36px;border-radius:50%;background:var(--gold-grad);color:#fff;font-weight:700;display:flex;align-items:center;justify-content:center}
.cta-row{display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-top:22px}
.cta-row .btn{white-space:normal;text-align:center}
@media(max-width:560px){.who td:first-child{width:42%}.who th,.who td{padding:12px}}
</style>
<style>
/* page 3 extras */
.stack{max-width:820px;margin:0 auto}
.stack .card{margin-bottom:18px}
.stack p{line-height:1.8}
.who{width:100%;border-collapse:separate;border-spacing:0;border:1px solid var(--line);border-radius:16px;overflow:hidden;background:linear-gradient(180deg,var(--panel),var(--panel-2,var(--panel)))}
.who th,.who td{padding:14px 16px;text-align:left;vertical-align:middle;line-height:1.55;border-bottom:1px solid var(--line)}
.who th{background:rgba(0,0,0,.2);color:var(--gold-bright);font-weight:700}
.who tr:last-child td{border-bottom:0}
.who td:first-child{color:var(--ink);font-weight:600}
.who .num{font-size:1.15rem;font-weight:700;color:var(--gold-bright);white-space:nowrap}
.who .res{color:var(--ink-soft);white-space:nowrap}
.who .res b{color:var(--gold-bright);font-size:1.1rem}
.n{display:inline-flex;width:24px;height:24px;border-radius:50%;background:var(--gold-grad);color:#fff;font-size:13px;font-weight:700;align-items:center;justify-content:center;margin-right:6px}
.dots{margin:0;padding-left:20px;color:var(--ink);line-height:1.8}
.dots li{margin-bottom:8px}
.steps{counter-reset:s;list-style:none;margin:0;padding:0}
.steps li{counter-increment:s;position:relative;padding:12px 0 12px 52px;color:var(--ink);line-height:1.6}
.steps li::before{content:counter(s);position:absolute;left:0;top:8px;width:36px;height:36px;border-radius:50%;background:var(--gold-grad);color:#fff;font-weight:700;display:flex;align-items:center;justify-content:center}
.cta-row{display:flex;flex-wrap:wrap;gap:12px;justify-content:center;margin-top:22px}
.cta-row .btn{white-space:normal;text-align:center}
@media(max-width:600px){.who th,.who td{padding:10px 10px;font-size:.93rem}.who .res{white-space:normal}}
</style>
<style>.stack .card p.big{font-size:1.3rem;font-weight:600;color:var(--ink);text-align:center;margin:0 0 8px}ul.dots{list-style:none;margin:0;padding:0}ul.dots li{position:relative;padding:8px 0 8px 24px;line-height:1.7;color:var(--ink-soft)}ul.dots li::before{content:"";position:absolute;left:4px;top:18px;width:9px;height:9px;border-radius:50%;background:var(--gold-bright)}.vc .ar{font-family:"Amiri","Scheherazade New","Noto Naskh Arabic",serif;font-size:1.5rem;line-height:2;direction:rtl;text-align:right;color:var(--ink);margin:0 0 6px}.vc .note{font-size:.92rem;opacity:.85;margin:6px 0}</style>
<style>/*mob-who*/@media(max-width:560px){.who{font-size:.9rem}.who th,.who td{padding:10px 8px}.who td:first-child{width:auto}.who td.num{font-size:.95rem}.who td.res{white-space:nowrap}.who .n{margin-right:4px}}</style>
<div class="page-hero">
<div class="wrap">
<div class="crumb">Kadavulmattum.org</div>
<h1 class="reveal">5 நிமிடத்தில் நீங்களே சரிபாருங்கள்</h1>
<p class="hero-sub">யாரையும் நம்ப வேண்டியதில்லை. ஒரு கால்குலேட்டரை எடுத்து இந்த எண்களை நீங்களே சரிபாருங்கள்.</p>
</div>
</div>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">1</div><h2>உங்களுக்குத் தேவையானவை</h2></div>
<div class="stack">
<div class="card reveal"><ul class="dots"><li>ஒரு மொபைல் அல்லது கால்குலேட்டர். அவ்வளவே.</li><li>5 நிமிடங்கள்.</li><li>திறந்த மனம்.</li></ul></div>
</div>
</div>
</section>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">2</div><h2>சரிபார்ப்பு</h2><p>ஒவ்வொரு எண்ணையும் 19 ஆல் வகுங்கள். விடை முழு எண்ணாக வந்தால், அது பொருந்துகிறது என்று பொருள்.</p></div>
<div class="stack">
<table class="who">
<thead><tr><th>நாம் எண்ணுவது</th><th>எண்</th><th>சரிபார்ப்பு</th></tr></thead>
<tbody>
<tr><td><span class="n">1</span> முதல் வசனத்தில் (பிஸ்மில்லாஹ், 1:1) உள்ள அரபி எழுத்துகள்</td><td class="num">19</td><td class="res">÷ 19 = <b>1</b> ✔</td></tr>
<tr><td><span class="n">2</span> குர்ஆனில் உள்ள சூராக்கள்</td><td class="num">114</td><td class="res">÷ 19 = <b>6</b> ✔</td></tr>
<tr><td><span class="n">3</span> மொத்த வசனங்கள் (6234 எண்ணிடப்பட்டவை + 112 பிஸ்மில்லாஹ்)</td><td class="num">6346</td><td class="res">÷ 19 = <b>334</b> ✔</td></tr>
<tr><td><span class="n">4</span> “கடவுள்” என்ற சொல் வரும் எண்ணிக்கை</td><td class="num">2698</td><td class="res">÷ 19 = <b>142</b> ✔</td></tr>
<tr><td><span class="n">5</span> “கடவுள்” என்ற சொல் வரும் வசன எண்களின் கூடுதல்</td><td class="num">118123</td><td class="res">÷ 19 = <b>6217</b> ✔</td></tr>
</tbody>
</table>
</div>
</div>
</section>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">3</div><h2>படிப்படியாகச் சரிபார்க்க</h2></div>
<div class="stack">
<div class="card reveal"><ol class="steps">
<li>கால்குலேட்டரைத் திறக்கவும்.</li>
<li>114 என்று தட்டச்சு செய்து, வகுத்தல் அழுத்தி, 19 என்று தட்டவும். விடை 6.</li>
<li>6346 க்கும் இதையே செய்யவும். விடை 334.</li>
<li>2698 க்கும் இதையே செய்யவும். விடை 142.</li>
<li>118123 க்கும் இதையே செய்யவும். விடை 6217.</li>
<li>அல்லது எங்கள் <a href="<?php echo esc_url(home_url('/calculator-19')); ?>">19 கால்குலேட்டரைப்</a> பயன்படுத்தவும். எந்த எண்ணையும் தட்டச்சு செய்தால் அது சொல்லும்.</li>
</ol></div>
</div>
</div>
</section>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">4</div><h2>நினைவில் கொள்ள இரண்டு</h2></div>
<div class="stack">
<div class="card reveal"><ul class="dots"><li>இந்த உண்மைகள் குர்ஆனின் மூல அரபி மொழி வடிவத்தைப் பற்றியவை.</li><li>“கடவுள்” என்ற சொல்லின் எண்ணிக்கையும் வசன எண்களின் கூடுதலும் ரஷாத் கலீஃபா அவர்களின் குர்ஆன் மொழிபெயர்ப்பின் ஒவ்வொரு பக்கத்திலும் காட்டப்பட்டுள்ளன; எனவே புத்தகத்தை வைத்திருக்கும் எவரும் அவற்றைப் பார்க்கலாம்.</li></ul></div>
</div>
</div>
</section>
<section class="blk">
<div class="wrap">
<div class="sec-head"><div class="kicker">5</div><h2>அடுத்து என்ன?</h2></div>
<div class="stack">
<div class="card reveal"><p>மேலும் அறிய விரும்பினால், 19 கால்குலேட்டர் பக்கத்தைப் பாருங்கள்.</p></div>
<div class="cta-row">
<a class="btn btn-gold" href="<?php echo esc_url(home_url('/calculator-19')); ?>">🔢 19 கால்குலேட்டர்</a>
<a class="btn btn-ghost" href="<?php echo esc_url(home_url('/mathematical-miracle/')); ?>">📐 கணித அற்புதம்</a>
<a class="btn btn-ghost" href="<?php echo esc_url(home_url('/quran/')); ?>">💻 குர்ஆனைப் படிக்க</a>
<a class="btn btn-ghost" href="<?php echo esc_url(home_url('/is-this-for-me')); ?>">🙋 இது எனக்கானதா?</a>
</div>
</div>
</div>
</section>
<?php get_footer(); ?>
