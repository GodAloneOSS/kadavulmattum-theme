<?php
/**
 * Picture Messages: routing, file index, and image delivery (thumbnail + original).
 * Only validated file names like 3.2 / 3.2t / 3.2h are ever opened. No arbitrary paths.
 */
if (!defined('ABSPATH')) exit;

function km_pm_dir() {
    $shared = dirname(dirname(untrailingslashit(ABSPATH))) . '/godalone.in/public_html/wp-content/uploads/picture-messages';
    if (@is_dir($shared)) return $shared;
    $u = wp_upload_dir(); return $u['basedir'] . '/picture-messages';
}

function km_pm_find($stem) {
    if (!preg_match('/^(\d{1,3})\.(\d{1,3})([th]?)$/', $stem)) return '';
    $d = km_pm_dir();
    foreach (array('png', 'jpg') as $x) {
        foreach (array("$d/*/*/$stem.$x", "$d/*/$stem.$x", "$d/$stem.$x") as $g) {
            $m = glob($g);
            if ($m) return $m[0];
        }
    }
    return '';
}

function km_pm_index() {
    $c = get_transient('km_pm_index');
    if (is_array($c)) return $c;
    $d = km_pm_dir();
    $files = array_merge(glob("$d/*/*/*.{png,jpg}", GLOB_BRACE) ?: array(), glob("$d/*/*.{png,jpg}", GLOB_BRACE) ?: array(), glob("$d/*.{png,jpg}", GLOB_BRACE) ?: array());
    $idx = array();
    foreach ($files as $f) {
        if (preg_match('/^(\d{1,3})\.(\d{1,3})([th]?)\.(png|jpg)$/', basename($f), $m)) {
            $l = ($m[3] === '') ? 'e' : $m[3];
            $idx[(int)$m[1]][(int)$m[2]][$l] = 1;
        }
    }
    ksort($idx);
    foreach ($idx as $k => $v) { ksort($v); $idx[$k] = $v; }
    set_transient('km_pm_index', $idx, 300);
    return $idx;
}

function km_pm_daily($l) {
    $idx = km_pm_index();
    $list = array();
    foreach ($idx as $s => $vs) { foreach ($vs as $v => $ls) { if (isset($ls[$l])) $list[] = $s . '.' . $v . ($l === 'e' ? '' : $l); } }
    if (!$list) return '';
    return $list[(int) floor((time() + 19800) / 86400) % count($list)];
}

add_action('init', function () {
    add_rewrite_rule('^picture-messages/share/([0-9]{1,3}\.[0-9]{1,3}[th]?)/?$', 'index.php?km_pm=share&km_pmf=$matches[1]', 'top'); add_rewrite_rule('^picture-messages/img/?$', 'index.php?km_pm=img', 'top');
    add_rewrite_rule('^picture-messages/?$', 'index.php?km_pm=page', 'top');
    if (get_option('km_pm_rewrite_flushed') !== KM_VER || get_option('km_pm_share_rule') !== '1') { update_option('km_pm_share_rule', '1');
        flush_rewrite_rules(false);
        update_option('km_pm_rewrite_flushed', KM_VER);
    }
}, 20);

add_filter('query_vars', function ($vars) { $vars[] = 'km_pm'; $vars[] = 'km_pmf'; return $vars; });

add_filter('template_include', function ($template) {
    if (get_query_var('km_pm') === 'page') {
        $t = get_stylesheet_directory() . '/page-picture-messages.php';
        if (file_exists($t)) return $t;
    }
    return $template;
});

add_action('template_redirect', function () {
    if (get_query_var('km_pm') === 'share') { $f = (string) get_query_var('km_pmf'); if (!km_pm_find($f)) { status_header(404); exit; } $su = home_url('/picture-messages/share/' . $f . '/'); $si = home_url('/picture-messages/img/?f=' . $f); $sg = home_url('/picture-messages/#' . $f); while (ob_get_level()) ob_end_clean(); header('Content-Type: text/html; charset=utf-8'); header('Cache-Control: public, max-age=600'); echo '<!doctype html><html lang="ta"><head><meta charset="utf-8"><title>குர்ஆன் வசனம் - KadavulMattum.org</title><meta name="viewport" content="width=device-width,initial-scale=1"><meta name="robots" content="noindex"><meta property="og:type" content="website"><meta property="og:site_name" content="KadavulMattum.org"><meta property="og:title" content="குர்ஆன் வசனம் - KadavulMattum.org"><meta property="og:description" content="கடவுளுக்கு மட்டும் சரணடைதல். குர்ஆனைப் படியுங்கள்"><meta property="og:url" content="' . esc_attr($su) . '"><meta property="og:image" content="' . esc_attr($si) . '"><meta property="og:image:type" content="image/jpeg"><meta name="twitter:card" content="summary_large_image"><meta name="twitter:image" content="' . esc_attr($si) . '"><script>location.replace(' . wp_json_encode($sg) . ');</script></head><body><p><a href="' . esc_url($sg) . '">KadavulMattum.org</a></p></body></html>'; exit; } if (get_query_var('km_pm') !== 'img') return;
    if (isset($_GET['idx'])) {
        $o = array();
        foreach (km_pm_index() as $s => $vs) { foreach ($vs as $v => $ls) { $o[$s][$v] = implode('', array_keys($ls)); } }
        while (ob_get_level()) ob_end_clean();
        header('Content-Type: application/json; charset=utf-8');
        header('Cache-Control: public, max-age=300');
        echo wp_json_encode($o);
        exit;
    }
    $stem = isset($_GET['f']) ? (string) $_GET['f'] : '';
    $src = km_pm_find($stem);
    if (!$src) { status_header(404); exit; }
    $full = (isset($_GET['s']) && $_GET['s'] === 'full');
    while (ob_get_level()) ob_end_clean();
    if ($full) {
        header('Content-Type: ' . (substr($src, -4) === '.jpg' ? 'image/jpeg' : 'image/png'));
        header('Cache-Control: public, max-age=604800');
        header('Content-Length: ' . filesize($src));
        readfile($src);
        exit;
    }
    $td = km_pm_dir() . '/_thumbs';
    if (!is_dir($td)) wp_mkdir_p($td);
    $tf = $td . '/' . $stem . '.jpg';
    if ((!file_exists($tf) || filemtime($tf) < filemtime($src)) && function_exists('imagecreatefrompng')) {
        @ini_set('memory_limit', '512M');
        $im = (substr($src, -4) === '.jpg') ? @imagecreatefromjpeg($src) : @imagecreatefrompng($src);
        if ($im) {
            $w = imagesx($im); $h = imagesy($im);
            $nw = min(600, $w); $nh = (int) round($h * $nw / $w);
            $t = imagecreatetruecolor($nw, $nh);
            imagefill($t, 0, 0, imagecolorallocate($t, 255, 255, 255));
            imagecopyresampled($t, $im, 0, 0, 0, 0, $nw, $nh, $w, $h);
            imagejpeg($t, $tf, 82);
            imagedestroy($im); imagedestroy($t);
        }
    }
    header('Cache-Control: public, max-age=604800');
    if (file_exists($tf)) {
        header('Content-Type: image/jpeg');
        header('Content-Length: ' . filesize($tf));
        readfile($tf);
    } else {
        header('Content-Type: image/png');
        readfile($src);
    }
    exit;
});
