<?php
/**
 * Footer -- Kadavulmattum Premium
 */
if (!defined('ABSPATH')) exit;
?>
</main>

<footer class="gf">
  <div class="wrap gf-top">
    <div class="gf-brand">
      <a class="brand brand-logo" href="<?php echo esc_url(home_url('/')); ?>" aria-label="Kadavulmattum.org">
        <img src="<?php echo KM_LOGO_DARK_DATAURI; ?>" alt="Kadavulmattum.org" style="height:42px">
        <span class="n1" style="margin-inline-start:10px">Kadavulmattum.org</span>
      </a>
      <p>கடவுளுக்கு மட்டும் அடிபணிதல் &mdash; மனிதகுலத்திற்கான கடவுளின் இறுதி செய்தி. Happiness is Submission to GOD alone.</p>
    </div>
    <div>
      <h4>விரைவு இணைப்புகள்</h4>
      <ul>
        <li><a href="https://godalone.in/quran/" target="_blank" rel="noopener">குர்ஆன்</a></li>
        <li><a href="<?php echo esc_url(home_url('/videos/')); ?>">வீடியோக்கள்</a></li>
        <li><a href="<?php echo esc_url(home_url('/audios/')); ?>">ஆடியோ</a></li>
        <li><a href="<?php echo esc_url(home_url('/article/')); ?>">கட்டுரை</a></li>
      </ul>
    </div>
    <div>
      <h4>வளங்கள்</h4>
      <ul>
        <li><a href="https://godalone.in/library/" target="_blank" rel="noopener">புத்தகங்கள்</a></li>
        <li><a href="<?php echo esc_url(home_url('/links/')); ?>">பயனுள்ள இணைப்புகள்</a></li>
        <li><a href="<?php echo esc_url(home_url('/utilities/')); ?>">பயன்பாடுகள்</a></li>
        <li><a href="<?php echo esc_url(home_url('/charity/')); ?>">சரணடைந்தவர்கள் தர்ம ஸ்தாபனம்</a></li>
      </ul>
    </div>
    <div>
      <h4>இணைந்திருங்கள்</h4>
      <ul>
        <li><a href="https://whatsapp.com/channel/0029VaFhw4kK0IBpt9DOFC3G" target="_blank" rel="noopener">WhatsApp சேனல்</a></li>
        <li><a href="https://t.me/kadavulmattum_org" target="_blank" rel="noopener">Telegram</a></li>
        <li><a href="https://www.youtube.com/kadavulmattum" target="_blank" rel="noopener">YouTube</a></li>
        <li><a href="<?php echo esc_url(home_url('/contact/')); ?>">தொடர்பு கொள்ள</a></li>
      </ul>
      <div class="gf-social">
        <a href="https://whatsapp.com/channel/0029VaFhw4kK0IBpt9DOFC3G" target="_blank" rel="noopener" aria-label="WhatsApp"><span class="gf-icon" style="--gf-icon-src:url('<?php echo esc_url(get_template_directory_uri()); ?>/images/social/whatsapp.png')" aria-hidden="true"></span></a>
        <a href="https://t.me/kadavulmattum_org" target="_blank" rel="noopener" aria-label="Telegram"><span class="gf-icon" style="--gf-icon-src:url('<?php echo esc_url(get_template_directory_uri()); ?>/images/social/telegram.png')" aria-hidden="true"></span></a>
        <a href="https://www.youtube.com/kadavulmattum" target="_blank" rel="noopener" aria-label="YouTube"><span class="gf-icon" style="--gf-icon-src:url('<?php echo esc_url(get_template_directory_uri()); ?>/images/social/youtube.png')" aria-hidden="true"></span></a>
        <a href="https://www.facebook.com/thameemnf" target="_blank" rel="noopener" aria-label="Facebook"><span class="gf-icon" style="--gf-icon-src:url('<?php echo esc_url(get_template_directory_uri()); ?>/images/social/facebook.png')" aria-hidden="true"></span></a>
        <a href="https://x.com/thameemnf" target="_blank" rel="noopener" aria-label="X"><span class="gf-icon" style="--gf-icon-src:url('<?php echo esc_url(get_template_directory_uri()); ?>/images/social/x.png')" aria-hidden="true"></span></a>
        <a href="https://github.com/kadavulmattum" target="_blank" rel="noopener" aria-label="GitHub"><span class="gf-icon" style="--gf-icon-src:url('<?php echo esc_url(get_template_directory_uri()); ?>/images/social/github.svg')" aria-hidden="true"></span></a>
      </div>
    </div>
  </div>
  <div class="gf-bottom">
    <p class="duaa">رَبَّنا تَقَبَّل مِنّا</p>
    <p class="cc">&copy; <?php echo esc_html(date('Y')); ?> Kadavulmattum.org &middot; <span class="gf-oss"><a href="https://github.com/kadavulmattum" target="_blank" rel="noopener">Open Source</a> <span class="gf-heart">❤️</span></span></p>
    <p class="praise">All Praise Is Due To GOD Alone</p>
  </div>
</footer>

<a class="float" id="ghFloat" href="https://godalone.in/quran/" target="_blank" rel="noopener">
  <span style="font-size:1.15rem">📖</span><span class="d">குர்ஆன் படிக்க</span><span class="m">குர்ஆன்</span>
</a>
<button class="totop" id="ghTop" aria-label="மேலே செல்ல" type="button">↑</button>

<?php wp_footer(); ?>
</body>
</html>
