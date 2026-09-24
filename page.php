<?php
/**
 * Generic page template -- Kadavulmattum Premium
 *
 * Fallback for any page that doesn't yet have a custom page-{slug}.php
 * template. Renders the page's existing content (including Fusion
 * Builder shortcodes, which the Fusion Builder / Fusion Core plugins
 * process independently of the active theme) inside the new design's
 * article layout, so nothing breaks before every page is individually
 * redesigned.
 */
if (!defined('ABSPATH')) exit;
global $km_force_day_theme; $km_force_day_theme = true;
get_header();
?>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">Kadavulmattum.org</div>
    <h1><?php the_title(); ?></h1>
  </div>
</div>

<?php while (have_posts()) : the_post(); ?>
<article class="article">
  <?php the_content(); ?>
</article>
<?php endwhile; ?>

<?php get_footer(); ?>
