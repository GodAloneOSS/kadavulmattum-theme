<?php
/**
 * Template Name: About / Privacy / Copyright (Tamil)
 * One template for three simple pages. Routed in functions.php (query var km_legal).
 */
if (!defined('ABSPATH')) exit;
$k = get_query_var('km_legal');
get_header();
?>
<style>
.stack{max-width:820px;margin:0 auto}
.stack .card{margin-bottom:18px}
.stack p{line-height:1.8}
.stack a{text-decoration:underline}
.dots{margin:0;padding-left:20px;color:var(--ink);line-height:1.8}
.dots li{margin-bottom:8px}
</style>
<?php if ($k === 'about') : ?>
<div class="page-hero"><div class="wrap"><div class="crumb">Kadavulmattum.org</div><h1 class="reveal">எங்களைப் பற்றி</h1><p class="hero-sub">கடவுள் மட்டுமே, குர்ஆன் மட்டுமே.</p></div></div>
<section class="blk"><div class="wrap"><div class="stack">
 <div class="card reveal"><h3>நாங்கள் யார்</h3><p>Kadavulmattum.org என்பது கடவுளின் செய்தியான குர்ஆனை எளிய தமிழில் பகிரும் ஓர் இலவச இணையதளம். எங்கள் நோக்கம் எளிது: கடவுள் மட்டுமே, குர்ஆன் மட்டுமே.</p></div>
 <div class="card reveal"><h3>நாங்கள் நம்பும் விஷயங்கள்</h3><ul class="dots"><li>ஒரே ஒரு கடவுள் மட்டுமே உண்டு; அவருக்கு மட்டுமே நம் வணக்கமும் கீழ்ப்படிதலும் உரியது.</li><li>குர்ஆன் கடவுளின் முழுமையான, முழு விளக்கமான நூல் (6:114, 6:115).</li><li>நாங்கள் குர்ஆனை மட்டுமே பின்பற்றுகிறோம்; மனிதர்கள் எழுதிய வேறு எந்த மத நூலையும் அல்ல.</li><li>கடவுளால் ஏற்றுக்கொள்ளப்பட்ட ஒரே மார்க்கம், அவரிடம் சரணடைதல் (3:19).</li></ul></div>
 <div class="card reveal"><h3>இங்கு கிடைப்பவை</h3><p>குர்ஆன், புத்தகங்கள், காணொளிகள், 19 கணிப்பான், ஜகாத் மற்றும் ரமலான் கணிப்பான்கள், புதியவர்களுக்கான எளிய பக்கங்கள்.</p></div>
 <div class="card reveal"><h3>எங்கள் சகோதர தளங்கள்</h3><p><a href="https://godalone.in" target="_blank" rel="noopener">GodAlone.in</a> (ஆங்கிலம்) மற்றும் <a href="https://ekkhuda.org" target="_blank" rel="noopener">Ekkhuda.org</a> (இந்தி).</p></div>
 <div class="card reveal"><h3>இந்தத் தளத்தை நடத்துபவர்கள்</h3><p>Kadavulmattum.org குழு, குர்ஆனை நேசிக்கும் சில நண்பர்கள்.</p></div>
 <div class="card reveal"><h3>தொடர்பு</h3><p>தொடர்பு பக்கத்தில் எங்களுக்கு எழுதலாம், அல்லது <a href="mailto:info@godalone.in">info@godalone.in</a> க்கு மின்னஞ்சல் அனுப்பலாம்.</p></div>
</div></div></section>
<?php elseif ($k === 'privacy-policy') : ?>
<div class="page-hero"><div class="wrap"><div class="crumb">Kadavulmattum.org</div><h1 class="reveal">தனிப்பட்ட தகவல் கொள்கை</h1><p class="hero-sub">நாங்கள் மிகக் குறைவான தகவல்களையே சேகரிக்கிறோம். உங்கள் தகவலை யாருக்கும் விற்பதில்லை.</p></div></div>
<section class="blk"><div class="wrap"><div class="stack">
 <div class="card reveal"><h3>நாங்கள் சேகரிப்பவை</h3><ul class="dots"><li><b>தொடர்பு படிவம்:</b> உங்கள் பெயர், மின்னஞ்சல், செய்தி — உங்களுக்குப் பதில் அளிக்க மட்டும்.</li><li><b>செய்திமடல்:</b> உங்கள் மின்னஞ்சல் — செய்திமடல் அனுப்ப மட்டும். எப்போது வேண்டுமானாலும் நீக்கச் சொல்லலாம்.</li><li><b>குர்ஆனிய வினாடி வினா:</b> நீங்கள் உள்ளிடும் பெயர் சான்றிதழைக் காட்ட மட்டும் பயன்படும்.</li><li><b>வழக்கமான தளப் பதிவுகள்:</b> பல இணையதளங்களைப் போலவே, தளம் செயல்படவும் பாதுகாப்பாக இருக்கவும் எங்கள் ஹோஸ்டிங் சேவை சில அடிப்படை வருகைத் தகவல்களைப் (பார்த்த பக்கம், உலாவி வகை) பதிவு செய்கிறது.</li></ul></div>
 <div class="card reveal"><h3>மற்ற சேவைகள்</h3><p>எங்கள் பக்கங்கள் Google Fonts-இலிருந்து எழுத்துருக்களை ஏற்றுகின்றன. இந்தச் சேவைகள் ஏற்றும்போது உங்கள் IP முகவரியைக் காணலாம். YouTube, WhatsApp, Telegram, Facebook, X, GitHub போன்ற இணைப்புகள் அந்தத் தளங்களைத் திறக்கும்; அவற்றிற்கு அவற்றின் சொந்த தனிப்பட்ட கொள்கைகள் உண்டு.</p></div>
 <div class="card reveal"><h3>குக்கீகள்</h3><p>தளம் செயல்படவும் வேகமாக ஏறவும் தேவையான சிறிய கோப்புகளை மட்டுமே பயன்படுத்துகிறோம் (உதாரணம்: இரவு/பகல் தோற்றத்தை நினைவில் கொள்ள).</p></div>
 <div class="card reveal"><h3>உங்கள் விருப்பங்கள்</h3><p>உங்கள் தகவலைக் காட்ட, திருத்த, அழிக்க <a href="mailto:info@godalone.in">info@godalone.in</a> க்கு எழுதலாம்.</p></div>
 <div class="card reveal"><h3>குழந்தைகள்</h3><p>இந்தத் தளம் எல்லோருக்கும் உரியது; ஆனால் இளம் குழந்தைகளிடமிருந்து நாங்கள் தெரிந்தே தகவல்களைச் சேகரிப்பதில்லை.</p></div>
 <div class="card reveal"><h3>மாற்றங்கள்</h3><p>இந்தப் பக்கத்தை மாற்றினால், புதிய தேதி இங்கே காட்டப்படும். கடைசியாகப் புதுப்பித்தது: 14 அக்டோபர் 2026.</p></div>
</div></div></section>
<?php else : ?>
<div class="page-hero"><div class="wrap"><div class="crumb">Kadavulmattum.org</div><h1 class="reveal">பதிவுரிமை</h1><p class="hero-sub">திறந்த மூலம், இலவசமாகப் பகிரலாம்.</p></div></div>
<section class="blk"><div class="wrap"><div class="stack">
 <div class="card reveal"><h3>திறந்த மூலம், இலவசமாகப் பகிரலாம்</h3><p>Kadavulmattum.org திறந்த மூல (open source) மற்றும் இலவசம். இணையதளக் கோட் <a href="https://github.com/kadavulmattum" target="_blank" rel="noopener">GitHub</a>-இல் திறந்துள்ளது.</p></div>
 <div class="card reveal"><h3>குர்ஆன்</h3><p>குர்ஆன் கடவுளின் நூல்; அதை நாங்கள் எங்களுடையது என்று உரிமை கோருவதில்லை. அதைப் படிக்கவும், பகிரவும், மற்றவர்களுக்கு கொடுக்கவும் நீங்கள் வரவேற்கப்படுகிறீர்கள்.</p></div>
 <div class="card reveal"><h3>மொழிபெயர்ப்புகள் மற்றும் புத்தகங்கள்</h3><p>இந்தத் தளத்தில் உள்ள சில மொழிபெயர்ப்புகளும் புத்தகங்களும் மற்ற ஆசிரியர்களின் பணி; அவை அவர்களுக்கே சொந்தம். அவற்றை விரும்பிப் பகிரலாம்; ஆனால் வார்த்தைகளை மாற்றாமல், ஆசிரியர் பெயரைச் சேர்த்தே பகிருங்கள்.</p></div>
 <div class="card reveal"><h3>தயவுசெய்து செய்யுங்கள்</h3><ul class="dots"><li>எங்கள் பக்கங்களையும் இணைப்புகளையும் சுதந்திரமாகப் பகிருங்கள்.</li><li>ஏதேனும் தவறு கண்டால் எங்களுக்குத் தெரியப்படுத்துங்கள், நாங்கள் திருத்துவோம்.</li></ul></div>
 <div class="card reveal"><h3>தயவுசெய்து செய்யாதீர்கள்</h3><ul class="dots"><li>கடவுளின் வார்த்தைகளையோ ஒரு வசனத்தின் அர்த்தத்தையோ மாற்றாதீர்கள்.</li><li>எங்கள் இலவச படைப்புகளை உங்களுடையது என்று விற்காதீர்கள்; எங்கள் பெயரை எங்கள் சொல்லாதவற்றைச் சொல்லப் பயன்படுத்தாதீர்கள்.</li></ul></div>
</div></div></section>
<?php endif; ?>

<?php get_footer(); ?>
