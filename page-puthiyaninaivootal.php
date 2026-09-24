<?php
/**
 * Template for the Books hub page (slug: puthiyaninaivootal).
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">Kadavulmattum.org</div>
    <h1>📚 புத்தகங்கள்</h1>
    <p style="color:var(--ink-soft);max-width:640px;margin:14px auto 0">"புதிய நினைவூட்டல்" &mdash; டாக்டர் ரஷாத் கலீஃபாவின் நினைவூட்டல் நூல் தொடர்.</p>
  </div>
</div>

<section class="blk">
  <div class="wrap">
    <?php while (have_posts()) : the_post(); ?>
    <article class="article" style="padding:0 0 40px">
      <?php the_content(); ?>
    </article>
    <?php endwhile; ?>

    <div class="sec-head">
      <div class="kicker">📖 தொடர் நூல்கள்</div>
      <h2>New Reminder &ndash; தொடர்</h2>
    </div>
    <div class="grid grid-3">
      <a class="card" href="<?php echo esc_url(home_url('/puthiya-ninavootal-book-1/')); ?>"><div class="ico">📗</div><h3>புத்தகம் 1 (Sep 1999)</h3><p>புதிய நினைவூட்டல் &mdash; முதல் தொகுதி.</p></a>
      <a class="card" href="<?php echo esc_url(home_url('/puthiyaninaivootal-book2/')); ?>"><div class="ico">📘</div><h3>புத்தகம் 2 (Oct 1999)</h3><p>புதிய நினைவூட்டல் &mdash; இரண்டாம் தொகுதி.</p></a>
      <a class="card" href="https://godalone.in/library/"><div class="ico">📚</div><h3>GodAlone.in Library</h3><p>ஆங்கில நூலகம் &mdash; மேலும் நூல்கள் &amp; வளங்கள்.</p></a>
    </div>
  </div>
</section>

<section class="verse">
  <div class="wrap">
    <p class="ar">وَذَكِّر فَإِنَّ الذِّكرىٰ تَنفَعُ المُؤمِنينَ</p>
    <blockquote>நினைவூட்டுவாயாக; ஏனெனில் நினைவூட்டல் நம்பிக்கையாளர்களுக்குப் பயனளிக்கும்.</blockquote>
    <cite>குர்ஆன் 51:55</cite>
  </div>
</section>

<?php get_footer(); ?>
