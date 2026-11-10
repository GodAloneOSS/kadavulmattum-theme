<?php
/**
 * /quran1/ was an empty leftover page. Send visitors (and search engines) to the Quran app page.
 * Added 4 Nov 2026 while removing the Avada Builder plugin.
 */
if (!defined('ABSPATH')) exit;
wp_safe_redirect(home_url('/quran/'), 301);
exit;
