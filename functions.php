<?php

add_action('wp_footer', function () {
    if (!is_front_page()) { return; }
    echo <<<'JS'
<script>(function(){var h=document.querySelector('.hero');if(!h||!('IntersectionObserver' in window))return;new IntersectionObserver(function(e){document.body.classList.toggle('hero-in',e[0].isIntersecting);}).observe(h);})();</script>
JS;
}, 99);

/**
 * Kadavulmattum Premium -- theme functions
 *
 * New theme for kadavulmattum.org, matching the GodAlone Premium design
 * system used on godalone.in. Built incrementally: the homepage
 * (front-page.php) is fully custom; other pages fall back to page.php /
 * single.php / index.php, which render the existing post content
 * (including Fusion Builder shortcodes -- the Fusion Builder / Fusion
 * Core plugins are separate from the Avada theme, so shortcodes keep
 * working after the theme switch) inside the new design's article layout.
 */

if (!defined('ABSPATH')) exit;

/**
 * Theme asset version = newest modification time of the theme's own files.
 * Editing style.css / header.php / footer.php / functions.php changes this
 * automatically, so browsers fetch the new file with no manual version bump.
 * Falls back to the fixed string below if the files cannot be read.
 */
if (!function_exists('km_auto_ver')) {
	function km_auto_ver() {
		static $v = null;
		if ($v !== null) { return $v; }
		$dir   = get_stylesheet_directory();
		$stamp = 0;
		foreach (array('style.css', 'header.php', 'footer.php', 'functions.php') as $f) {
			$p = $dir . '/' . $f;
			if (file_exists($p)) {
				$t = @filemtime($p);
				if ($t && $t > $stamp) { $stamp = $t; }
			}
		}
		$v = $stamp ? ('1.3.4.' . $stamp) : '1.3.4';
		return $v;
	}
}
if (!defined('KM_VER')) define('KM_VER', km_auto_ver());

/**
 * Auto-purge the LiteSpeed page cache when any theme file changes, so edits
 * show up without clearing the cache by hand. Runs at most once per change.
 */
add_action('init', function () {
	if (!function_exists('get_option')) { return; }
	$sig = km_auto_ver();
	if (get_option('km_theme_sig') !== $sig) {
		update_option('km_theme_sig', $sig, false);
		do_action('litespeed_purge_all');
	}
}, 99);
if (!defined('KM_LOGO_DARK_DATAURI'))  define('KM_LOGO_DARK_DATAURI', get_template_directory_uri() . '/images/newlogo-gold.png?v=nl3');
if (!defined('KM_LOGO_LIGHT_DATAURI')) define('KM_LOGO_LIGHT_DATAURI', get_template_directory_uri() . '/images/newlogo-black.png?v=nl3');

/* ---- Theme supports ---- */
add_action('after_setup_theme', function () {
	add_theme_support('title-tag');
	add_theme_support('post-thumbnails');
	add_theme_support('automatic-feed-links');
	add_theme_support('html5', array('search-form','gallery','caption','style','script'));
	add_theme_support('responsive-embeds');
	add_theme_support('custom-logo', array('height'=>80,'width'=>80,'flex-height'=>true,'flex-width'=>true));
	register_nav_menus(array(
		'primary' => __('Primary Menu', 'kadavulmattum'),
	));
});

/* ---- Firebase config (Google sign-in) ----
 * Shared Firebase project used across the GodAlone family of sites. If
 * Google sign-in ever errors with "auth/unauthorized-domain", add
 * kadavulmattum.org to Authentication -> Settings -> Authorized domains
 * in the Firebase console for this project. ---- */
function km_firebase_config() {
	return array(
		'apiKey'            => 'AIzaSyAIvmDEiHvbxsyqIqvPnGg08aik1ra4yIw',
		'authDomain'        => 'bayyinah-c110a.firebaseapp.com',
		'projectId'         => 'bayyinah-c110a',
		'storageBucket'     => 'bayyinah-c110a.firebasestorage.app',
		'messagingSenderId' => '831184810834',
		'appId'             => '1:831184810834:web:b134bfb3ef6014e9ebc08b',
	);
}

/* ---- Assets ---- */
add_action('wp_enqueue_scripts', function () {
	wp_enqueue_style(
		'km-fonts',
		'https://fonts.googleapis.com/css2?family=Marcellus&family=Inter:wght@400;500;600;700;800&family=Amiri:wght@400;700&family=Scheherazade+New:wght@400;700&family=Noto+Sans+Tamil:wght@400;500;600;700&display=swap',
		array(), null
	);
	wp_enqueue_style('km-style', get_stylesheet_uri(), array('km-fonts'), KM_VER);

	wp_enqueue_script('km-firebase-app', 'https://www.gstatic.com/firebasejs/10.14.1/firebase-app-compat.js', array(), null, true);
	wp_enqueue_script('km-firebase-auth', 'https://www.gstatic.com/firebasejs/10.14.1/firebase-auth-compat.js', array('km-firebase-app'), null, true);

	wp_enqueue_script('km-main', get_stylesheet_directory_uri() . '/assets/js/main.js', array('km-firebase-auth'), KM_VER, true);
	wp_localize_script('km-main', 'KM', array(
		'ajax'         => admin_url('admin-ajax.php'),
		'nonce'        => wp_create_nonce('km_news'),
		'nonceContact' => wp_create_nonce('km_contact'),
		'firebase'     => km_firebase_config(),
		'quran'        => 'https://godalone.in/quran/',
	));
});

/* ---- Helper: render the primary nav.
 * Deliberately NOT using wp_nav_menu()/has_nav_menu() here: the site
 * already has a large Fusion mega-menu assigned to the "primary" menu
 * location from the old Avada setup, and WordPress carries that
 * location assignment across the theme switch. Always rendering the
 * curated km_default_menu() keeps the new header's simple 9-item nav
 * intact regardless of what's assigned to "primary" elsewhere. ---- */
function km_primary_menu() {
	km_default_menu();
}
function km_default_menu() {
	$items = array(
		array('📖', 'குர்ஆன்', home_url('/quran/')),
		array('📖', 'அறிமுகம்', home_url('/introduction/')),
        array('🤔', 'இது எனக்கானதா?', home_url('/is-this-for-me/')),
        array('📖', 'குர்ஆன் போதுமானதா?', home_url('/is-the-quran-enough/')),
        array('🧮', 'நீங்களே சரிபாருங்கள்', home_url('/check-it-yourself/')),
        array('🔢', 'கணித அற்புதம்', home_url('/mathematical-miracle/')),
		array('🎥', 'வீடியோக்கள்', home_url('/videos/')),
		array('🎧', 'ஆடியோ', home_url('/audios/')),
		array('🖼️', 'படச் செய்திகள்', home_url('/picture-messages/')),
		array('🎨', 'குர்ஆன் கலரிங் புத்தகம்', home_url('/coloring-book/')),
		array('📚', 'புத்தகங்கள்', home_url('/library/')),
		array('📰', 'கட்டுரை', home_url('/article/')),
		array('🔗', 'பயனுள்ள இணைப்புகள்', home_url('/links/')),
		array('🛠️', 'பயன்பாடுகள்', home_url('/utilities/')),
		array('🌙', 'ரமலான் கால்குலேட்டர்', home_url('/ramadan-calculator/')),
		array('🕌', 'தொழுகை மற்றும் ரமலான் நேரம்', home_url('/salat-timing/')),
		array('💰', 'கடமையான தர்மம் (ஜகாத்)', home_url('/zakat-calculator/')),
		array('❓', 'குர்ஆன் கேள்வி பதில்', home_url('/quran-qa/')),
		array('💬', 'அடிக்கடி கேட்கப்படும் கேள்விகள்', home_url('/faq/')),
		array('❤️', 'சரணடைந்தவர்கள் தர்ம ஸ்தாபனம்', home_url('/charity/')),
		array('❓', 'குர்ஆன் கேள்வி பதில்', 'https://kadavulmattum.org/quran-qa/'),
	);
	foreach ($items as $it) {
		list($emoji, $label, $url) = $it;
		echo '<a href="' . esc_url($url) . '">' . $emoji . ' ' . esc_html($label) . '</a>';
	}
}

/* ---- Body class helper ---- */
add_filter('body_class', function ($c) { $c[] = 'km'; return $c; });

/* ---- Contact page routing (no wp-admin page created this session) ---- */
add_action('init', function () {
	add_rewrite_rule('^contact/?$', 'index.php?km_contact_page=1', 'top');
	add_rewrite_rule('^calculator-19/?$', 'index.php?km_calc19_page=1', 'top');
	if (get_option('km_contact_rewrite_flushed') !== KM_VER) {
		flush_rewrite_rules(false);
		update_option('km_contact_rewrite_flushed', KM_VER);
	}
}, 20);
add_filter('query_vars', function ($vars) { $vars[] = 'km_contact_page'; $vars[] = 'km_calc19_page'; return $vars; });
add_filter('template_include', function ($template) {
	if (get_query_var('km_contact_page')) {
		$t = get_stylesheet_directory() . '/page-contact.php';
		if (file_exists($t)) return $t;
	}
	if (get_query_var('km_calc19_page')) {
		$t = get_stylesheet_directory() . '/page-calculator-19.php';
		if (file_exists($t)) return $t;
	}
	return $template;
});

/* ---- Zakat Calculator page routing (no wp-admin page exists for this slug) ---- */
add_action('init', function () {
	add_rewrite_rule('^zakat-calculator/?$', 'index.php?km_zakat_page=1', 'top');
	if (get_option('km_zakat_rewrite_flushed') !== KM_VER) {
		flush_rewrite_rules(false);
		update_option('km_zakat_rewrite_flushed', KM_VER);
	}
}, 20);
add_filter('query_vars', function ($vars) { $vars[] = 'km_zakat_page'; return $vars; });
add_filter('template_include', function ($template) {
	if (get_query_var('km_zakat_page')) {
		$t = get_stylesheet_directory() . '/page-zakat-calculator.php';
		if (file_exists($t)) return $t;
	}
	return $template;
});

/* ---- Salat & Ramadan Timing + Ramadan Calculator page routing (no wp-admin pages exist for these slugs) ---- */
add_action('init', function () {
	add_rewrite_rule('^salat-timing/?$', 'index.php?km_salat_page=1', 'top');
	add_rewrite_rule('^ramadan-calculator/?$', 'index.php?km_ramadan_page=1', 'top');
	if (get_option('km_salat_rewrite_flushed') !== KM_VER) {
		flush_rewrite_rules(false);
		update_option('km_salat_rewrite_flushed', KM_VER);
	}
}, 20);
add_filter('query_vars', function ($vars) { $vars[] = 'km_salat_page'; $vars[] = 'km_ramadan_page'; return $vars; });
add_filter('template_include', function ($template) {
	if (get_query_var('km_salat_page')) {
		$t = get_stylesheet_directory() . '/page-salat-timing.php';
		if (file_exists($t)) return $t;
	}
	if (get_query_var('km_ramadan_page')) {
		$t = get_stylesheet_directory() . '/page-ramadan-calculator.php';
		if (file_exists($t)) return $t;
	}
	return $template;
});

/* ---- Downloads page routing (no wp-admin page exists for this slug) ---- */
add_action('init', function () {
	add_rewrite_rule('^downloads/?$', 'index.php?km_downloads_page=1', 'top');
	if (get_option('km_downloads_rewrite_flushed') !== KM_VER) {
		flush_rewrite_rules(false);
		update_option('km_downloads_rewrite_flushed', KM_VER);
	}
}, 20);
add_filter('query_vars', function ($vars) { $vars[] = 'km_downloads_page'; return $vars; });
add_filter('template_include', function ($template) {
	if (get_query_var('km_downloads_page')) {
		$t = get_stylesheet_directory() . '/page-downloads.php';
		if (file_exists($t)) return $t;
	}
	return $template;
});

/* ---- About / Privacy / Copyright routing (no wp-admin page) ---- */
add_action('init', function () {
    add_rewrite_rule('^(about|privacy-policy|copyright)/?$', 'index.php?km_legal=$matches[1]', 'top');
    if (get_option('km_legal_rewrite_flushed') !== KM_VER) {
        flush_rewrite_rules(false);
        update_option('km_legal_rewrite_flushed', KM_VER);
    }
}, 20);
add_filter('query_vars', function ($vars) { $vars[] = 'km_legal'; return $vars; });
add_filter('template_include', function ($template) {
    if (get_query_var('km_legal')) {
        $t = get_stylesheet_directory() . '/page-legal.php';
        if (file_exists($t)) return $t;
    }
    return $template;
});

/* ---- Picture Messages (/picture-messages) ---- */
if (file_exists(get_stylesheet_directory() . '/inc-picture-messages.php')) { try { require_once get_stylesheet_directory() . '/inc-picture-messages.php'; } catch (\Throwable $e) { } }

/* ---- New-here pages routing (/is-this-for-me, /is-the-quran-enough, /check-it-yourself, /mathematical-miracle; no wp-admin pages) ---- */
add_action('init', function () {
    add_rewrite_rule('^is-this-for-me/?$', 'index.php?km_forme_page=1', 'top');
    add_rewrite_rule('^is-the-quran-enough/?$', 'index.php?km_qenough_page=1', 'top');
    add_rewrite_rule('^check-it-yourself/?$', 'index.php?km_check_page=1', 'top');
    add_rewrite_rule('^mathematical-miracle/?$', 'index.php?km_mm_page=1', 'top');
    if (get_option('km_newhere_rewrite_flushed') !== KM_VER) {
        flush_rewrite_rules(false);
        update_option('km_newhere_rewrite_flushed', KM_VER);
    }
}, 20);
add_filter('query_vars', function ($vars) { $vars[] = 'km_forme_page'; $vars[] = 'km_qenough_page'; $vars[] = 'km_check_page'; $vars[] = 'km_mm_page'; return $vars; });
add_filter('template_include', function ($template) {
    $map = array('km_forme_page' => 'page-is-this-for-me.php', 'km_qenough_page' => 'page-is-the-quran-enough.php', 'km_check_page' => 'page-check-it-yourself.php', 'km_mm_page' => 'page-mathematical-miracle.php');
    foreach ($map as $qv => $file) {
        if (get_query_var($qv)) {
            $t = get_stylesheet_directory() . '/' . $file;
            if (file_exists($t)) return $t;
        }
    }
    return $template;
});

/* ---- Homepage SEO: Tamil title + description, html lang (km_home_seo_title) ---- */
function km_home_seo_title() { return 'கடவுளுக்கு மட்டும் சரணடைதல் (இஸ்லாம்) | Kadavulmattum.org'; }
function km_home_seo_desc() { return 'கடவுளுக்கு மட்டும் சரணடைதல் (இஸ்லாம்) – மனிதகுலத்திற்கான கடவுளின் இறுதி செய்தி. குர்ஆன் தமிழ் மொழிபெயர்ப்பு, ஆடியோ, வீடியோக்கள், புத்தகங்கள் மற்றும் 19 கால்குலேட்டர்.'; }
foreach (array('wpseo_title', 'wpseo_opengraph_title', 'wpseo_twitter_title') as $km_h) {
    add_filter($km_h, function ($t) { return is_front_page() ? km_home_seo_title() : $t; });
}
foreach (array('wpseo_metadesc', 'wpseo_opengraph_desc', 'wpseo_twitter_description') as $km_h) {
    add_filter($km_h, function ($d) { return is_front_page() ? km_home_seo_desc() : $d; });
}
add_filter('language_attributes', function ($o) { return preg_replace('/lang="[^"]*"/', 'lang="ta"', $o); });

/* ---- Newsletter subscribe (AJAX) ---- */
function km_newsletter_subscribe() {
	if (!empty($_POST['website'])) { wp_send_json(array('success'=>true,'data'=>'Thank you for subscribing!')); }
	$loaded = isset($_POST['form_load_time']) ? intval($_POST['form_load_time']) : 0;
	if ($loaded && (time() - $loaded) < 2) { wp_send_json(array('success'=>false,'data'=>'Please try again.')); }
	$email = isset($_POST['newsletter_email']) ? sanitize_email(wp_unslash($_POST['newsletter_email'])) : '';
	$lang  = isset($_POST['newsletter_language']) ? sanitize_text_field(wp_unslash($_POST['newsletter_language'])) : 'tamil';
	if (!is_email($email)) { wp_send_json(array('success'=>false,'data'=>'சரியான மின்னஞ்சல் முகவரியை உள்ளிடவும்.')); }
	if (!in_array($lang, array('english','tamil','both'), true)) $lang = 'tamil';
	$subs = get_option('kadavulmattum_subscribers', array());
	if (!is_array($subs)) $subs = array();
	$subs[$email] = array('lang'=>$lang, 'time'=>current_time('mysql'));
	update_option('kadavulmattum_subscribers', $subs, false);
	@wp_mail(get_option('admin_email'), 'New newsletter subscriber — Kadavulmattum.org', "Email: {$email}\nLanguage: {$lang}\nWhen: " . current_time('mysql'));
	wp_send_json(array('success'=>true,'data'=>'பதிவு செய்யப்பட்டது, இன்ஷா அல்லாஹ்! இறைவன் ஏற்றுக்கொள்வானாக.'));
}
add_action('wp_ajax_newsletter_subscribe', 'km_newsletter_subscribe');
add_action('wp_ajax_nopriv_newsletter_subscribe', 'km_newsletter_subscribe');

/* ---- Contact form (AJAX) ---- */
function km_contact_submit() {
	if (!empty($_POST['website'])) { wp_send_json(array('success'=>true,'data'=>'Thank you for your message!')); }
	$loaded = isset($_POST['form_load_time']) ? intval($_POST['form_load_time']) : 0;
	if ($loaded && (time() - $loaded) < 2) { wp_send_json(array('success'=>false,'data'=>'Please try again.')); }
	$name    = isset($_POST['contact_name'])    ? sanitize_text_field(wp_unslash($_POST['contact_name'])) : '';
	$email   = isset($_POST['contact_email'])   ? sanitize_email(wp_unslash($_POST['contact_email'])) : '';
	$phone   = isset($_POST['contact_phone'])   ? sanitize_text_field(wp_unslash($_POST['contact_phone'])) : '';
	$message = isset($_POST['contact_message']) ? sanitize_textarea_field(wp_unslash($_POST['contact_message'])) : '';
	if (empty($name) || !is_email($email) || empty($message)) {
		wp_send_json(array('success'=>false,'data'=>'பெயர், சரியான மின்னஞ்சல் மற்றும் செய்தியை நிரப்பவும்.'));
	}
	$body = "Name: {$name}\nEmail: {$email}\nPhone: " . ($phone !== '' ? $phone : '-') . "\nMessage:\n{$message}\n\nWhen: " . current_time('mysql') . "\nSite: Kadavulmattum.org";
	$sent = wp_mail('info@godalone.in', 'New contact message — Kadavulmattum.org', $body, array('Reply-To: ' . $name . ' <' . $email . '>'));
	if ($sent) {
		wp_send_json(array('success'=>true,'data'=>'உங்கள் செய்தி அனுப்பப்பட்டது, இன்ஷா அல்லாஹ்! விரைவில் தொடர்பு கொள்வோம்.'));
	} else {
		wp_send_json(array('success'=>false,'data'=>'செய்தி அனுப்புவதில் பிழை ஏற்பட்டது. மீண்டும் முயற்சிக்கவும்.'));
	}
}
add_action('wp_ajax_submit_contact_form', 'km_contact_submit');
add_action('wp_ajax_nopriv_submit_contact_form', 'km_contact_submit');

/* ---- Admin: subscribers list page ---- */
add_action('admin_menu', function () {
	add_menu_page(
		'Newsletter Subscribers', 'Subscribers', 'manage_options',
		'km-subscribers', 'km_render_subscribers_page', 'dashicons-email', 30
	);
});
function km_render_subscribers_page() {
	if (!current_user_can('manage_options')) return;
	$subs = get_option('kadavulmattum_subscribers', array());
	if (!is_array($subs)) $subs = array();
	echo '<div class="wrap"><h1>Newsletter Subscribers (' . count($subs) . ')</h1><table class="widefat striped"><thead><tr><th>Email</th><th>Language</th><th>Subscribed</th></tr></thead><tbody>';
	if (empty($subs)) {
		echo '<tr><td colspan="3">No subscribers yet.</td></tr>';
	} else {
		$rows = array();
		foreach ($subs as $email => $d) {
			$rows[] = array($email, isset($d['lang']) ? $d['lang'] : '', isset($d['time']) ? $d['time'] : '');
		}
		usort($rows, function($a,$b){ return strcmp($b[2], $a[2]); });
		foreach ($rows as $r) {
			echo '<tr><td>' . esc_html($r[0]) . '</td><td>' . esc_html($r[1]) . '</td><td>' . esc_html($r[2]) . '</td></tr>';
		}
	}
	echo '</tbody></table></div>';
}


/* ============================================================
 * Advanced Search Engine (kh_index) — Tamil (kadavulmattum.org)
 * ============================================================ */

add_action('init', function () {
	register_post_type('kh_index', array(
		'label' => 'Search Index',
		'public' => false,
		'publicly_queryable' => true,
		'exclude_from_search' => false,
		'show_ui' => false,
		'supports' => array('title', 'excerpt', 'editor'),
	));
});

add_action('pre_get_posts', function ($q) {
	if (is_admin() || !$q->is_main_query() || !$q->is_search()) return;
	$pt = $q->get('post_type');
	if (empty($pt)) $pt = array('post', 'page');
	if (!is_array($pt)) $pt = array($pt);
	if (!in_array('kh_index', $pt, true)) $pt[] = 'kh_index';
	$q->set('post_type', $pt);
});

function kh_index_url($post_id) {
	$u = get_post_meta($post_id, '_kh_url', true);
	return $u ? $u : get_permalink($post_id);
}

/* ---------- Highlighting ---------- */
function kh_highlight_plain($text, $q) {
	$q = trim((string) $q);
	$safe = esc_html($text);
	if ($q === '') return $safe;
	$safe = preg_replace('/(' . preg_quote(esc_html($q), '/') . ')/iu', '<mark class="srch-hl">$1</mark>', $safe);
	return $safe;
}
function kh_highlight_excerpt($text, $q, $len = 220) {
	$q = trim((string) $q);
	$text = wp_strip_all_tags($text);
	if ($q !== '' && mb_stripos($text, $q) !== false) {
		$pos = mb_stripos($text, $q);
		$start = max(0, $pos - 80);
		$excerpt = ($start > 0 ? '… ' : '') . mb_substr($text, $start, $len) . (mb_strlen($text) > $start + $len ? ' …' : '');
	} else {
		$excerpt = mb_substr($text, 0, $len) . (mb_strlen($text) > $len ? ' …' : '');
	}
	return kh_highlight_plain($excerpt, $q);
}

/* ---------- Verse-number detection: suggest the Quran WebApp when the query looks like a verse/sura reference ---------- */
function kh_looks_like_verse($q) {
	$q = trim((string) $q);
	if ($q === '') return false;
	if (preg_match('/^\d{1,3}\s*[:.\-]\s*\d{1,3}$/', $q)) return true;
	if (preg_match('/^\d{1,3}$/', $q)) {
		$n = (int) $q;
		if ($n >= 1 && $n <= 114) return true;
	}
	return false;
}

/* ---------- Richer real page text layered onto select index items, for deeper "whole page" search matching (kept out of the short displayed excerpt) ---------- */
function kh_enrich_content($title, $fallback) {
	$map = array(
		'ஜகாத் கால்குலேட்டர்' => 'ஜகாத் என்பது நம் நிகர வருமானத்தில் 2.5% ஆகும், வருமானம் கிடைத்த நாளே கொடுக்க வேண்டும். கடமையான தர்மம் (ஜகாத்) அறுவடை நாளிலேயே கொடுக்கப்பட வேண்டும் (6:141). நிகர வருமானம் கிடைக்கும்போதெல்லாம், 2.5% ஒதுக்கி பெற்றோர், உறவினர்கள், அநாதைகள், ஏழைகள், வழிப்போக்கர் ஆகியோருக்கு கொடுக்க வேண்டும் (2:215). என் கருணை அனைத்தையும் சூழ்ந்துள்ளது, ஆனால் ஜகாத் கொடுக்கும் நல்லோருக்கே அதை நான் குறிப்பிடுவேன் (7:156). குர்ஆன் 6:141, 2:215, 7:156.',
		'தொழுகை நேரம்' => 'தொழுகை & ரமலான் நேரம் — பூமியின் எந்த இடத்திற்கும் துல்லியமான தொழுகை நேரங்கள். ஃபஜ்ர், லுஹர், அஸர், மஃரிப், இஷா — ஐந்து நேர தொடர்பு தொழுகைகள் (ஸலாத்), நமாஸ் நேரம். உங்கள் இட பெயரை உள்ளிடவும் அல்லது உங்கள் இருப்பிடத்தை பயன்படுத்தவும். கடவுள் அங்கீகரித்த ஒரே மதம் சரணடைதல் ஆகும் (3:19). இந்த ஆண்டின் ரமலான் தேதிகள், முதல் & கடைசி நோன்பு நாள், 10 அருள் இரவுகள், விதியின் இரவு (லைலத் அல்-கத்ர்) ஆகியவற்றையும் காணலாம்.',
		'ரமலான் கால்குலேட்டர்' => 'பூமியின் எந்த இடத்திற்கும் இந்த ஆண்டின் ரமலான் தேதிகளை கண்டறியவும், நிலவின் அடிப்படையில் கணக்கிடப்படுகிறது. ரமலான் என்பது குர்ஆன் அருளப்பட்ட மாதம், மக்களுக்கு வழிகாட்டுதலையும் தெளிவான போதனைகளையும் அளிக்கிறது (2:185). முதல் நோன்பு நாள், கடைசி நோன்பு நாள், 10 அருள் இரவுகள், விதியின் இரவு ஆகியவை புதிய நிலவு மற்றும் சூரிய அஸ்தமனத்தின் அடிப்படையில் கணக்கிடப்படுகின்றன.',
		'19 கால்குலேட்டர்' => 'பெரிய எண்களை 19 ஆல் வகுக்கும் நடைமுறை கால்குலேட்டர் — எந்த நீளமான எண்ணும் 19 ஆல் வகுபடுகிறதா என உடனடியாக சரிபார்க்கிறது. குர்ஆனில் 114 சூராக்கள் = 19x6. அல்லாஹ் என்ற சொல் 2698 முறை = 19x142. குர்ஆனில் மொத்தம் 6346 வசனங்கள் = 19x334. "அதன் மேல் பத்தொன்பது" — குர்ஆன் 74:30. குர்ஆனின் கணித அற்புதம், எண் 19 அடிப்படையில்.',
		'குர்ஆன் கேள்வி பதில்' => 'GodAlone.in குர்ஆன் வினாடி வினா — புனித குர்ஆன் பற்றிய உங்கள் அறிவை சோதித்து வளர்த்துக் கொள்ளுங்கள். ஒவ்வொரு வினாடி வினாவிலும் 10 சீரற்ற கேள்விகள் மற்றும் 10 நிமிட நேரம், விரும்பியவரை மீண்டும் விளையாடலாம். எளிது, நடுத்தரம், கடினம் அல்லது கலப்பு நிலையைத் தேர்ந்தெடுக்கவும்.',
		'வீடியோக்கள்' => 'திரு ரஷாத் கலீஃபா ஆங்கிலம் & தமிழ் வீடியோக்கள், ஜும்மாஹ் பயான்கள், மஸ்ஜித் இந்தியா குர்ஆன் வகுப்பு பயான், 19ன் அற்புதம் குறும்படங்கள், தமிழ் ஆன்லைன் குர்ஆன் படிப்பு.',
		'புத்தகங்கள்' => 'தமிழில் புத்தகங்கள் மற்றும் நூல்கள் பதிவிறக்கம், GodAlone.in நூலகத்தின் புத்தகங்களும் இங்கு இணைக்கப்பட்டுள்ளன.',
		'கருவிகள்' => 'இஸ்லாமிய கருவிகள் தொகுப்பு — 19 கால்குலேட்டர், நீள எண் கால்குலேட்டர், அப்ஜத் கால்குலேட்டர், ரமலான் கால்குலேட்டர், தொழுகை நேரம் அனைத்தும் ஓரிடத்தில்.',
	);
	return isset($map[$title]) ? ($map[$title] . ' ' . $fallback) : $fallback;
}

function kh_seed_index_items() {
	return array(
		array('title' => 'அறிமுகம் — கடவுளுக்கு மட்டும் சரணடைதல்', 'url' => home_url('/introduction/'), 'excerpt' => 'மூன்று அடித்தளங்கள், வழிபாட்டின் ஐந்து கடமைகள், சரணடைதலில் ஒற்றுமை.'),
		array('title' => 'அடிக்கடி கேட்கப்படும் கேள்விகள்', 'url' => home_url('/faq/'), 'excerpt' => 'குர்ஆன், எங்கள் கருவிகள், எப்படித் தொடங்குவது பற்றிய பொதுவான கேள்விகளுக்கான பதில்கள்.'),
		array('title' => 'ஜகாத் கால்குலேட்டர்', 'url' => home_url('/zakat-calculator/'), 'excerpt' => 'உங்கள் நிகர வருமானத்தின் 2.5% ஜகாத் தொகையை உடனடியாக கணக்கிடுங்கள்.'),
		array('title' => 'தொழுகை நேரம்', 'url' => home_url('/salat-timing/'), 'excerpt' => 'உங்கள் இருப்பிடத்திற்கான துல்லியமான ஃபஜ்ர், லுஹர், அஸர், மஃரிப், இஷா தொழுகை நேரங்கள்.'),
		array('title' => 'ரமலான் கால்குலேட்டர்', 'url' => home_url('/ramadan-calculator/'), 'excerpt' => 'முதல் & கடைசி நோன்பு நாள், 10 அருள் இரவுகள், விதியின் இரவு தேதிகளைக் கண்டறியுங்கள்.'),
		array('title' => 'குர்ஆன் கலரிங் புத்தகம்', 'url' => home_url('/coloring-book/'), 'excerpt' => 'குர்ஆனில் உள்ள நபிமார்களின் கதைகளை ஆன்லைனில் வண்ணமிடுங்கள், அல்லது வெற்றுப் பக்கத்தை அச்சிட்டுக் கையால் வண்ணமிடுங்கள்.'),
		array('title' => '19 கால்குலேட்டர்', 'url' => home_url('/calculator-19/'), 'excerpt' => 'எந்த எண்ணும் 19 ஆல் வகுபடுகிறதா என உடனடியாக சரிபார்க்கவும்.'),
		array('title' => 'குர்ஆன் கேள்வி பதில்', 'url' => home_url('/quran-qa/'), 'excerpt' => 'குர்ஆனிலிருந்து எளிய வினாக்கள் மூலம் உங்கள் புரிதலைச் சோதித்து மேம்படுத்திக்கொள்ளுங்கள்.'),
		array('title' => 'வீடியோக்கள்', 'url' => home_url('/videos/'), 'excerpt' => 'திரு ரஷாத் வீடியோக்கள், ஜும்மாஹ் பயான்கள், குர்ஆன் வகுப்புகள் மற்றும் மேலும் பல.'),
		array('title' => 'புத்தகங்கள்', 'url' => home_url('/library/'), 'excerpt' => 'தமிழில் புத்தகங்கள் மற்றும் GodAlone.in நூலகம்.'),
		array('title' => 'கருவிகள்', 'url' => home_url('/utilities/'), 'excerpt' => '19 கால்குலேட்டர், ரமலான் கால்குலேட்டர், தொழுகை நேரம் உள்ளிட்ட இஸ்லாமிய கருவிகள்.'),
	);
}

function kh_seed_index() {
	foreach (kh_seed_index_items() as $it) {
		$key = 'kh_' . md5($it['url']);
		$existing = get_posts(array('post_type' => 'kh_index', 'meta_key' => '_kh_key', 'meta_value' => $key, 'posts_per_page' => 1, 'post_status' => 'any'));
		$postarr = array(
			'post_type' => 'kh_index',
			'post_status' => 'publish',
			'post_title' => $it['title'],
			'post_excerpt' => $it['excerpt'],
			'post_content' => kh_enrich_content($it['title'], $it['excerpt']),
		);
		if ($existing) {
			$postarr['ID'] = $existing[0]->ID;
			wp_update_post($postarr);
			$pid = $existing[0]->ID;
		} else {
			$pid = wp_insert_post($postarr);
		}
		if ($pid && !is_wp_error($pid)) {
			update_post_meta($pid, '_kh_key', $key);
			update_post_meta($pid, '_kh_url', $it['url']);
		}
	}
}

add_action('init', function () {
	$ver = 'kh1.0.2';
	if (get_option('kh_index_seeded_ver') !== $ver) {
		kh_seed_index();
		update_option('kh_index_seeded_ver', $ver);
	}
}, 20);


// Sharing picture for the homepage (Yoast Open Graph / Twitter)
function km_home_share_image($img){
	if (is_front_page()) { return home_url('/wp-content/uploads/2026/10/share-ta.png?v=nl3'); }
	return $img;
}
add_filter('wpseo_opengraph_image','km_home_share_image');
add_filter('wpseo_twitter_image','km_home_share_image');

require_once get_template_directory() . '/inc-bottombar.php';

/* new logo 15-10-2026: cache-bust site icons (tab, apple-touch, tile) */
add_filter('get_site_icon_url', function($url){ return $url ? add_query_arg('v','nl3',$url) : $url; });

/* 15-10-2026: browsers were keeping page HTML for 7 days (max-age=604800) so visitors missed updates; keep HTML fresh for 10 min, assets keep their own long caching */
add_action('send_headers', function(){ if (is_admin() || is_user_logged_in() || (defined('DOING_AJAX') && DOING_AJAX) || (defined('REST_REQUEST') && REST_REQUEST)) return; header('Cache-Control: public, max-age=600, must-revalidate', true); }, 99);

/* ---- SEO titles + descriptions for the rewrite-routed pages (17-10-2026) ----
 * These pages have no wp-admin page behind them, so Yoast fell back to the bare
 * site name and emitted no description at all. Every title and description below
 * is taken from the page itself: its H1 and its intro paragraph, unchanged.
 * /mathematical-miracle/ is not listed: its template sets its own.
 */
function km_route_seo() {
	static $map = null;
	if ($map === null) {
		$map = array(
			'introduction' => array('அறிமுகம் — கடவுளுக்கு மட்டும் சரணடைதல் என்றால் என்ன?', 'கடவுளுக்கு மட்டும் சரணடைதல் என்ற தூய செய்திக்கு வரவேற்கிறோம் — மூன்று அடித்தளங்கள், வழிபாட்டின் ஐந்து கடமைகள், சரணடைதலில் ஒற்றுமை.'),
			'faq' => array('அடிக்கடி கேட்கப்படும் கேள்விகள்', 'கடவுளுக்கு மட்டும் சரணடைதல், குர்ஆன், எங்கள் கருவிகள் பற்றிய பொதுவான கேள்விகளுக்கான எளிய பதில்கள்.'),
			'is-this-for-me' => array('இது எனக்கானதா?', 'புதியவர்களுக்கும், ஆர்வமுள்ளவர்களுக்கும், தயக்கம் உள்ளவர்களுக்கும் ஒரு எளிய பதில். நீங்கள் யாராக இருந்தாலும், தயவுசெய்து தொடர்ந்து படியுங்கள்.'),
			'is-the-quran-enough' => array('குர்ஆன் போதுமானதா?', 'குர்ஆன் தன்னைப் பற்றி என்ன கூறுகிறது என்பதை அமைதியாகப் பாருங்கள். படியுங்கள், பிறகு நீங்களே முடிவு செய்யுங்கள்.'),
			'check-it-yourself' => array('5 நிமிடத்தில் நீங்களே சரிபாருங்கள்', 'யாரையும் நம்ப வேண்டியதில்லை. ஒரு கால்குலேட்டரை எடுத்து இந்த எண்களை நீங்களே சரிபாருங்கள்.'),
			'contact' => array('தொடர்பு கொள்ள', 'குர்ஆன் பற்றி கேள்வி உள்ளதா, அல்லது தளத்தைப் பயன்படுத்த உதவி தேவையா? எங்களுக்கு எழுதுங்கள். ஒவ்வொரு செய்தியையும் நாங்கள் படிக்கிறோம், இன்ஷா அல்லாஹ்.'),
			'calculator-19' => array('19 கால்குலேட்டர்', 'பெரிய எண்களை 19 ஆல் வகுத்துப் பார்க்கும் நடைமுறை கால்குலேட்டர் — எத்தனை நீளமான எண்ணாக இருந்தாலும், அது 19 ஆல் வகுபடுகிறதா என உடனடியாக சரிபார்க்கும்.'),
			'zakat-calculator' => array('கடமையான தர்மம் (ஜகாத்)', 'உங்கள் நிகர வருமானத்தில் 2.5% ஜகாத்தாகும் — கீழே தொகையை உள்ளிட்டு கணக்கிடவும்.'),
			'salat-timing' => array('தொழுகை மற்றும் ரமலான் நேரம்', 'பூமியில் எந்த இடத்திற்கும் துல்லியமான தொழுகை நேரங்கள் — கீழே உங்கள் ஊரை உள்ளிடவும்.'),
			'ramadan-calculator' => array('ரமலான் கால்குலேட்டர்', 'பூமியில் எந்த இடத்திற்கும் இந்த ஆண்டின் ரமலான் தேதிகளைக் கண்டறியவும் — நிலவிலிருந்து கணக்கிடப்படுகிறது, இன்ஷா அல்லாஹ்.'),
			'downloads' => array('குர்ஆன் பதிவிறக்கம்', 'குர்ஆன் பதிவிறக்கம்.'),
			'about' => array('எங்களைப் பற்றி', 'கடவுள் மட்டுமே, குர்ஆன் மட்டுமே.'),
			'privacy-policy' => array('தனிப்பட்ட தகவல் கொள்கை', 'நாங்கள் மிகக் குறைவான தகவல்களையே சேகரிக்கிறோம். உங்கள் தகவலை யாருக்கும் விற்பதில்லை.'),
			'copyright' => array('பதிவுரிமை', 'திறந்த மூலம், இலவசமாகப் பகிரலாம்.'),
			'picture-messages' => array('குர்ஆன் படச் செய்திகள்', 'அழகிய வசனங்களைப் படிக்கவும், பதிவிறக்கவும், பகிரவும். கடவுள் மட்டுமே, குர்ஆன் மட்டுமே.'),
		);
	}
	$p = isset($_SERVER['REQUEST_URI']) ? strtok($_SERVER['REQUEST_URI'], '?') : '';
	$p = trim($p, '/');
	return isset($map[$p]) ? $map[$p] : null;
}
add_filter('pre_get_document_title', function ($t) {
	$s = km_route_seo();
	return $s ? $s[0] . ' | Kadavulmattum.org' : $t;
});
/* Yoast owns the <title> on this site, so override it there too. */
foreach (array('wpseo_title', 'wpseo_opengraph_title', 'wpseo_twitter_title') as $km_sh) {
	add_filter($km_sh, function ($t) { $s = km_route_seo(); return $s ? $s[0] . ' | Kadavulmattum.org' : $t; });
}
add_action('wp_head', function () {
	$s = km_route_seo();
	if ($s) { echo '<meta name="description" content="' . esc_attr($s[1]) . '">' . "\n"; }
}, 1);

/* ---- Tamil FAQ page /faq/ (wp-admin-free routing) 18-10-2026 ---- */
add_action('init', function () {
    add_rewrite_rule('^faq/?$', 'index.php?km_faq_page=1', 'top');
    add_rewrite_rule('^introduction/?$', 'index.php?km_intro_page=1', 'top');
    if (get_option('km_faq_rewrite_flushed') !== KM_VER) {
        flush_rewrite_rules(false);
        update_option('km_faq_rewrite_flushed', KM_VER);
    }
}, 21);
add_filter('query_vars', function ($vars) { $vars[] = 'km_faq_page'; $vars[] = 'km_intro_page'; return $vars; });
add_filter('template_include', function ($template) {
    if (get_query_var('km_faq_page')) {
        $t = get_stylesheet_directory() . '/page-faq.php';
        if (file_exists($t)) return $t;
    }
    if (get_query_var('km_intro_page')) {
        $t = get_stylesheet_directory() . '/page-introduction.php';
        if (file_exists($t)) return $t;
    }
    return $template;
});
