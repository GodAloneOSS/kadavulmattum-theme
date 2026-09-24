<?php
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

if (!defined('KM_VER')) define('KM_VER', '1.3.1');
if (!defined('KM_LOGO_DARK_DATAURI'))  define('KM_LOGO_DARK_DATAURI',  'data:image/png;base64,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');
if (!defined('KM_LOGO_LIGHT_DATAURI')) define('KM_LOGO_LIGHT_DATAURI', 'data:image/png;base64,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');

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
		array('🎥', 'வீடியோக்கள்', home_url('/videos/')),
		array('🎧', 'ஆடியோ', home_url('/audios/')),
		array('📚', 'புத்தகங்கள்', home_url('/puthiyaninaivootal/')),
		array('📰', 'கட்டுரை', home_url('/article/')),
		array('🔗', 'பயனுள்ள இணைப்புகள்', home_url('/links/')),
		array('🛠️', 'பயன்பாடுகள்', home_url('/utilities/')),
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
