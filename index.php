<?php
/**
 * Generic index/archive template -- Kadavulmattum Premium
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">Kadavulmattum.org</div>
    <h1><?php wp_title(''); ?></h1>
  </div>
</div>

<div class="article">
  <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
    <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
    <?php the_excerpt(); ?>
  <?php endwhile; else : ?>
    <p>உள்ளடக்கம் இல்லை.</p>
  <?php endif; ?>
</div>

<?php get_footer(); ?>
