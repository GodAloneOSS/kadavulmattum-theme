<?php
/**
 * Explore page (/explore/) v2: search box, picture tiles, matching icons. Updated 17-11-2026.
 * Rows come from the array below; the Library row is read from the shared books feed.
 */
if (!defined('ABSPATH')) exit;
$xp_lang = 'ta';
$xp_title = 'அனைத்தும் ஒரே இடத்தில் | Kadavulmattum.org';
$xp_desc = 'குர்ஆன் வெப் ஆப், ஆண்ட்ராய்டு மற்றும் iOS ஆப்கள், PDF, ஆடியோ, கணித அற்புதம், புத்தகங்கள், வீடியோக்கள், கருவிகள் அனைத்தும் ஒரே பக்கத்தில்.';
$xp_h1 = 'அனைத்தையும் ஆராயுங்கள்';
$xp_sub = 'குர்ஆன், ஆப்கள், புத்தகங்கள், வீடியோக்கள், கருவிகள் மற்றும் பல — எல்லாம் ஒரே இடத்தில்.';
$xp_ui = array('library' => 'புத்தகங்கள்', 'allbooks' => 'அனைத்து புத்தகங்கள்', 'allbooks_icon' => 'img:https://godalone.in/wp-content/uploads/card-icons/icon-book-library.png', 'ph' => 'எதையும் தேடுங்கள்: குர்ஆன், ஆடியோ, புத்தகங்கள்…', 'none' => 'எதுவும் கிடைக்கவில்லை. வேறு சொல்லை முயற்சிக்கவும்.');
$xp_rows = array(array('குர்ஆன்', array(array('குர்ஆன் வெப் ஆப்', 'https://godalone.in/quran/', 'img:https://godalone.in/quran/icons/icon-192.png', 'tone-g'), array('ஆண்ட்ராய்டு ஆப் – பல மொழி', 'https://play.google.com/store/apps/details?id=ws.submission.my', 'cov:https://godalone.in/wp-content/uploads/xp-icons/appmulti.png', 'tone-t', '🤖'), array('ஆண்ட்ராய்டு ஆப் – அரபி, ஆங்கிலம், தமிழ்', 'https://play.google.com/store/apps/details?id=io.united.quran.v2', 'cov:https://godalone.in/wp-content/uploads/xp-icons/apptamil.png', 'tone-t', '🤖'), array('ஆண்ட்ராய்டு புக் ரீடர்', 'https://submission.ws/download-quran-reader-for-android-authorized-english-version-of-quran-translated-from-the-original-by-dr-rashad-khalifa/', 'cov:https://godalone.in/wp-content/uploads/xp-icons/playbooks.png', 'tone-t'), array('iOS ஆப் – பல மொழி', 'https://apps.apple.com/us/app/submission-the-only-religion/id687445823?ls=1', 'itunes:687445823', 'tone-b', '🍎'), array('iOS ஆப் – வார்த்தைக்கு வார்த்தை', 'https://apps.apple.com/us/app/quran-study-learn-word-by-word/id1447827034', 'itunes:1447827034', 'tone-b', '🍎'), array('PDF – அரபி-ஆங்கிலம்', 'https://drive.google.com/uc?export=download&id=12mFronn0X5m0dvGtHnoEsBoE1KcK4koj', 'book:Arabic-English', 'tone-r'), array('PDF – தமிழ்', 'https://kadavulmattum.org/wp-content/uploads/2020/06/Tamil-Quran-Iruthi-vetham.pdf', 'book:Tamil', 'tone-r'), array('குர்ஆன் ஆடியோ', '/audios/', 'img:https://godalone.in/wp-content/uploads/card-icons/icon-quran-audio.png', 'tone-p'), array('குர்ஆன் வாங்க', 'https://www.amazon.in/l/27943762031?ie=UTF8&marketplaceID=A21TJRUUN4KGV&product=B09DDBLYF3&me=AX4GIDLDYNYHG', 'img:https://godalone.in/wp-content/uploads/card-icons/icon-purchase-quran.png', 'tone-o'), array('குர்ஆன் கேள்வி பதில்', '/quran-qa/', 'img:https://godalone.in/wp-content/uploads/card-icons/icon-quran-qa.png', 'tone-g'), array('குர்ஆன் படச் செய்திகள்', '/picture-messages/', '🖼️', 'tone-p'))), array('கணித அற்புதம்', array(array('எளிய உண்மைகள்', '/mathematical-miracle/#mm2', '🔢', 'tone-g'), array('கணிதரீதியிலான இலக்கியத் தொகுப்பு', '/mathematical-miracle/#mm10', '📜', 'tone-b'), array('வரலாற்றுப் பின்னணி', '/mathematical-miracle/#mm11', '🏺', 'tone-t'), array('வரலாற்றுக் குறிப்பு', '/mathematical-miracle/#mm21', '📝', 'tone-p'), array('"எழுத்தெண் மதிப்பு" என்பதென்ன?', '/mathematical-miracle/#mm31', '🔤', 'tone-r'), array('சூராக்கள் மற்றும் வசனங்களின் எண்களுடைய கூட்டுத்தொகை', '/mathematical-miracle/#mm34', '➕', 'tone-o'), array('ஏன்19!', '/mathematical-miracle/#mm35', '❓', 'tone-g'), array('"குர்ஆன்" எனும் வார்த்தை', '/mathematical-miracle/#mm39', '📖', 'tone-b'), array('பலமானதோர் அஸ்திவாரம்', '/mathematical-miracle/#mm40', '🏛️', 'tone-t'), array('குர்ஆனின் முக்கியக் கட்டளைகள்', '/mathematical-miracle/#mm41', '🕌', 'tone-p'), array('இந்தக் குர்ஆனுடைய கணிதக் கட்டமைப்பு', '/mathematical-miracle/#mm50', '🧮', 'tone-r'), array('சூராக்கள் மற்றும் வசனங்களின் எண்கள்', '/mathematical-miracle/#mm51', '📊', 'tone-o'), array('மானிட சக்திக்கப்பாற்பட்ட எண்களின் கோவைகள்', '/mathematical-miracle/#mm54', '✨', 'tone-g'))), array('__books__', array()), array('ஊடகம்', array(array('குர்ஆன் ஆடியோ', '/audios/', 'img:https://godalone.in/wp-content/uploads/card-icons/icon-quran-audio.png', 'tone-p'), array('Dr. Rashad Khalifa — Speeches', 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7lqdebZHRvd6Fzja7Mvqzgj', 'yt:https://www.youtube.com/playlist?list=PL5aSCB9_3K7lqdebZHRvd6Fzja7Mvqzgj', 'tone-g'), array('English Quran Audio', 'https://www.youtube.com/playlist?list=PL1ZWur9ydxbTFg--5zWUILdBvc_UiLEN2', 'yt:https://www.youtube.com/playlist?list=PL1ZWur9ydxbTFg--5zWUILdBvc_UiLEN2', 'tone-g'), array('HiddenSecret.org Videos', 'https://www.youtube.com/@HiddenSecret741/playlists', 'cov:https://godalone.in/wp-content/uploads/xp-icons/hiddensecret.png', 'tone-g'), array('Dikr Meditation', 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7lEOC9JOUUjywIeFANWHdfY', 'yt:https://www.youtube.com/playlist?list=PL5aSCB9_3K7lEOC9JOUUjywIeFANWHdfY', 'tone-g'), array('Submission Shorts', 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7m2fgsXr-mSzvfei1Kom6-d', 'yt:https://www.youtube.com/playlist?list=PL5aSCB9_3K7m2fgsXr-mSzvfei1Kom6-d', 'tone-g'), array('Tamil Quran Audio', 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7n2A0q5CqE1m6kavQuthQHV', 'yt:https://www.youtube.com/playlist?list=PL5aSCB9_3K7n2A0q5CqE1m6kavQuthQHV', 'tone-g'), array('Dr. Rashad Khalifa Speech (Tamil)', 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7m5XjjdP8KwZgHliPMDtIj2', 'yt:https://www.youtube.com/playlist?list=PL5aSCB9_3K7m5XjjdP8KwZgHliPMDtIj2', 'tone-g'), array('Tamil Jummah Bayan', 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7lME7RdoIgVTZA64KHZHs9B', 'yt:https://www.youtube.com/playlist?list=PL5aSCB9_3K7lME7RdoIgVTZA64KHZHs9B', 'tone-g'), array('Tamil Quran Study', 'https://www.youtube.com/playlist?list=PL5aSCB9_3K7kaca87xieCFDTMfieHQGRC', 'yt:https://www.youtube.com/playlist?list=PL5aSCB9_3K7kaca87xieCFDTMfieHQGRC', 'tone-g'), array('Hindi Jummah', 'https://www.youtube.com/playlist?list=PLBnAo-0FxRAB9pIwHWZWtE45DMBF0VvMc', 'yt:https://www.youtube.com/playlist?list=PLBnAo-0FxRAB9pIwHWZWtE45DMBF0VvMc', 'tone-g'), array('வீடியோக்கள்', '/videos/', '🎥', 'tone-g'))), array('கல்வி', array(array('குர்ஆன் கேள்வி பதில்', '/quran-qa/', 'img:https://godalone.in/wp-content/uploads/card-icons/icon-quran-qa.png', 'tone-g'), array('குர்ஆன் கலரிங் புத்தகம்', '/coloring-book/', 'img:https://godalone.in/wp-content/uploads/card-icons/icon-coloring-book.png', 'tone-o'), array('அறிமுகம்', '/introduction/', '📖', 'tone-t'), array('இது எனக்கானதா?', '/is-this-for-me/', '🤔', 'tone-b'), array('குர்ஆன் போதுமானதா?', '/is-the-quran-enough/', '🕋', 'tone-p'), array('சான்றை நீங்களே சோதியுங்கள்', '/check-it-yourself/', '🧮', 'tone-r'), array('அடிக்கடி கேட்கப்படும் கேள்விகள்', '/faq/', '💬', 'tone-t'))), array('பயன்பாடுகள்', array(array('தொழுகை மற்றும் ரமலான் நேரம்', '/salat-timing/', 'img:https://godalone.in/wp-content/uploads/card-icons/icon-salat-ramadan.png', 'tone-t'), array('ரமலான் கால்குலேட்டர்', '/ramadan-calculator/', 'img:https://godalone.in/wp-content/uploads/card-icons/icon-salat-ramadan.png', 'tone-p'), array('கடமையான தர்மம் (ஜகாத்)', '/zakat-calculator/', 'img:https://godalone.in/wp-content/uploads/card-icons/icon-zakat-calculator.png', 'tone-g'), array('19 கால்குலேட்டர்', '/calculator-19/', 'img:https://godalone.in/wp-content/uploads/card-icons/icon-calculator-19.png', 'tone-b'), array('பயன்பாடுகள்', '/utilities/', 'img:https://godalone.in/wp-content/uploads/card-icons/icon-utility.png', 'tone-o'))), array('குழு', array(array('சரணடைந்தவர்கள் தர்ம ஸ்தாபனம்', '/charity/', 'cov:https://godalone.in/wp-content/uploads/xp-icons/charity.png', 'tone-r'), array('மஸ்ஜித் இந்தியா IT பிரிவு', '/it-wing/', '💻', 'tone-b'), array('தொடர்பு கொள்ள', '/contact/', '📞', 'tone-t'), array('எங்களைப் பற்றி', '/about/', 'ℹ️', 'tone-g'))), array('குர்ஆன் நினைவூட்டல்', array(array('WhatsApp', 'https://whatsapp.com/channel/0029VaFhw4kK0IBpt9DOFC3G', 'cov:https://godalone.in/wp-content/uploads/xp-icons/whatsapp.png', 'tone-g'), array('Telegram', 'https://t.me/kadavulmattum_org', 'cov:https://godalone.in/wp-content/uploads/xp-icons/telegram.png', 'tone-g'), array('YouTube', 'https://www.youtube.com/kadavulmattum', 'soc:yt', 'tone-g'), array('Facebook', 'https://www.facebook.com/thameemnf', 'cov:https://godalone.in/wp-content/uploads/xp-icons/facebook.png', 'tone-g'), array('Instagram', 'https://instagram.com/kadavulmattum', 'cov:https://godalone.in/wp-content/uploads/xp-icons/instagram.png', 'tone-g'), array('X', 'https://x.com/thameemnf', 'soc:x', 'tone-g'), array('Pinterest', 'https://www.pinterest.com/kadavulmattum', 'cov:https://godalone.in/wp-content/uploads/xp-icons/pinterest.png', 'tone-g'))));

/* browser title + description (this route is treated like the home page by the SEO plugin) */
ob_start(function ($html) use ($xp_title, $xp_desc) {
  $t = esc_html($xp_title);
  $d = esc_attr($xp_desc);
  $html = preg_replace('#<title>.*?</title>#is', '<title>' . $t . '</title>', $html, 1);
  if (preg_match('#<meta\s+name=["\']description["\']#i', $html)) {
    $html = preg_replace('#(<meta\s+name=["\']description["\']\s+content=)(["\']).*?\2#is', '$1"' . $d . '"', $html, 1);
  } else {
    $html = preg_replace('#</head>#i', '<meta name="description" content="' . $d . '">' . "\n</head>", $html, 1);
  }
  $html = preg_replace('#(<meta\s+property=["\']og:title["\']\s+content=)(["\']).*?\2#is', '$1"' . $t . '"', $html, 1);
  $html = preg_replace('#(<meta\s+property=["\']og:description["\']\s+content=)(["\']).*?\2#is', '$1"' . $d . '"', $html, 1);
  return $html;
});

/* Library row: shared books feed (same list as the Library page) */
$xp_books = get_transient('xp_books_v2');
if (false === $xp_books) {
  $xp_books = array();
  $res = wp_remote_get('https://godalone.in/wp-content/uploads/data/books.json', array('timeout' => 8));
  if (!is_wp_error($res) && wp_remote_retrieve_response_code($res) === 200) {
    $j = json_decode(wp_remote_retrieve_body($res), true);
    if (is_array($j) && isset($j['books']) && is_array($j['books'])) { $j = $j['books']; }
    if (is_array($j)) {
      foreach ($j as $b) {
        if (!is_array($b)) continue;
        $en = isset($b['title']) && is_array($b['title']) && isset($b['title']['en']) ? $b['title']['en'] : '';
        $tt = '';
        if (isset($b['title']) && is_array($b['title'])) {
          $tt = isset($b['title'][$xp_lang]) && $b['title'][$xp_lang] !== '' ? $b['title'][$xp_lang] : $en;
        }
        $lk = !empty($b['page']) ? $b['page'] : (!empty($b['download']) ? $b['download'] : '');
        if ($tt === '' || $lk === '') continue;
        $xp_books[] = array('t' => $tt, 'e' => $en, 'u' => $lk, 'c' => isset($b['cover']) && is_string($b['cover']) ? $b['cover'] : '');
      }
    }
  }
  set_transient('xp_books_v2', $xp_books, $xp_books ? 6 * HOUR_IN_SECONDS : 10 * MINUTE_IN_SECONDS);
}

/* picture from the page of an app (Google Play etc.), kept for 3 days */
$xp_og = function ($url) {
  $k = 'xp_og_' . md5($url);
  $v = get_transient($k);
  if (false !== $v) return $v;
  $img = '';
  $r = wp_remote_get($url, array('timeout' => 4, 'user-agent' => 'Mozilla/5.0 (compatible; Explore/1.0)'));
  if (!is_wp_error($r) && wp_remote_retrieve_response_code($r) === 200) {
    $b = wp_remote_retrieve_body($r);
    if (preg_match('#<meta[^>]+property=["\']og:image["\'][^>]+content=["\']([^"\']+)#i', $b, $m) || preg_match('#<meta[^>]+content=["\']([^"\']+)["\'][^>]+property=["\']og:image#i', $b, $m)) {
      $img = html_entity_decode($m[1]);
    }
  }
  set_transient($k, $img, $img ? 3 * DAY_IN_SECONDS : 30 * MINUTE_IN_SECONDS);
  return $img;
};

foreach ($xp_rows as $ri => $row) {
  if ($row[0] === '__books__') {
    $items = array();
    foreach ($xp_books as $b) { $items[] = array($b['t'], $b['u'], $b['c'] ? 'cov:' . $b['c'] : '📘', 'tone-b'); }
    $items[] = array($xp_ui['allbooks'], '/library/', $xp_ui['allbooks_icon'], 'tone-g');
    $xp_rows[$ri] = array($xp_ui['library'], $items);
  }
}

$xp_url = function ($u) { return (strpos($u, 'http') === 0 || $u[0] === '#') ? $u : home_url($u); };
$xp_home = untrailingslashit(home_url());
$xp_tones = array('tone-g', 'tone-b', 'tone-t', 'tone-p', 'tone-r', 'tone-o');
$xp_soc = array(
  'fb' => array('f', '#1877F2'), 'yt' => array('▶', '#FF0000'), 'tg' => array("✈\xEF\xB8\x8E", '#229ED9'),
  'ig' => array('IG', 'linear-gradient(45deg,#F9A03F,#E1306C,#833AB4)'), 'wa' => array("✆", '#25D366'), 'x' => array('X', '#111111'), 'pin' => array('P', '#E60023')
);
get_header();
?>
<style>
.gadv{display:none!important}
.xp{position:relative;padding:34px 0 80px;overflow:hidden}
.xp::before{content:"";position:absolute;left:50%;top:-120px;width:900px;height:500px;transform:translateX(-50%);background:radial-gradient(closest-side,rgba(229,185,78,.16),transparent);pointer-events:none}
.xp .xp-wrap{position:relative;max-width:1140px;margin:0 auto;padding:0 18px}
.xp-h{text-align:center;margin:0 0 22px}
.xp-h h1{margin:0 0 8px;font-size:clamp(1.8rem,4.4vw,2.6rem);line-height:1.2;color:#F3D98E}
.xp-h p{margin:0 auto 20px;max-width:640px;font-size:1rem;line-height:1.6;color:#C9D1EC}
.xp-s{position:relative;max-width:580px;margin:0 auto}
.xp-s svg{position:absolute;left:18px;top:50%;transform:translateY(-50%);width:20px;height:20px;color:#E5B94E;pointer-events:none}
.xp-s input{box-sizing:border-box;width:100%;height:54px;padding:0 48px 0 50px;border-radius:999px;border:1.5px solid rgba(229,185,78,.45);background:rgba(255,255,255,.07);color:#fff;font:inherit;font-size:1rem;outline:none;transition:border-color .15s,box-shadow .15s,background .15s}
.xp-s input::placeholder{color:#AEB8DA}
.xp-s input:focus{border-color:#E5B94E;box-shadow:0 0 0 4px rgba(229,185,78,.2);background:rgba(255,255,255,.1)}
.xp-s button{position:absolute;right:10px;top:50%;transform:translateY(-50%);width:34px;height:34px;border:0;border-radius:50%;background:rgba(229,185,78,.2);color:#F3D98E;font-size:16px;line-height:1;cursor:pointer}
.xp-s button[hidden]{display:none}
.xp-card{background:#141A33;border:1px solid rgba(229,185,78,.28);border-radius:28px;box-shadow:0 18px 50px rgba(0,0,0,.4);padding:4px 28px}
.xp-row{display:grid;grid-template-columns:190px minmax(0,1fr);gap:18px;align-items:center;padding:22px 0;border-top:1px solid rgba(229,185,78,.18)}
.xp-row:first-of-type{border-top:0}
.xp-t{margin:0;font-size:1.1rem;font-weight:800;line-height:1.3;color:#F3D98E;padding-left:14px;border-left:4px solid #E5B94E;border-radius:2px}
.xp-g{display:grid;grid-template-columns:repeat(auto-fill,minmax(100px,1fr));gap:20px 10px}
.xp-i{box-sizing:border-box;min-width:0;display:flex;flex-direction:column;align-items:center;gap:9px;text-align:center;text-decoration:none;color:#F3E7C2;font-size:.78rem;line-height:1.3;font-weight:600}
.xp-i em{font-style:normal;overflow-wrap:anywhere;display:-webkit-box;-webkit-line-clamp:3;-webkit-box-orient:vertical;overflow:hidden}
.xp-c{position:relative;display:flex;align-items:center;justify-content:center;width:88px;height:88px;border-radius:22px;font-size:2.3rem;line-height:1;color:#fff;box-shadow:0 8px 18px rgba(0,0,0,.35),inset 0 0 0 1px rgba(255,255,255,.12);transition:transform .18s ease,box-shadow .18s ease;overflow:hidden;font-weight:800}
.xp-c img{width:100%;height:100%;display:block;object-fit:cover;object-position:top center}
.xp-c.im{background:linear-gradient(145deg,rgba(255,255,255,.14),rgba(255,255,255,.05))}
.xp-c.im img{object-fit:contain;padding:11px;box-sizing:border-box}
.xp-i:hover .xp-c,.xp-i:focus-visible .xp-c{transform:translateY(-4px) scale(1.05);box-shadow:0 0 0 3px rgba(229,185,78,.75),0 14px 26px rgba(0,0,0,.42)}
.xp-i:focus-visible{outline:none}
.xp-i:hover{color:#fff}
.xp-c.th::after{content:"▶";position:absolute;right:6px;bottom:6px;width:24px;height:24px;border-radius:50%;background:#F00;color:#fff;font-size:10px;line-height:24px;text-align:center;box-shadow:0 2px 6px rgba(0,0,0,.4)}
.tone-g{background:linear-gradient(135deg,#C79A2B,#F3D98E);color:#2A1D00}
.tone-b{background:linear-gradient(135deg,#2B4DB3,#6C8CFF)}
.tone-t{background:linear-gradient(135deg,#0F8B8D,#4FD1C5)}
.tone-p{background:linear-gradient(135deg,#7B3FC4,#B58CF5)}
.tone-r{background:linear-gradient(135deg,#C0392B,#F2766B)}
.tone-o{background:linear-gradient(135deg,#D9660B,#FFB067)}
.xp-none{margin:34px 0;text-align:center;font-size:1.05rem;color:#C9D1EC}
.xp-none[hidden]{display:none}
@media(max-width:720px){
.xp{padding:22px 0 100px}
.xp-card{padding:2px 14px;border-radius:22px}
.xp-row{grid-template-columns:1fr;gap:14px;padding:18px 0}
.xp-g{grid-template-columns:repeat(auto-fill,minmax(76px,1fr));gap:16px 6px}
.xp-c{width:70px;height:70px;border-radius:18px;font-size:1.9rem}
.xp-i{font-size:.72rem}
.xp-s input{height:50px}
}
html.theme-day .xp::before{background:radial-gradient(closest-side,rgba(229,185,78,.22),transparent)}
html.theme-day .xp-h h1{color:#1B2547}
html.theme-day .xp-h p{color:#3A4466}
html.theme-day .xp-s input{background:#fff;color:#1B2547;border-color:rgba(27,37,71,.25);box-shadow:0 6px 18px rgba(27,37,71,.1)}
html.theme-day .xp-s input::placeholder{color:#6B7595}
html.theme-day .xp-s svg{color:#8A6508}
html.theme-day .xp-s button{background:rgba(27,37,71,.1);color:#1B2547}
html.theme-day .xp-card{background:#fff;border-color:rgba(27,37,71,.14);box-shadow:0 14px 40px rgba(27,37,71,.14)}
html.theme-day .xp-row{border-top-color:rgba(27,37,71,.12)}
html.theme-day .xp-t{color:#1B2547;border-left-color:#C79A2B}
html.theme-day .xp-i{color:#1B2547}
html.theme-day .xp-i:hover{color:#000}
html.theme-day .xp-c{box-shadow:0 6px 16px rgba(27,37,71,.22),inset 0 0 0 1px rgba(27,37,71,.08)}
html.theme-day .xp-c.im{background:linear-gradient(145deg,#FBF4E2,#F1E6C8)}
html.theme-day .xp-i:hover .xp-c,html.theme-day .xp-i:focus-visible .xp-c{box-shadow:0 0 0 3px rgba(27,37,71,.45),0 12px 24px rgba(27,37,71,.25)}
html.theme-day .xp-none{color:#3A4466}
</style>
<main class="xp" id="ga-main">
<div class="xp-wrap">
<div class="xp-h"><h1><?php echo esc_html($xp_h1); ?></h1><p><?php echo esc_html($xp_sub); ?></p>
<div class="xp-s"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="11" cy="11" r="7"/><path d="M20 20l-3.5-3.5"/></svg><input type="search" id="xpQ" placeholder="<?php echo esc_attr($xp_ui['ph']); ?>" aria-label="<?php echo esc_attr($xp_ui['ph']); ?>" autocomplete="off"><button type="button" id="xpClr" hidden aria-label="Clear">✕</button></div></div>
<div class="xp-card">
<?php
foreach ($xp_rows as $row) {
  echo '<section class="xp-row"><h2 class="xp-t">' . esc_html($row[0]) . '</h2><div class="xp-g">';
  foreach ($row[1] as $k => $it) {
    $label = $it[0]; $url = $it[1]; $ic = $it[2]; $tone = isset($it[3]) ? $it[3] : $xp_tones[$k % count($xp_tones)];
    $h = $xp_url($url);
    $ext = (strpos($h, 'http') === 0 && strpos($h, $xp_home) !== 0);
    $style = ''; $cls = ''; $data = '';
    $fb = isset($it[4]) ? $it[4] : '';
    /* resolve special icon kinds */
    if (strpos($ic, 'book:') === 0) {
      $needles = explode('&', substr($ic, 5)); $found = '';
      foreach ($xp_books as $b) {
        $ok = true; foreach ($needles as $n) { if (stripos($b['e'], $n) === false) { $ok = false; } }
        if ($ok && $b['c']) { $found = $b['c']; break; }
      }
      $ic = $found ? 'cov:' . $found : ($fb ? $fb : '📄');
    } elseif (strpos($ic, 'play:') === 0) {
      $g = $xp_og($url);
      $ic = $g ? 'cov:' . $g : ($fb ? $fb : '🤖');
    }
    if (strpos($ic, 'img:') === 0) {
      $cls = ' im'; $tone = '';
      $inner = '<img src="' . esc_url(substr($ic, 4)) . '" alt="" loading="lazy">';
    } elseif (strpos($ic, 'cov:') === 0) {
      $tone = '';
      $inner = '<img src="' . esc_url(substr($ic, 4)) . '" alt="" loading="lazy">';
    } elseif (strpos($ic, 'yt:') === 0) {
      $data = ' data-yt="' . esc_url(substr($ic, 3)) . '"'; $tone = 'tone-r'; $inner = '▶';
    } elseif (strpos($ic, 'itunes:') === 0) {
      $data = ' data-itunes="' . esc_attr(substr($ic, 7)) . '"'; $tone = 'tone-b'; $inner = $fb ? $fb : '🍎';
    } elseif (strpos($ic, 'soc:') === 0) {
      $s = $xp_soc[substr($ic, 4)];
      $inner = esc_html($s[0]); $style = ' style="background:' . esc_attr($s[1]) . ';color:#fff"'; $tone = '';
    } else {
      $inner = $ic;
    }
    echo '<a class="xp-i" href="' . esc_url($h) . '"' . ($ext ? ' target="_blank" rel="noopener"' : '') . '><span class="xp-c' . $cls . ' ' . esc_attr($tone) . '"' . $style . $data . '>' . $inner . '</span><em>' . esc_html($label) . '</em></a>';
  }
  echo '</div></section>';
}
?>
<p class="xp-none" id="xpNone" hidden><?php echo esc_html($xp_ui['none']); ?></p>
</div>
</div>
</main>
<script>
(function(){
var q=document.getElementById('xpQ'),clr=document.getElementById('xpClr'),none=document.getElementById('xpNone'),rows=[].slice.call(document.querySelectorAll('.xp-row'));
function norm(s){return (s||'').toLowerCase()}
function run(){var v=norm(q.value.trim()),any=false;
rows.forEach(function(r){var t=norm(r.querySelector('.xp-t').textContent),vis=0;
[].forEach.call(r.querySelectorAll('.xp-i'),function(a){var m=!v||t.indexOf(v)>-1||norm(a.textContent).indexOf(v)>-1;a.style.display=m?'':'none';if(m)vis++});
r.style.display=vis?'':'none';if(vis)any=true});
none.hidden=any;clr.hidden=!v}
q.addEventListener('input',run);
clr.addEventListener('click',function(){q.value='';run();q.focus()});
/* pictures for YouTube playlists and iOS apps (kept in this browser for 7 days) */
function cached(key,load,done){try{var c=JSON.parse(localStorage.getItem(key)||'null');if(c&&Date.now()-c.t<6048e5){done(c.v);return}}catch(e){}
load(function(v){if(!v)return;try{localStorage.setItem(key,JSON.stringify({t:Date.now(),v:v}))}catch(e){}done(v)})}
function put(el,src,th){var i=new Image();i.onload=function(){el.innerHTML='';el.appendChild(i);el.classList.remove('tone-r','tone-b');if(th)el.classList.add('th')};i.alt='';i.src=src}
[].forEach.call(document.querySelectorAll('[data-yt]'),function(el){var u=el.getAttribute('data-yt');
cached('xpyt:'+u,function(cb){fetch('https://www.youtube.com/oembed?format=json&url='+encodeURIComponent(u)).then(function(r){return r.json()}).then(function(j){cb(j&&j.thumbnail_url)}).catch(function(){})},function(v){put(el,v,true)})});
[].forEach.call(document.querySelectorAll('[data-itunes]'),function(el){var id=el.getAttribute('data-itunes');
cached('xpit:'+id,function(cb){fetch('https://itunes.apple.com/lookup?id='+id).then(function(r){return r.json()}).then(function(j){cb(j&&j.results&&j.results[0]&&j.results[0].artworkUrl512)}).catch(function(){})},function(v){put(el,v,false)})});
})();
</script>
<?php get_footer(); ?>
