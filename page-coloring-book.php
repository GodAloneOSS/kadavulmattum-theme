<?php
/**
 * Template Name: Coloring Book
 *
 * Interactive "குழந்தைகளுக்கான குர்ஆன் கலரிங் புத்தகம்" — kids can color the story
 * scenes online (bucket-fill or brush, on desktop or mobile) and save the
 * result to their device, or print a blank page for hand-coloring, plus a
 * matching verse tracing / writing-practice worksheet for each story.
 *
 * Self-contained: markup, CSS and JS all live in this one file, matching
 * the pattern used by the other page-*.php templates in this theme.
 */
if (!defined('ABSPATH')) exit;
get_header();

$up = 'https://godalone.in/wp-content/themes/godalone-premium'; // not used for images (images live in uploads), kept for parity
$base = 'https://godalone.in/wp-content/uploads/coloring-book/';

$stories = array(
    array(
        'slug'    => 'bismillah',
        'icon'    => '📖',
        'title'   => 'கடவுளின் பெயரால்',
        'verse'   => 'பிஸ்மில்லாஹ்',
        'blurb'   => 'கடவுள்-ன் பெயரால், மிக்க அருளாளர், மிக்க கருணையாளர்.',
        'practice'=> false,
    ),
    array(
        'slug'    => 'building-kabah',
        'icon'    => '🕋',
        'title'   => 'கஃபாவைக் கட்டுதல்',
        'verse'   => 'குர்ஆன் 2:127',
        'blurb'   => 'ஆலயத்தின் அஸ்திவாரங்களை ஆப்ரஹாம் உயர்த்திய போது, இஸ்மாயீலுடன் சேர்ந்து(அவர்கள் பிரார்த்தித்தனர்): எங்கள் இரட்சகரே, இதனை எங்களிடமிருந்து ஏற்றுக் கொள்வீராக. நீரே செவியேற்பவர், எல்லாம் அறிந்தவர்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'hundred-years-sleep',
        'icon'    => '😴',
        'title'   => 'நூறு ஆண்டுத் துயில்',
        'verse'   => 'குர்ஆன் 2:259',
        'blurb'   => 'பாழடைந்த ஒரு நகரத்தைக் கடந்தவாறு வியந்த அந்த ஒருவரை எண்ணிப்பார்ப்பீராக, இது இறந்து விட்ட பின்னர் எவ்வாறு கடவுள் இதனை உயிர்ப்பிக்க இயலும்? கடவுள் பின்னர் அவரை ஒரு நூறு வருடங்கள் மரணத்தில் ஆழ்த்தினார், பின்னர் அவரை உயிர்ப்பித்தெழுப்பினார். அவர் கூறினார், எத்தனை காலம் நீர் இங்கே தங்கியிருந்தீர்? அவர் கூறினார், நான் ஒரு நாளோ, அல்லது நாளின் ஒரு பகுதியோ இங்கே இருந்தேன். அவர் கூறினார், அல்ல! நீர் இங்கே ஒரு நூறு வருடங்கள் இருந்தீர். ஆயினும், உம்முடைய உணவையும் பானத்தையும் நோக்குவீராக; அவை கெட்டுப் போய் விடவில்லை. உம்முடைய கழுதையை நோக்குவீராக - இவ்விதமாக நாம் உம்மை மக்களுக்கு ஒரு படிப்பினையாக ஆக்குகின்றோம். இப்போது, அதன் எலும்புகளை எவ்வாறு நாம் கட்டமைக்கின்றோம், பின்னர் தசைகளால் அவற்றை மூடுகின்றோம் எனக் கவனிப்பீராக நிகழ்ந்தது என்ன என்பதை அவர் உணர்ந்து கொண்ட போது, அவர் கூறினார், கடவுள் சர்வ சக்தியுடையவர் என்பதை இப்போது நான் அறிந்து கொண்டேன்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'wisdom-in-stars',
        'icon'    => '⭐',
        'title'   => 'நட்சத்திரங்களில் ஞானம்',
        'verse'   => 'குர்ஆன் 6:76',
        'blurb'   => 'இரவு கவிழ்ந்த போது, பளிச்சிடுகின்ற ஒரு கிரகத்தை அவர் கண்டார். இது என் இரட்சகராக இருக்கக் கூடும், என அவர் கூறினார். அது மறைந்து விட்ட போது, அவர் கூறினார், மறைந்து விடுகின்ற (தெய்வங்களான) வற்றை நான் விரும்புவதில்லை.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'noahs-ark',
        'icon'    => '🚢',
        'title'   => 'நோவாவின் கப்பல்',
        'verse'   => 'குர்ஆன் 11:40',
        'blurb'   => 'நமது தீர்ப்பு வந்து, வளிமண்டலம் கொதித்த போது, நாம் கூறினோம், கண்டனத்திற்குள்ளானோரைத் தவிர, ஒவ்வொரு வகையிலும் ஒரு ஜோடியை சுமந்து கொண்டு, உம்முடைய குடும்பத்தாருடன் செல்லும். நம்பிக்கை கொண்டோரை உம்முடன் சுமந்து செல்லும். மேலும் அவருடன் நம்பிக்கை கொண்டோர் மிகச் சிலர் மட்டுமே.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'josephs-dream',
        'icon'    => '✨',
        'title'   => 'ஜோஸஃபின் கனவு',
        'verse'   => 'குர்ஆன் 12:4',
        'blurb'   => 'ஜோஸஃப் தன் தந்தையிடம் கூறியதை நினைவு கூர்ந்திடுங்கள், என் தந்தையே, பதினொரு கிரகங்களையும், சூரியனையும், சந்திரனையும் நான் கண்டேன்; என் முன்னர் அவை சிரம் பணிய நான் கண்டேன்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'god-is-restorer',
        'icon'    => '👁️',
        'title'   => 'கடவுள் மீட்டுத் தருபவர்',
        'verse'   => 'குர்ஆன் 12:96',
        'blurb'   => 'நற்செய்தியைக் கொண்டு வருபவர் வந்து சேர்ந்த போது, அவர் (சட்டையை) அவர் முகத்தின் மீது எறிந்தார், அப்போது அவருடைய பார்வை திரும்பவும் மீண்டது. அவர் கூறினார், நீங்கள் அறியாதவற்றைக் கடவுள்-யிடமிருந்து நான் அறிவேன் என நான் உங்களிடம் கூறவில்லையா?',
        'practice'=> true,
    ),
    array(
        'slug'    => 'god-is-most-wise',
        'icon'    => '⛵',
        'title'   => 'கடவுள் மிக்க ஞானமுள்ளவர்',
        'verse'   => 'குர்ஆன் 18:71',
        'blurb'   => 'எனவே அவர்கள் சென்றனர். அவர்கள் ஒரு கப்பலில் ஏறியபோது, அவர் அதில் துளை ஒன்றை போட்டார். அவர் கூறினார், அதிலுள்ள மக்களை மூழ்கடிக்கவா அதில் நீர் ஒரு துளையைப் போட்டீர்? நீர் பயங்கரமான ஒன்றைச் செய்து விட்டீர்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'hidden-treasure',
        'icon'    => '💰',
        'title'   => 'மறைந்திருந்த பொக்கிஷம்',
        'verse'   => 'குர்ஆன் 18:77',
        'blurb'   => 'எனவே அவர்கள் சென்றனர். ஒரு குறிப்பிட்ட சமூகத்தை அவர்கள் அடைந்தபோது, அவர்கள் அம்மக்களிடம் உணவு கேட்டனர், ஆனால் அவர்களை உபசரிக்க அவர்கள் மறுத்து விட்டனர். விரைவில், விழுந்து விட இருக்கும் ஒரு மதிற்சுவரைக் அவர்கள் கண்டனர், அவர் அதனைச் சரி செய்தார். அவர் கூறினார், அதற்கு ஒரு கூலியை நீர் கேட்டிருக்கலாம்!',
        'practice'=> true,
    ),
    array(
        'slug'    => 'prophetic-dam',
        'icon'    => '🛡️',
        'title'   => 'இரும்புத் தடுப்பணை',
        'verse'   => 'குர்ஆன் 18:96',
        'blurb'   => 'இரும்புப் பாளங்களை என்னிடம் கொண்டு வாருங்கள், இரு குன்றுகளுக்கு இடையில் இருந்த இடை வெளியை அவர் அடைத்தவுடன், அவர் கூறினார், ஊதுங்கள். அது கொதித்துச் சிவந்தவுடன், அவர் கூறினார், அதன் மேல் தாரினை ஊற்றுவதற்கு எனக்கு உதவி செய்யுங்கள்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'talking-infant',
        'icon'    => '👶',
        'title'   => 'பேசிய சிசு',
        'verse'   => 'குர்ஆன் 19:30',
        'blurb'   => '(அந்தச் சிசு பேசியது, மேலும்) கூறியது, நான் கடவுள்-ன் ஒரு சேவகன் ஆவேன். அவர் எனக்கு வேதத்தைத் தந்து, என்னை ஒரு நபியாகவும் நியமித்துள்ளார்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'gods-promise',
        'icon'    => '🧺',
        'title'   => 'கடவுளின் வாக்குறுதி',
        'verse'   => 'குர்ஆன் 20:39',
        'blurb'   => 'கூறியவாறு: ‘பெட்டிக்குள் அவரை இட்டு, பின்னர் அவரை ஆற்றினுள் வீசி விடுவீராக. ஆறு அவரை கரை மீது வீசிவிடும், என்னுடைய விரோதியாலும் அவருடைய விரோதியாலும் எடுத்துக் கொள்ளப்படுவதற்காக.’ என்னிடமிருந்து அன்பைக் கொண்டு உம்மீது நான் பொழிந்தேன், மேலும் எனது விழிப்பான கண்ணின் முன்னர் உம்மை நான் ஆக்கிக் கொண்டேன்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'the-calf',
        'icon'    => '🐄',
        'title'   => 'கன்றுக்குட்டி',
        'verse'   => 'குர்ஆன் 20:88',
        'blurb'   => 'ஒரு கன்றின் சப்தத்துடன் பூர்த்தியாக்கப்பட்டு, வடிக்கப்பட்ட ஒரு கன்றை அவர்களுக்காக அவன் உருவாக்கினான். அவர்கள் கூறினர், இது தான் உங்கள் தெய்வமும், மோஸஸின் தெய்வமும் ஆகும். இவ்விதமாக, அவன் மறந்து விட்டான்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'silent-idols',
        'icon'    => '🔨',
        'title'   => 'பேசாத சிலைகள்',
        'verse'   => 'குர்ஆன் 21:58,59',
        'blurb'   => 'அவர் அவற்றைத் துண்டுகளாக உடைத்து விட்டார், பெரியதான ஒன்றைத் தவிர, அவர்கள் அதனை விசாரிக்கும் பொருட்டு. அவர்கள் கூறினர், நம்முடைய தெய்வங்களுக்கு இதனைச் செய்தவர் எவராயினும் அவர் உண்மையில் வரம்புமீறிய ஒருவர்தான்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'cool-and-safe-fire',
        'icon'    => '🔥',
        'title'   => 'குளிர்ச்சியான பாதுகாப்பான நெருப்பு',
        'verse'   => 'குர்ஆன் 21:68,69',
        'blurb'   => 'அவர்கள் கூறினர், அப்படித்தான் செய்ய வேண்டும் என்று நீங்கள் முடிவெடுத்து விட்டால், அவரை எரித்து உங்கள் தெய்வங்களுக்கு ஆதரவளியுங்கள். நாம் கூறினோம், நெருப்பே, ஆப்ரஹாமுக்குக் குளிர்ச்சியாகவும் பாதுகாப்பாகவும் ஆகிவிடு.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'god-is-hearer',
        'icon'    => '🐋',
        'title'   => 'கடவுள் செவியேற்பவர்',
        'verse'   => 'குர்ஆன் 21:87',
        'blurb'   => 'மேலும் ஜன்-நூன் (ஜோனா, தனது பெயரில் ‘ந ஒன்றைக் கொண்டவர்), நாம் அவரைக் கட்டுப் படுத்த முடியாது என்றெண்ணிக் கொண்டு, ஆட்சேபனையுடன் தன் இறைப்பணியைக் கை விட்டார். அவர் (பெரிய மீனின் வயிற்றின்) இருளிலிருந்து இறைஞ்சுவதில் சென்று முடிந்தார்: உம்மை விடுத்து வேறு தெய்வம் இல்லை. நீர் துதிப்பிற்குரியவர். நான் ஒரு பெரும்பாவத்தைச் செய்து விட்டேன்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'profound-sign',
        'icon'    => '🐍',
        'title'   => 'ஓர் ஆழ்ந்த அத்தாட்சி',
        'verse'   => 'குர்ஆன் 26:45,46',
        'blurb'   => 'மோஸஸ் தனது கோலை வீசினார், உடனே அது அவர்கள் உருவாக்கியவற்றை விழுங்கி விட்டது. மந்திரவாதிகள் சிரம் பணிந்து விழுந்தனர்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'god-makes-a-way',
        'icon'    => '🌊',
        'title'   => 'கடவுள் வழி ஏற்படுத்துகிறார்',
        'verse'   => 'குர்ஆன் 26:62,63',
        'blurb'   => 'அவர் கூறினார், வாய்ப்பே இல்லை. என் இரட்சகர் என்னுடன் இருக்கின்றார்; அவர் என்னை வழி நடத்துவார். பின்னர் மோஸஸுக்கு நாம் உள்ளுணர்வளித்தோம்: உமது தடியைக் கொண்டு கடலினை அடிப்பீராக, உடனே அது பிரிந்தது. ஒவ்வொரு பகுதியும் மிகப் பெரியதொரு மலையைப் போன்று இருந்தது.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'miraculous-camel',
        'icon'    => '🐫',
        'title'   => 'அற்புத ஒட்டகம்',
        'verse'   => 'குர்ஆன் 26:155',
        'blurb'   => 'அவர் கூறினார், இதோ, அதற்கென நிர்ணயிக்கப் பட்ட ஒரு நாளில் மட்டும் அருந்துகின்ற ஓர் ஒட்டகம்; உங்களுடைய அருந்துதலுக்கெனக் குறிப்பிடப்பட்ட நாட்களிலிருந்து வேறுபட்ட ஒரு நாள்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'solomon-and-ants',
        'icon'    => '🐜',
        'title'   => 'ஸாலமனும் எறும்புகளும்',
        'verse'   => 'குர்ஆன் 27:18',
        'blurb'   => 'எறும்புகளின் பள்ளத்தாக்கை அவர்கள் நெருங்கிய போது, ஓர் எறும்பு கூறியது, ஓ எறும்புகளே, ஸாலமனும் அவருடைய படையினரும் அறியாமல் உங்களை நசுக்கிவிடாதிருக்கும் பொருட்டு, உங்களுடைய வீடுகளுக்குள் சென்று விடுங்கள்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'burning-bush',
        'icon'    => '🌳',
        'title'   => 'எரிகின்ற புதர்',
        'verse'   => 'குர்ஆன் 28:30',
        'blurb'   => 'அவர் அதனை அடைந்தபோது, எரிகின்ற புதர் இருந்த ஆசீர்வதிக்கப்பட்ட இடத்தில், பள்ளத்தாக்கின் வலப்புற ஓரத்திலிருந்து அவர் அழைக்கப்பட்டார்: மோஸஸே, நான்தான். கடவுள்; பிரபஞ்சத்தின் இரட்சகர்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'weight-of-riches',
        'icon'    => '🗝️',
        'title'   => 'செல்வத்தின் பாரம்',
        'verse'   => 'குர்ஆன் 28:76',
        'blurb'   => '(அடிமை மேய்ப்பனான) காரூன் மோஸஸின் சமூகத்தாரில் உள்ளவனாக இருந்து அவர்களுக்குத் துரோக மிழைத்து, அவர்களை அடக்கு முறை செய்தவன் ஆவான். வலிமையான ஒரு குழுவிற்கே கிட்டத்தட்ட மிகவும் கனமாக இருக்கும் அளவுக்கு அதன் சாவிகளைக் கொண்ட ஏராளமான பொக்கிஷங்களை நாம் அவனுக்குத் தந்தோம். அவனுடைய சமூகத்தார் அவனிடம் கூறினர், ஆணவம் மிகக் கொள்ளாதே; ஆணவம் கொண்டோரைக் கடவுள் நேசிப்பதில்லை.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'ninety-nine-vs-one',
        'icon'    => '🐑',
        'title'   => '99க்கு எதிராக 1',
        'verse'   => 'குர்ஆன் 38:23',
        'blurb'   => 'இந்த என்னுடைய சகோதரர் தொன்னூற்றொன்பது ஆடுகளைச் சொந்தமாகக் கொண்டுள்ளார், அதே சமயம் நான் ஒரே ஆட்டைச் சொந்தமாகக் கொண்டிருக்கின்றேன். என்னுடைய ஆட்டையும் அவருடைய வற்றுடன் கலந்து விட அவர் விரும்புகின்றார், மேலும் தொடர்ந்து என்னை நெருக்கிக் கொண்டிருக்கின்றார்.',
        'practice'=> true,
    ),
    array(
        'slug'    => 'alhamdulillah',
        'icon'    => '🤲',
        'title'   => 'அல்ஹம்துலில்லாஹ்',
        'verse'   => 'Praise be to GOD',
        'blurb'   => 'புகழ்ச்சி கடவுள்-க்குரியது, பிரபஞ்சத்தின் இரட்சகர்.',
        'practice'=> false,
    ),
);

// Build a JS-ready array (adds full asset URLs) without touching $stories' PHP shape.
$js_stories = array();
foreach ($stories as $s) {
    $js_stories[] = array(
        'slug'     => $s['slug'],
        'title'    => $s['title'],
        'verse'    => $s['verse'],
        'blurb'    => $s['blurb'],
        'lineart'  => $base . '/' . $s['slug'] . '-lineart.png',
        'print'    => $base . '/' . $s['slug'] . '-print.jpg',
        'practice' => $s['practice'] ? ($base . '/' . $s['slug'] . '-practice.jpg') : null,
    );
}
?>
<div class="page-hero">
  <div class="wrap">
    <div class="crumb reveal"><a href="<?php echo esc_url(home_url('/')); ?>">முகப்பு</a> / குர்ஆன் கலரிங் புத்தகம்</div>
    <h1 class="reveal">🎨 குழந்தைகளுக்கான குர்ஆன் கலரிங் புத்தகம்</h1>
    <p class="reveal" style="max-width:640px">குர்ஆனில் உள்ள நபிமார்களின் கதைகளை ஆன்லைனில் வண்ணமிடுங்கள், அல்லது வெற்றுப் பக்கத்தை அச்சிட்டுக் கையால் வண்ணமிடுங்கள் — பின்னர் அதற்கு அடிப்படையான வசனத்தை எழுதிப் பயிற்சி செய்யுங்கள்.</p>
    <p class="reveal"><a class="btn btn-gold btn-sm" href="<?php echo esc_url($base . '/quran-coloring-book-full.pdf'); ?>" target="_blank" rel="noopener">📥 முழுப் புத்தகத்தைப் பதிவிறக்கவும் (PDF)</a></p>
  </div>
</div>

<div class="blk cb-intro">
  <div class="wrap">
    <div class="cb-intro-card reveal">
      <p>بِسْمِ اللَّهِ الرَّحْمَٰنِ الرَّحِيمِ — கடவுள்-ன் பெயரால், மிக்க அருளாளர், மிக்க கருணையாளர்.</p>
      <p>கீழே உள்ள ஒரு கதையைத் தேர்ந்தெடுங்கள். விரலாலோ அல்லது மவுஸாலோ இங்கேயே திரையில் வண்ணமிடலாம் — பின்னர் உங்கள் படத்தைச் சேமித்து வைக்கலாம். அல்லது வெற்றுப் பக்கத்தை அச்சிட்டு, வண்ணப் பென்சில்களால் கையால் வண்ணமிடலாம். ஒவ்வொரு கதைக்கும் வசனத்தை எழுதிப் பயிற்சி செய்யும் தாளும் அச்சிடக் கிடைக்கும்.</p>
    </div>
  </div>
</div>

<div class="blk cb-picker">
  <div class="wrap">
    <div class="sec-head">
      <span class="kicker reveal">🖍️ ஒரு கதையைத் தேர்ந்தெடுங்கள்</span>
      <h2 class="reveal">வண்ணமிட 24 குர்ஆன் கதைகள்</h2>
    </div>
    <div class="cb-grid">
      <?php foreach ($stories as $i => $s) : ?>
      <button type="button" class="cb-card reveal" data-story="<?php echo esc_attr($s['slug']); ?>">
        <span class="cb-card-thumb" style="background-image:url('<?php echo esc_url($base . '/' . $s['slug'] . '-thumb.jpg'); ?>')"></span>
        <span class="cb-card-body">
          <span class="cb-card-icon"><?php echo esc_html($s['icon']); ?></span>
          <span class="cb-card-title"><?php echo esc_html($s['title']); ?></span>
          <span class="cb-card-verse"><?php echo esc_html($s['verse']); ?></span>
        </span>
      </button>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<div class="blk cb-workspace" id="cbWorkspace">
  <div class="wrap">
    <div class="cb-panel reveal">
      <div class="cb-fs-topbar">
        <span class="cb-fs-story-title" id="cbFsTitle"></span>
        <button type="button" id="cbFsClose" class="cb-fs-close" title="முழுத்திரையை மூடு (Esc)">✕</button>
      </div>
      <div class="cb-panel-head">
        <div>
          <div class="cb-story-verse" id="cbStoryVerse">குர்ஆன் 2:127</div>
          <h2 id="cbStoryTitle">கஃபாவைக் கட்டுதல்</h2>
          <p id="cbStoryBlurb" class="cb-blurb">ஆலயத்தின் அஸ்திவாரங்களை ஆப்ரஹாம் உயர்த்திய போது, இஸ்மாயீலுடன் சேர்ந்து(அவர்கள் பிரார்த்தித்தனர்): எங்கள் இரட்சகரே, இதனை எங்களிடமிருந்து ஏற்றுக் கொள்வீராக. நீரே செவியேற்பவர், எல்லாம் அறிந்தவர்.</p>
        </div>
        <div class="cb-panel-actions">
          <a href="#" id="cbPrintBlank" target="_blank" rel="noopener" class="btn btn-ghost">🖨️ வெற்றுப் பக்கத்தை அச்சிடவும்</a>
          <a href="#" id="cbPrintPractice" target="_blank" rel="noopener" class="btn btn-ghost">✍️ எழுதும் பயிற்சித் தாள்</a>
        </div>
      </div>

      <div class="cb-toolbar">
        <div class="cb-swatches" id="cbSwatches"></div>
        <div class="cb-tools">
          <label class="cb-custom-color">
            <input type="color" id="cbCustomColor" value="#e63946">
            <span>தனிப்பயன்</span>
          </label>
          <div class="cb-tool-toggle">
            <button type="button" class="cb-tool-btn active" data-tool="fill" id="cbToolFill" title="வாளி நிரப்பு">🪣 நிரப்பு</button>
            <button type="button" class="cb-tool-btn" data-tool="brush" id="cbToolBrush" title="தூரிகை">🖌️ தூரிகை</button>
          </div>
          <input type="range" id="cbBrushSize" min="4" max="60" value="18" class="cb-brush-size" title="Brush size" hidden>
          <button type="button" id="cbFsOpen" class="btn btn-ghost btn-sm">⛶ <span class="cb-btn-label">முழுத்திரை</span></button>
          <button type="button" id="cbResetZoom" class="btn btn-ghost btn-sm" title="பெரிதாக்கலை மீட்டமை">🔍 <span class="cb-btn-label">பெரிதாக்கலை மீட்டமை</span></button>
          <button type="button" id="cbUndo" class="btn btn-ghost btn-sm">↩️ <span class="cb-btn-label">செயல்தவிர்</span></button>
          <button type="button" id="cbClear" class="btn btn-ghost btn-sm">🗑️ <span class="cb-btn-label">அழி</span></button>
          <button type="button" id="cbSave" class="btn btn-gold btn-sm">💾 <span class="cb-btn-label">என் படத்தைச் சேமி</span></button>
        </div>
      </div>

      <div class="cb-canvas-wrap" id="cbCanvasWrap">
        <div class="cb-canvas-inner" id="cbCanvasInner">
          <canvas id="cbPaintCanvas"></canvas>
          <img id="cbLineImg" alt="" draggable="false">
          <div class="cb-loading" id="cbLoading">ஏற்றப்படுகிறது…</div>
        </div>
      </div>
      <p class="cb-hint">குறிப்பு: ஒரு வண்ணத்தைத் தட்டுங்கள், பின்னர் நிரப்ப வேண்டிய பகுதிக்குள் தட்டுங்கள். நுணுக்கமான வேலைக்கு 🖌️ தூரிகை என்பதற்கு மாறுங்கள்.</p>
    </div>
  </div>
</div>

<div class="verse reveal">
  <div class="wrap">
    <p>இந்தக் குர்ஆனுடைய வெளிப்பாட்டின் மூலம் மிகத் துல்லியமான வரலாற்றை நாம் உமக்கு எடுத்துரைக்கின்றோம். <span>— குர்ஆன் 12:3</span></p>
  </div>
</div>

<style>
.cb-intro-card{max-width:820px;margin:0 auto;background:var(--panel-2);border:1px solid var(--line);border-radius:var(--radius-lg);padding:22px 26px;text-align:center}
.cb-intro-card p{margin:0 0 8px;color:var(--ink-soft)}
.cb-intro-card p:last-child{margin-bottom:0}

.cb-grid{display:grid;grid-template-columns:repeat(auto-fill,minmax(220px,1fr));gap:18px;margin-top:22px}
.cb-card{display:flex;flex-direction:column;text-align:left;background:var(--panel);border:1px solid var(--line);border-radius:var(--radius-lg);overflow:hidden;cursor:pointer;padding:0;font:inherit;color:inherit;transition:transform .15s ease,border-color .15s ease,box-shadow .15s ease}
.cb-card:hover,.cb-card:focus-visible{transform:translateY(-4px);border-color:var(--gold);box-shadow:0 10px 26px rgba(0,0,0,.25)}
.cb-card.active{border-color:var(--gold-bright);box-shadow:0 0 0 2px var(--gold-bright) inset}
.cb-card-thumb{display:block;width:100%;aspect-ratio:4/3;background-color:#fff;background-size:cover;background-position:top center}
.cb-card-body{display:flex;flex-direction:column;gap:4px;padding:14px 16px 18px}
.cb-card-icon{font-size:22px}
.cb-card-title{font-weight:700;color:var(--ink)}
.cb-card-verse{font-size:13px;color:var(--gold)}

.cb-panel{background:var(--panel-2);border:1px solid var(--line);border-radius:var(--radius-lg);padding:24px;max-width:980px;margin:0 auto}
.cb-panel-head{display:flex;flex-wrap:wrap;gap:16px;justify-content:space-between;align-items:flex-start;margin-bottom:18px}
.cb-panel-head h2{margin:2px 0 6px}
.cb-story-verse{color:var(--gold);font-size:13px;font-weight:700;letter-spacing:.04em;text-transform:uppercase}
.cb-blurb{color:var(--muted);max-width:520px;margin:0}
.cb-panel-actions{display:flex;flex-wrap:wrap;gap:10px}

.cb-toolbar{display:flex;flex-wrap:wrap;gap:14px;align-items:center;justify-content:space-between;background:var(--panel);border:1px solid var(--line);border-radius:var(--radius);padding:12px 14px;margin-bottom:18px}
.cb-swatches{display:flex;flex-wrap:wrap;gap:7px;max-width:420px}
.cb-swatch{width:26px;height:26px;border-radius:50%;border:2px solid rgba(255,255,255,.25);cursor:pointer;padding:0}
.cb-swatch.active{border-color:var(--gold-bright);box-shadow:0 0 0 2px var(--gold-bright)}
.cb-tools{display:flex;flex-wrap:wrap;gap:10px;align-items:center}
.cb-custom-color{display:flex;align-items:center;gap:6px;font-size:13px;color:var(--muted)}
.cb-custom-color input[type=color]{width:30px;height:30px;border:none;background:none;cursor:pointer;padding:0}
.cb-tool-toggle{display:flex;border:1px solid var(--line);border-radius:999px;overflow:hidden}
.cb-tool-btn{border:none;background:transparent;color:var(--ink-soft);padding:7px 14px;cursor:pointer;font-size:13px}
.cb-tool-btn.active{background:var(--gold-grad);color:#241a06;font-weight:700}
.cb-brush-size{width:110px}
.btn-sm{padding:8px 14px;font-size:13px}

.cb-canvas-wrap{display:flex;overflow:hidden;justify-content:center;background:repeating-conic-gradient(#f4ede0 0% 25%,#e9dfcd 0% 50%) 0 0/24px 24px;border-radius:var(--radius);padding:18px;border:1px solid var(--line)}
.cb-canvas-inner{position:relative;width:100%;max-width:520px;line-height:0}
.cb-canvas-inner canvas{width:100%;height:auto;display:block;background:#fff;border-radius:6px;touch-action:none}
.cb-canvas-inner img{position:absolute;inset:0;width:100%;height:100%;pointer-events:none;user-select:none}
.cb-loading{position:absolute;inset:0;display:flex;align-items:center;justify-content:center;background:rgba(255,255,255,.7);color:#333;font-weight:600;border-radius:6px}
.cb-loading[hidden]{display:none}
.cb-hint{text-align:center;color:var(--muted);font-size:13px;margin:14px 0 0}

@media (max-width:640px){
  .cb-panel{padding:16px}
  .cb-panel-actions{width:100%}
  .cb-panel-actions .btn{flex:1;text-align:center}
}

/* ---- Fullscreen coloring mode (desktop + mobile, no page scrolling) ---- */
.cb-fs-topbar{display:none;align-items:center;justify-content:space-between;gap:12px;margin-bottom:10px}
.cb-fs-story-title{font-weight:700;color:var(--ink);font-size:15px;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}
.cb-fs-close{display:none;align-items:center;justify-content:center;flex:0 0 auto;width:38px;height:38px;border-radius:50%;border:1px solid var(--line);background:var(--panel);color:var(--ink);font-size:17px;line-height:1;cursor:pointer;box-shadow:0 4px 14px rgba(0,0,0,.25)}
.cb-fs-close:hover{border-color:var(--gold);color:var(--gold)}

body.cb-fullscreen{overflow:hidden}
body.cb-fullscreen #cbWorkspace{position:fixed;inset:0;z-index:99990;background:var(--bg);display:flex;padding:0;margin:0}
body.cb-fullscreen #cbWorkspace .wrap{width:100%;max-width:none;padding:0;margin:0;display:flex}
body.cb-fullscreen .cb-panel{width:100%;max-width:none;margin:0;border-radius:0;border:none;display:flex;flex-direction:column;height:100%;padding:calc(10px + env(safe-area-inset-top)) 14px calc(10px + env(safe-area-inset-bottom))}
body.cb-fullscreen .cb-fs-topbar{display:flex}
body.cb-fullscreen .cb-fs-close{display:flex}
body.cb-fullscreen .cb-panel-head,
body.cb-fullscreen .cb-hint,
body.cb-fullscreen #cbFsOpen{display:none}
body.cb-fullscreen .cb-toolbar{margin-bottom:10px;flex:0 0 auto}
body.cb-fullscreen .cb-canvas-wrap{flex:1;min-height:0;display:flex;align-items:center;justify-content:center;padding:6px;border-radius:var(--radius)}
body.cb-fullscreen .cb-canvas-inner{margin:0 auto;max-width:100%;max-height:100%}
body.cb-fullscreen .cb-canvas-inner canvas,
body.cb-fullscreen .cb-canvas-inner img{width:100%;height:100%}

/* Compact toolbar in fullscreen on small/mobile screens — trades label text
   and wrapped rows for a couple of horizontally-scrollable strips, freeing
   more height for the canvas itself. */
@media (max-width:640px){
  body.cb-fullscreen .cb-panel{padding-left:8px;padding-right:8px}
  body.cb-fullscreen .cb-fs-topbar{margin-bottom:6px}
  body.cb-fullscreen .cb-fs-story-title{font-size:13px}
  body.cb-fullscreen .cb-fs-close{width:32px;height:32px;font-size:15px}
  body.cb-fullscreen .cb-toolbar{flex-direction:column;flex-wrap:nowrap;align-items:stretch;gap:6px;padding:6px 8px;margin-bottom:6px}
  body.cb-fullscreen .cb-swatches{flex-wrap:nowrap;overflow-x:auto;-webkit-overflow-scrolling:touch;max-width:none;gap:6px;padding-bottom:2px}
  body.cb-fullscreen .cb-swatch{width:22px;height:22px;flex:0 0 auto}
  body.cb-fullscreen .cb-tools{flex-wrap:nowrap;overflow-x:auto;-webkit-overflow-scrolling:touch;gap:6px;justify-content:flex-start}
  body.cb-fullscreen .cb-custom-color{flex:0 0 auto;gap:0}
  body.cb-fullscreen .cb-custom-color span,
  body.cb-fullscreen .cb-btn-label{display:none}
  body.cb-fullscreen .cb-custom-color input[type=color]{width:26px;height:26px}
  body.cb-fullscreen .cb-tool-btn{padding:6px 10px;font-size:12px;white-space:nowrap;flex:0 0 auto}
  body.cb-fullscreen .cb-brush-size{width:70px;flex:0 0 auto}
  body.cb-fullscreen .btn-sm{padding:6px 9px;font-size:14px;white-space:nowrap;flex:0 0 auto}
}
</style>

<script>
window.GA_COLORING_STORIES = <?php echo wp_json_encode($js_stories); ?>;
</script>
<script>
(function () {
  "use strict";
  var STORIES = window.GA_COLORING_STORIES || [];
  var PALETTE = [
    "#ffffff","#000000","#6b4226","#e63946","#f3722c","#f9c74f",
    "#90be6d","#43aa8b","#277da1","#4361ee","#7209b7","#f72585",
    "#ffb3c1","#a9def9","#d4a373","#ffd60a"
  ];

  var current = null;         // current story object
  var tool = "fill";
  var color = "#e63946";
  var brushSize = 18;
  var wallMask = null;        // Uint8Array, 1 = line/wall
  var maskW = 0, maskH = 0;
  var paintCanvas = document.getElementById("cbPaintCanvas");
  var ctx = paintCanvas ? paintCanvas.getContext("2d", { willReadFrequently: true }) : null;
  var lineImg = document.getElementById("cbLineImg");
  var loadingEl = document.getElementById("cbLoading");
  var history = [];
  var drawing = false;
  var canvasZoom = 1, canvasPanX = 0, canvasPanY = 0;
  var activePointers = new Map();
  var pinchBase = null;
  var suppressPaintUntilLift = false;
  var ZOOM_MIN = 1, ZOOM_MAX = 4;

  function $(id) { return document.getElementById(id); }

  function buildSwatches() {
    var wrap = $("cbSwatches");
    if (!wrap) return;
    PALETTE.forEach(function (c, i) {
      var b = document.createElement("button");
      b.type = "button";
      b.className = "cb-swatch" + (i === 3 ? " active" : "");
      b.style.background = c;
      b.setAttribute("data-color", c);
      b.addEventListener("click", function () {
        setColor(c);
        wrap.querySelectorAll(".cb-swatch").forEach(function (s) { s.classList.remove("active"); });
        b.classList.add("active");
      });
      wrap.appendChild(b);
    });
  }

  function setColor(c) { color = c; }

  function setTool(t) {
    tool = t;
    $("cbToolFill").classList.toggle("active", t === "fill");
    $("cbToolBrush").classList.toggle("active", t === "brush");
    $("cbBrushSize").hidden = t !== "brush";
  }

  function loadStory(story) {
    current = story;
    resetCanvasView();
    $("cbStoryVerse").textContent = story.verse;
    $("cbStoryTitle").textContent = story.title;
    $("cbStoryBlurb").textContent = story.blurb;
    var fsTitleEl = $("cbFsTitle");
    if (fsTitleEl) fsTitleEl.textContent = story.title;
    $("cbPrintBlank").href = story.print;
    var practiceBtn = $("cbPrintPractice");
    if (story.practice) {
      practiceBtn.href = story.practice;
      practiceBtn.style.display = "";
    } else {
      practiceBtn.style.display = "none";
    }
    loadingEl.hidden = false;
    history = [];

    var probe = new Image();
    probe.crossOrigin = "anonymous";
    probe.onload = function () {
      maskW = probe.naturalWidth;
      maskH = probe.naturalHeight;
      paintCanvas.width = maskW;
      paintCanvas.height = maskH;
      ctx.clearRect(0, 0, maskW, maskH);

      var maskCanvas = document.createElement("canvas");
      maskCanvas.width = maskW;
      maskCanvas.height = maskH;
      var mctx = maskCanvas.getContext("2d");
      mctx.drawImage(probe, 0, 0);
      var data;
      try {
        data = mctx.getImageData(0, 0, maskW, maskH).data;
      } catch (e) {
        data = null;
      }
      wallMask = new Uint8Array(maskW * maskH);
      if (data) {
        for (var p = 0, px = 0; p < data.length; p += 4, px++) {
          wallMask[px] = data[p + 3] > 40 ? 1 : 0; // alpha threshold = line
        }
      }
      lineImg.src = story.lineart;
      loadingEl.hidden = true;
      pushHistory();
      fitCanvasToContainer();
    };
    probe.onerror = function () { loadingEl.textContent = "படத்தை ஏற்ற முடியவில்லை."; };
    probe.src = story.lineart;
  }

  // Keeps the canvas sized to fit fully inside the fullscreen viewport
  // (both width and height), so kids can colour without any scrolling.
  function fitCanvasToContainer() {
    if (!document.body.classList.contains("cb-fullscreen")) return;
    var wrapEl = $("cbCanvasWrap");
    var innerEl = $("cbCanvasInner");
    if (!wrapEl || !innerEl || !maskW || !maskH) return;
    var availW = wrapEl.clientWidth;
    var availH = wrapEl.clientHeight;
    if (availW <= 0 || availH <= 0) return;
    var scale = Math.min(availW / maskW, availH / maskH);
    innerEl.style.width = Math.floor(maskW * scale) + "px";
    innerEl.style.height = Math.floor(maskH * scale) + "px";
  }

  function enterFullscreen() {
    document.body.classList.add("cb-fullscreen");
    requestAnimationFrame(fitCanvasToContainer);
  }

  function exitFullscreen() {
    document.body.classList.remove("cb-fullscreen");
    var innerEl = $("cbCanvasInner");
    if (innerEl) { innerEl.style.width = ""; innerEl.style.height = ""; }
  }

  function pushHistory() {
    if (!ctx) return;
    try {
      history.push(ctx.getImageData(0, 0, maskW, maskH));
      if (history.length > 15) history.shift();
    } catch (e) {}
  }

  function undo() {
    if (history.length < 2) return;
    history.pop();
    var prev = history[history.length - 1];
    ctx.putImageData(prev, 0, 0);
  }

  function clearCanvas() {
    ctx.clearRect(0, 0, maskW, maskH);
    pushHistory();
  }

  function hexToRgba(hex) {
    var h = hex.replace("#", "");
    if (h.length === 3) h = h.split("").map(function (c) { return c + c; }).join("");
    var num = parseInt(h, 16);
    return [ (num >> 16) & 255, (num >> 8) & 255, num & 255, 255 ];
  }

  function floodFill(startX, startY, fillColor) {
    if (!wallMask || startX < 0 || startY < 0 || startX >= maskW || startY >= maskH) return;
    if (wallMask[startY * maskW + startX]) return; // clicked on a line
    var imgData = ctx.getImageData(0, 0, maskW, maskH);
    var d = imgData.data;
    var startIdx = (startY * maskW + startX) * 4;
    var targetR = d[startIdx], targetG = d[startIdx + 1], targetB = d[startIdx + 2], targetA = d[startIdx + 3];
    var fr = fillColor[0], fg = fillColor[1], fb = fillColor[2], fa = fillColor[3];
    if (targetR === fr && targetG === fg && targetB === fb && targetA === fa) return;

    function matches(idx) {
      return d[idx] === targetR && d[idx + 1] === targetG && d[idx + 2] === targetB && d[idx + 3] === targetA;
    }

    var stack = [[startX, startY]];
    var visited = new Uint8Array(maskW * maskH);
    while (stack.length) {
      var pt = stack.pop();
      var x = pt[0], y = pt[1];
      var px = y * maskW + x;
      if (x < 0 || x >= maskW || y < 0 || y >= maskH) continue;
      if (visited[px] || wallMask[px]) continue;
      var idx = px * 4;
      if (!matches(idx)) continue;
      // fill this whole horizontal span
      var xl = x;
      while (xl >= 0 && !wallMask[y * maskW + xl] && matches((y * maskW + xl) * 4)) xl--;
      xl++;
      var xr = x;
      while (xr < maskW && !wallMask[y * maskW + xr] && matches((y * maskW + xr) * 4)) xr++;
      xr--;
      for (var xx = xl; xx <= xr; xx++) {
        var spx = y * maskW + xx;
        if (visited[spx]) continue;
        visited[spx] = 1;
        var sidx = spx * 4;
        d[sidx] = fr; d[sidx + 1] = fg; d[sidx + 2] = fb; d[sidx + 3] = fa;
        if (y > 0) { var up = spx - maskW; if (!visited[up] && !wallMask[up] && matches(up * 4)) stack.push([xx, y - 1]); }
        if (y < maskH - 1) { var dn = spx + maskW; if (!visited[dn] && !wallMask[dn] && matches(dn * 4)) stack.push([xx, y + 1]); }
      }
    }
    ctx.putImageData(imgData, 0, 0);
  }

  function pointerDist(p1, p2) {
    var dx = p1.x - p2.x, dy = p1.y - p2.y;
    return Math.sqrt(dx * dx + dy * dy);
  }
  function pointerMid(p1, p2) {
    return { x: (p1.x + p2.x) / 2, y: (p1.y + p2.y) / 2 };
  }
  function applyCanvasTransform() {
    var innerEl = $("cbCanvasInner");
    if (innerEl) innerEl.style.transform = "translate(" + canvasPanX + "px," + canvasPanY + "px) scale(" + canvasZoom + ")";
  }
  function clampPan() {
    var wrapEl = $("cbCanvasWrap"), innerEl = $("cbCanvasInner");
    if (!wrapEl || !innerEl) return;
    var w = innerEl.offsetWidth * canvasZoom, h = innerEl.offsetHeight * canvasZoom;
    var maxX = Math.max(0, (w - wrapEl.clientWidth) / 2 + 60);
    var maxY = Math.max(0, (h - wrapEl.clientHeight) / 2 + 60);
    canvasPanX = Math.max(-maxX, Math.min(maxX, canvasPanX));
    canvasPanY = Math.max(-maxY, Math.min(maxY, canvasPanY));
  }
  function resetCanvasView() {
    var innerEl = $("cbCanvasInner");
    canvasZoom = 1; canvasPanX = 0; canvasPanY = 0;
    if (innerEl) {
      innerEl.style.transition = "transform .25s ease";
      applyCanvasTransform();
      setTimeout(function () { innerEl.style.transition = ""; }, 260);
    }
  }

  function canvasPoint(evt) {
    var rect = paintCanvas.getBoundingClientRect();
    var cx = (evt.clientX !== undefined) ? evt.clientX : (evt.touches && evt.touches[0].clientX);
    var cy = (evt.clientY !== undefined) ? evt.clientY : (evt.touches && evt.touches[0].clientY);
    var x = Math.round((cx - rect.left) * (maskW / rect.width));
    var y = Math.round((cy - rect.top) * (maskH / rect.height));
    return [x, y];
  }

  function brushDab(x, y) {
    var rgba = hexToRgba(color);
    ctx.fillStyle = "rgba(" + rgba[0] + "," + rgba[1] + "," + rgba[2] + ",1)";
    ctx.beginPath();
    ctx.arc(x, y, brushSize / 2, 0, Math.PI * 2);
    ctx.fill();
  }

  function onPointerDown(evt) {
    if (!current) return;
    activePointers.set(evt.pointerId, { x: evt.clientX, y: evt.clientY });
    if (activePointers.size >= 2) {
      evt.preventDefault();
      drawing = false;
      suppressPaintUntilLift = true;
      var pts2 = Array.from(activePointers.values()).slice(0, 2);
      pinchBase = {
        dist: pointerDist(pts2[0], pts2[1]) || 1,
        mid: pointerMid(pts2[0], pts2[1]),
        scale: canvasZoom,
        panX: canvasPanX,
        panY: canvasPanY
      };
      return;
    }
    if (suppressPaintUntilLift) return;
    evt.preventDefault();
    var pt = canvasPoint(evt);
    if (tool === "fill") {
      floodFill(pt[0], pt[1], hexToRgba(color));
      pushHistory();
    } else {
      drawing = true;
      brushDab(pt[0], pt[1]);
    }
  }
  function onPointerMove(evt) {
    if (activePointers.has(evt.pointerId)) {
      activePointers.set(evt.pointerId, { x: evt.clientX, y: evt.clientY });
    }
    if (activePointers.size >= 2 && pinchBase) {
      evt.preventDefault();
      var pts2 = Array.from(activePointers.values()).slice(0, 2);
      var dist = pointerDist(pts2[0], pts2[1]) || 1;
      var mid = pointerMid(pts2[0], pts2[1]);
      canvasZoom = Math.max(ZOOM_MIN, Math.min(ZOOM_MAX, pinchBase.scale * (dist / pinchBase.dist)));
      canvasPanX = pinchBase.panX + (mid.x - pinchBase.mid.x);
      canvasPanY = pinchBase.panY + (mid.y - pinchBase.mid.y);
      clampPan();
      applyCanvasTransform();
      return;
    }
    if (!drawing || tool !== "brush") return;
    evt.preventDefault();
    var pt = canvasPoint(evt);
    brushDab(pt[0], pt[1]);
  }
  function onPointerUp(evt) {
    if (evt && activePointers.has(evt.pointerId)) activePointers.delete(evt.pointerId);
    if (activePointers.size < 2) pinchBase = null;
    if (activePointers.size === 0) {
      suppressPaintUntilLift = false;
      if (drawing) { drawing = false; pushHistory(); }
    }
  }

  // Downloads a canvas as a PNG file. Uses a Blob + object URL rather than a
  // raw base64 data: URL — some browsers (notably Microsoft Edge, whose
  // Defender SmartScreen treats large data: URL "downloads" as suspicious
  // and can silently block or warn on them) don't reliably save a data: URL
  // via a synthetic <a download> click, but handle a blob: object URL the
  // same way Chrome does. Falls back to the old data-URL technique, and then
  // to opening the image in a new tab, for any browser missing toBlob.
  function downloadCanvas(canvasEl, filename) {
    function viaDataUrl() {
      try {
        var durl = canvasEl.toDataURL("image/png");
        var a = document.createElement("a");
        a.href = durl;
        a.download = filename;
        document.body.appendChild(a);
        a.click();
        document.body.removeChild(a);
      } catch (e) {
        try { window.open(canvasEl.toDataURL("image/png"), "_blank"); } catch (e2) {}
      }
    }
    function viaBlob(blob) {
      if (!blob) { viaDataUrl(); return; }
      if (navigator.msSaveOrOpenBlob) { // old (EdgeHTML) Edge / IE11
        navigator.msSaveOrOpenBlob(blob, filename);
        return;
      }
      var url = URL.createObjectURL(blob);
      var a = document.createElement("a");
      a.href = url;
      a.download = filename;
      document.body.appendChild(a);
      a.click();
      document.body.removeChild(a);
      setTimeout(function () { URL.revokeObjectURL(url); }, 4000);
    }
    if (canvasEl.toBlob) {
      canvasEl.toBlob(viaBlob, "image/png");
    } else {
      viaDataUrl();
    }
  }

  function saveImage() {
    if (!current) return;
    var out = document.createElement("canvas");
    out.width = maskW; out.height = maskH;
    var octx = out.getContext("2d");
    octx.fillStyle = "#ffffff";
    octx.fillRect(0, 0, maskW, maskH);
    octx.drawImage(paintCanvas, 0, 0);
    var lineOnly = new Image();
    lineOnly.crossOrigin = "anonymous";
    var finish = function () { downloadCanvas(out, current.slug + "-my-coloring.png"); };
    lineOnly.onload = function () {
      try { octx.drawImage(lineOnly, 0, 0, maskW, maskH); } catch (e) {}
      finish();
    };
    lineOnly.onerror = finish; // still save the colouring even if the lineart redraw fails
    lineOnly.src = current.lineart;
  }

  function selectCard(slug, openFullscreen) {
    var story = STORIES.filter(function (s) { return s.slug === slug; })[0];
    if (!story) return;
    document.querySelectorAll(".cb-card").forEach(function (c) {
      c.classList.toggle("active", c.getAttribute("data-story") === slug);
    });
    loadStory(story);
    if (openFullscreen) enterFullscreen();
  }

  document.addEventListener("DOMContentLoaded", function () {
    if (!paintCanvas || !STORIES.length) return;
    buildSwatches();
    setColor("#e63946");

    document.querySelectorAll(".cb-card").forEach(function (card) {
      card.addEventListener("click", function () {
        selectCard(card.getAttribute("data-story"), true);
      });
    });

    $("cbToolFill").addEventListener("click", function () { setTool("fill"); });
    $("cbToolBrush").addEventListener("click", function () { setTool("brush"); });
    $("cbBrushSize").addEventListener("input", function (e) { brushSize = parseInt(e.target.value, 10); });
    $("cbCustomColor").addEventListener("input", function (e) {
      setColor(e.target.value);
      document.querySelectorAll(".cb-swatch").forEach(function (s) { s.classList.remove("active"); });
    });
    var resetZoomBtn = $("cbResetZoom");
    if (resetZoomBtn) resetZoomBtn.addEventListener("click", resetCanvasView);
    $("cbUndo").addEventListener("click", undo);
    $("cbClear").addEventListener("click", clearCanvas);
    $("cbSave").addEventListener("click", saveImage);

    var fsOpenBtn = $("cbFsOpen");
    if (fsOpenBtn) fsOpenBtn.addEventListener("click", enterFullscreen);
    var fsCloseBtn = $("cbFsClose");
    if (fsCloseBtn) fsCloseBtn.addEventListener("click", exitFullscreen);
    document.addEventListener("keydown", function (e) {
      if (e.key === "Escape" && document.body.classList.contains("cb-fullscreen")) exitFullscreen();
    });
    window.addEventListener("resize", fitCanvasToContainer);
    window.addEventListener("orientationchange", function () {
      setTimeout(fitCanvasToContainer, 200);
    });

    paintCanvas.addEventListener("pointerdown", onPointerDown);
    paintCanvas.addEventListener("pointermove", onPointerMove);
    window.addEventListener("pointerup", onPointerUp);
    window.addEventListener("pointercancel", onPointerUp);

    selectCard(STORIES[1] ? STORIES[1].slug : STORIES[0].slug, false);
  });
})();
</script>

<?php get_footer(); ?>
