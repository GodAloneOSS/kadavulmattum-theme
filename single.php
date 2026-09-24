<?php
/**
 * Generic single-post template -- Kadavulmattum Premium
 */
if (!defined('ABSPATH')) exit;
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
