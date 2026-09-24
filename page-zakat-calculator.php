<?php
/**
 * Zakat Calculator (Tamil) — computes the 2.5% obligatory charity (Zakat)
 * due on net income (Quran 6:141, 2:215, 7:156). Tamil translation of
 * godalone-premium's page-zakat-calculator.php, same structure/CSS/JS.
 * Routed via the rewrite-rule block added to functions.php (no wp-admin
 * page exists for this slug, same pattern as /calculator-19/).
 */
if (!defined('ABSPATH')) exit;
get_header();
?>
<div class="page-hero">
  <div class="wrap">
    <div class="crumb">Kadavulmattum.org</div>
    <h1 class="reveal">💰 கடமையான தர்மம் (ஜகாத்)</h1>
    <p class="reveal zk-sub">உங்கள் நிகர வருமானத்தில் 2.5% ஜகாத்தாகும் — கீழே தொகையை உள்ளிட்டு கணக்கிடவும்.</p>
  </div>
</div>

<section class="blk zk-sec">
  <div class="wrap">

    <div class="zk-card reveal">
      <label class="zk-label" for="zkIncome">வருமானத்தை உள்ளிடவும் :</label>
      <div class="zk-inputwrap">
        <input type="text" inputmode="decimal" autocomplete="off" spellcheck="false" id="zkIncome" class="zk-input" placeholder="எ.கா. 50000">
        <span class="zk-hint">× 2.5%</span>
      </div>
      <div class="zk-actions">
        <button type="button" id="zkCalc" class="btn btn-gold">🧮 கணக்கிடு</button>
        <button type="button" id="zkClear" class="btn btn-ghost">🗑️ அழி</button>
      </div>
      <div class="zk-result" id="zkResult" hidden></div>
    </div>

    <div class="card zk-article reveal">
      <h3>கடமையான தர்மம் (ஜகாத்)</h3>
      <p>கடமையான தர்மம் (ஜகாத்) "அறுவடை நாள் அன்றே" கொடுக்கப்பட்டுவிட வேண்டும் (6:141). "நிகர வருமானம்" நாம் பெறுகின்ற பொழுதெல்லாம், 2.5% ஒதுக்கி வைத்து குறிப்பிடப்பட்டுள்ள பெறுநர்கள் &mdash; பெற்றோர்கள், உறவினர்கள், அனாதைகள், ஏழைகள் மற்றும் பயணத்தில் இருக்கின்ற அந்நியர்களுக்கு, இதே வரிசையில், நாம் அதனைக் கொடுத்து விடவேண்டும் (2:215). ஜகாத்தின் இன்றியமையாத முக்கியத்துவமானது கடவுளின் சட்டத்தில் பிரதிபலிக்கப்படுகின்றது: "என்னுடைய கருணை அனைத்துப் பொருட்களையும் சூழ்ந்துள்ளது. எனினும் ஜகாத் கொடுக்கின்ற நன்னெறியாளர்களுக்கென நான் அதனைக் குறிப்பிட்டு வைப்பேன்" (7:156).</p>
    </div>

    <div class="grid zk-verses">

      <div class="card zk-verse reveal">
        <div class="zk-cite">குர்ஆன் 6:141</div>
        <div class="zk-ar">وَهُوَ الَّذى أَنشَأَ جَنّٰتٍ مَعروشٰتٍ وَغَيرَ مَعروشٰتٍ وَالنَّخلَ وَالزَّرعَ مُختَلِفًا أُكُلُهُ وَالزَّيتونَ وَالرُّمّانَ مُتَشٰبِهًا وَغَيرَ مُتَشٰبِهٍ كُلوا مِن ثَمَرِهِ إِذا أَثمَرَ وَءاتوا حَقَّهُ يَومَ حَصادِهِ وَلا تُسرِفوا إِنَّهُ لا يُحِبُّ المُسرِفينَ</div>
        <p class="zk-tr">அவர்தான் பந்தலிடப்பட்ட மற்றும் பந்தலிடப்படாத தோட்டங்களையும், கிளைகளற்ற மரங்களையும், வெவ்வேறு ருசிகளுடைய பயிர்களையும், ஒலிவம், மற்றும் மாதுளைத் தோட்டங்களையும் நிர்மாணித்தவர் &mdash; ஒரே மாதிரியாக இருக்கின்ற பழங்கள், ஆயினும் மாறுபட்டவை. அவை பழுத்து விட்டால் அவற்றின் பழங்களிலிருந்து உண்ணுங்கள், அத்துடன் அதற்குரிய தர்மத்தை அறுவடை நாள் அன்றே கொடுத்து விடுங்கள், மேலும் எந்த ஒன்றையும் வீணடிக்காதீர்கள். வீணடிப்பவர்களை அவர் நேசிப்பதில்லை.</p>
        <p class="zk-fn"><strong>அடிக்குறிப்பு:</strong> ஜகாத் தர்மம் எந்த அளவுக்கு முக்கியமானதெனில், மிக்க கருணையாளர் அதனைக் கொடுப்பவர்களுக்கே தன்னுடைய கருணை என வரையறுத்துள்ளார் (7:156). இருப்பினும், சீர்கெட்டுப் போய்விட்ட முஸ்லிம்கள் மிக முக்கியமான இந்தக் கட்டளையைத் தவறவிட்டு விட்டனர்; அவர்கள் ஒரு வருடத்திற்கு ஒரு முறை மட்டுமே ஜகாத்தைக் கொடுக்கின்றனர். நாம் வருமானத்தைப் பெறுகின்ற நாள் அன்றே ஜகாத் கொடுக்கப்பட்டு விடவேண்டும் என்பதை இங்கே நாம் காண்கின்றோம். ஆப்ரஹாமின் மூலமாக நம்மிடம் வந்துள்ள விகிதாச்சாரமானது நம்முடைய நிகர வருமானத்தில் 2.5% ஆகும்.</p>
      </div>

      <div class="card zk-verse reveal">
        <div class="zk-cite">குர்ஆன் 2:215</div>
        <div class="zk-ar">يَسـَٔلونَكَ ماذا يُنفِقونَ قُل ما أَنفَقتُم مِن خَيرٍ فَلِلوٰلِدَينِ وَالأَقرَبينَ وَاليَتٰمىٰ وَالمَسٰكينِ وَابنِ السَّبيلِ وَما تَفعَلوا مِن خَيرٍ فَإِنَّ اللَّهَ بِهِ عَليمٌ</div>
        <p class="zk-tr">கொடுப்பதைப் பற்றி அவர்கள் உம்மிடம் கேட்கின்றனர்: கூறுவீராக, நீங்கள் கொடுக்கின்ற தர்மம் பெற்றோர்கள், உறவினர்கள், அனாதைகள், ஏழைகள், மற்றும் பிரயாணத்திலிருக்கின்ற அந்நியர்களைச் சென்றடைய வேண்டும். நீங்கள் செய்கின்ற எந்த நன்மையாயினும், கடவுள் அது குறித்து முற்றிலும் அறிந்திருக்கின்றார்.</p>
      </div>

      <div class="card zk-verse reveal">
        <div class="zk-cite">குர்ஆன் 7:156</div>
        <div class="zk-ar">وَاكتُب لَنا فى هٰذِهِ الدُّنيا حَسَنَةً وَفِى الـٔاخِرَةِ إِنّا هُدنا إِلَيكَ قالَ عَذابى أُصيبُ بِهِ مَن أَشاءُ وَرَحمَتى وَسِعَت كُلَّ شَىءٍ فَسَأَكتُبُها لِلَّذينَ يَتَّقونَ وَيُؤتونَ الزَّكوٰةَ وَالَّذينَ هُم بِـٔايٰتِنا يُؤمِنونَ</div>
        <p class="zk-tr">மேலும் இந்த உலகிலும் அத்துடன் மறுவுலகத்திலும் எங்களுக்கு நன்மையை விதித்திடுவீராக. நாங்கள் உம்மிடம் வருந்துகின்றோம். அவர் கூறினார், நான் நாடுகின்ற எவர் மீதும் என்னுடைய தண்டனை ஏற்படும். ஆனால் என்னுடைய கருணை அனைத்துப் பொருட்களையும் சூழ்ந்து கொண்டுள்ளது. இருப்பினும், அதனை நான் இவர்களுக்கெனக் குறிப்பிட்டு வைப்பேன், (1) நன்னெறியானதொரு வாழ்வு நடத்துபவர்கள், (2) கடமையான (ஜகாத்) தர்மத்தைக் கொடுப்பவர்கள், (3) நம்முடைய வெளிப்பாடுகள் மீது நம்பிக்கை கொள்பவர்கள், மேலும்&hellip;</p>
        <p class="zk-fn"><strong>அடிக்குறிப்பு:</strong> (ஜகாத்) கடமையான தர்மத்தின் முக்கியத்துவம் அளவுக்கு அதிகமாக வலியுறுத்தப்படுவதாகக் கொள்ள இயலாது. 6:141 ல் நிறுவப்பட்டுள்ளபடி, எந்த வருமானத்தையும் பெற்றவுடன் ஜகாத் கொடுக்கப்பட்டாக வேண்டும் &mdash; ஒருவரது நிகர வருமானத்தில் 2.5% பெற்றோர்கள், உறவினர்கள், அனாதைகள், ஏழைகள், பயணத்திலிருக்கின்ற அந்நியர்களுக்கு, இந்த வரிசையிலேயே கொடுக்கப்பட்டாக வேண்டும் பார்க்க 2:215.</p>
      </div>

    </div>

    <div class="zk-charity reveal">
      <a class="btn btn-gold" href="https://kadavulmattum.org/charity/">❤️ சரணடைந்தவர்கள் தர்ம ஸ்தாபனம்</a>
    </div>

  </div>
</section>

<style>
.zk-sub{max-width:640px;margin:14px auto 0;color:var(--ink-soft);font-size:clamp(15px,2vw,17.5px)}
.zk-sec{padding-top:56px}
.zk-card{max-width:640px;margin:0 auto 40px;padding:36px 32px;border-radius:var(--radius-lg);
  background:linear-gradient(180deg,var(--panel),var(--panel-2));border:1px solid var(--line-2);
  box-shadow:var(--shadow-sm)}
.zk-label{display:block;font-weight:700;font-size:14px;letter-spacing:.3px;color:var(--ink-soft);margin-bottom:10px}
.zk-inputwrap{position:relative}
.zk-input{width:100%;box-sizing:border-box;padding:20px 84px 20px 20px;border-radius:14px;
  border:1px solid var(--line);background:var(--bg-2);color:var(--ink);
  font-family:var(--font-body);font-variant-numeric:tabular-nums;font-weight:700;
  font-size:clamp(20px,4vw,28px);letter-spacing:.5px;transition:border-color .2s,box-shadow .2s}
.zk-input:focus{outline:none;border-color:var(--gold);box-shadow:0 0 0 3px rgba(216,180,94,.15)}
.zk-input.err{border-color:#f87171;animation:zkshake .32s}
@keyframes zkshake{0%,100%{transform:translateX(0)}25%{transform:translateX(-6px)}75%{transform:translateX(6px)}}
.zk-hint{position:absolute;right:18px;top:50%;transform:translateY(-50%);color:var(--muted);
  font-weight:600;font-size:15px;pointer-events:none}
.zk-actions{display:flex;gap:14px;margin-top:20px;flex-wrap:wrap}
.zk-actions .btn{flex:1;min-width:150px}
.zk-result{margin-top:26px;padding:28px 22px;border-radius:16px;text-align:center;
  border:1px solid rgba(52,211,153,.4);background:rgba(52,211,153,.08);animation:zkin .3s ease}
@keyframes zkin{from{opacity:0;transform:translateY(8px)}to{opacity:1;transform:none}}
.zk-r-icon{width:52px;height:52px;margin:0 auto 14px;border-radius:50%;display:grid;place-items:center;
  font-size:24px;background:rgba(52,211,153,.15);color:#34d399}
.zk-r-title{font-size:clamp(22px,3.6vw,28px);margin:0 0 8px;color:#34d399}
.zk-r-formula{font-family:var(--font-body);font-variant-numeric:tabular-nums;font-weight:700;
  font-size:clamp(15px,2.6vw,19px);color:var(--ink);word-break:break-all;margin-bottom:8px}
.zk-r-note{color:var(--muted);font-size:14.5px;margin:0}
.zk-article{max-width:820px;margin:0 auto 40px;padding:32px}
.zk-article h3{margin-top:0}
.zk-article p{color:var(--ink-soft);line-height:1.75;margin:0}
.zk-article a{color:var(--gold-tan);text-decoration:underline}
.zk-verses{grid-template-columns:1fr;gap:22px;max-width:820px;margin:0 auto}
.zk-verse{padding:30px 28px}
.zk-cite{font-weight:700;letter-spacing:1.5px;text-transform:uppercase;font-size:13px;color:var(--gold-tan);margin-bottom:14px}
.zk-cite a{color:inherit;text-decoration:none}
.zk-cite a:hover{text-decoration:underline}
.zk-ar{font-family:var(--font-ar);direction:rtl;text-align:right;font-size:clamp(19px,3vw,24px);
  line-height:2;color:var(--ink);margin-bottom:16px}
.zk-tr{color:var(--ink-soft);line-height:1.75;margin:0 0 12px;font-style:italic;font-family:var(--font-display)}
.zk-fn{color:var(--muted);font-size:14px;line-height:1.7;margin:0;padding-top:12px;border-top:1px dashed var(--line-2)}
.zk-charity{text-align:center;margin-top:46px}
@media(max-width:560px){
  .zk-card{padding:26px 20px}
  .zk-actions .btn{min-width:0}
  .zk-verse{padding:24px 20px}
}
</style>

<script>
(function () {
  "use strict";
  var input = document.getElementById("zkIncome");
  var resultBox = document.getElementById("zkResult");
  var calcBtn = document.getElementById("zkCalc");
  var clearBtn = document.getElementById("zkClear");

  function formatMoney(n) {
    var fixed = n.toFixed(2);
    var parts = fixed.split(".");
    var intPart = parts[0];
    var out = "";
    var count = 0;
    for (var i = intPart.length - 1; i >= 0; i--) {
      out = intPart.charAt(i) + out;
      count++;
      if (count % 3 === 0 && i !== 0) out = "," + out;
    }
    return out + "." + parts[1];
  }

  function sanitize(raw) {
    var s = String(raw).replace(/[^0-9.]/g, "");
    var firstDot = s.indexOf(".");
    if (firstDot !== -1) {
      s = s.slice(0, firstDot + 1) + s.slice(firstDot + 1).replace(/\./g, "");
    }
    return s;
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
    var income = parseFloat(digits);
    if (!digits || isNaN(income) || income <= 0) {
      showError();
      return;
    }
    input.value = digits;

    var zakat = income * 0.025;

    resultBox.hidden = false;
    resultBox.innerHTML =
      '<div class="zk-r-icon">💰</div>' +
      '<h3 class="zk-r-title">ஜகாத்: ' + formatMoney(zakat) + '</h3>' +
      '<div class="zk-r-formula">' + formatMoney(income) + ' &times; 2.5%</div>' +
      '<p class="zk-r-note">இது இந்த வருமானத்திற்கான கடமையான தர்மம் (குர்ஆன் 6:141, 2:215).</p>';
    resultBox.scrollIntoView({ behavior: "smooth", block: "nearest" });
  }

  function clearAll() {
    input.value = "";
    resultBox.hidden = true;
    resultBox.innerHTML = "";
    input.focus();
  }

  calcBtn.addEventListener("click", calculate);
  clearBtn.addEventListener("click", clearAll);
  input.addEventListener("keydown", function (evt) {
    if (evt.key === "Enter") calculate();
  });
})();
</script>

<?php get_footer(); ?>
