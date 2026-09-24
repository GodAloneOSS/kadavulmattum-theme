<?php
/**
 * Template for the Contact page (slug: contact).
 * Routed via a rewrite rule in functions.php (km_contact_page query var) —
 * no WP Page row needed, since this session has no wp-admin access to
 * create one through the admin. See functions.php for the rewrite/
 * template_include wiring.
 */
if (!defined('ABSPATH')) exit;
get_header();
?>

<style>
.contact-form label{display:block;color:var(--gold-bright);margin-bottom:6px;font-weight:600;font-size:.92rem}
.contact-form input,.contact-form textarea{width:100%;padding:12px;border:2px solid var(--line);
  border-radius:10px;background:var(--panel-2);color:var(--ink);font-size:1rem;font-family:inherit;box-sizing:border-box}
.contact-form input:focus,.contact-form textarea:focus{outline:none;border-color:var(--gold);
  box-shadow:0 0 0 3px rgba(216,180,94,.25)}
.contact-form .field{margin-bottom:18px}
.contact-form .req{color:#e0685f}
#contactHint{display:none;padding:14px;border-radius:10px;text-align:center;margin-top:14px;font-weight:600;background:linear-gradient(135deg,#4ade80,#22c55e);color:#fff}
#contactHint.show{display:block}
#contactHint.err{background:linear-gradient(135deg,#ef4444,#dc2626)}
.contact-info-card{background:var(--panel-2);padding:22px;border-radius:var(--radius);border:1px solid var(--line);
  text-align:center;transition:.2s}
.contact-info-card:hover{transform:translateY(-3px)}
.contact-info-card .ico{font-size:1.6rem;margin-bottom:8px}
.contact-grid{display:grid;grid-template-columns:1.3fr 1fr;gap:24px}
@media (max-width:820px){.contact-grid{grid-template-columns:1fr}}
.contact-cards{display:flex;flex-direction:column;gap:18px}
</style>

<div class="page-hero">
  <div class="wrap">
    <div class="crumb">Kadavulmattum.org</div>
    <h1>📞 தொடர்பு கொள்ள</h1>
    <p style="color:var(--ink-soft);max-width:640px;margin:14px auto 0">உங்களிடமிருந்து கேட்க விரும்புகிறோம். குர்ஆன் பற்றிய கேள்விகள் இருந்தாலோ, உதவி தேவைப்பட்டாலோ, அல்லது உங்கள் கருத்துக்களைப் பகிர விரும்பினாலோ, இன்ஷா அல்லாஹ், தொடர்பு கொள்ளுங்கள்.</p>
  </div>
</div>

<section class="blk">
  <div class="wrap">
    <div class="contact-grid">
      <div class="card">
        <h2 style="margin-bottom:20px">✉️ எங்களுக்கு செய்தி அனுப்புங்கள்</h2>
        <form id="contactForm" class="contact-form">
          <div class="field">
            <label>பெயர் <span class="req">*</span></label>
            <input type="text" name="contact_name" required>
          </div>
          <div class="field">
            <label>மின்னஞ்சல் <span class="req">*</span></label>
            <input type="email" name="contact_email" required>
          </div>
          <div class="field">
            <label>தொலைபேசி (விருப்பத்திற்குரியது)</label>
            <input type="tel" name="contact_phone">
          </div>
          <div class="field">
            <label>செய்தி <span class="req">*</span></label>
            <textarea name="contact_message" rows="5" required></textarea>
          </div>
          <input type="text" id="contactHoney" class="honey" name="website" tabindex="-1" autocomplete="off">
          <input type="hidden" id="contactFt" value="<?php echo time(); ?>">
          <button type="submit" class="btn btn-gold" style="width:100%">📤 செய்தி அனுப்பவும்</button>
          <p id="contactHint"></p>
        </form>
      </div>
      <div class="contact-cards">
        <div class="contact-info-card">
          <div class="ico">📞</div>
          <h3 style="margin-bottom:.4rem">தொலைபேசி</h3>
          <a href="tel:+919566268619" style="color:var(--ink-soft);text-decoration:none">+91 95662 68619</a>
        </div>
        <div class="contact-info-card">
          <div class="ico">✉️</div>
          <h3 style="margin-bottom:.4rem">மின்னஞ்சல்</h3>
          <a href="mailto:info@godalone.in" style="color:var(--ink-soft);text-decoration:none">info@godalone.in</a>
        </div>
        <div class="contact-info-card">
          <div class="ico">💬</div>
          <h3 style="margin-bottom:.4rem">WhatsApp</h3>
          <a href="https://wa.me/919566268619" target="_blank" rel="noopener" style="color:var(--ink-soft);text-decoration:none">WhatsApp-ல் செய்தி அனுப்பவும்</a>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="news reveal">
  <div class="news-inner">
    <div class="kicker">✉️ செய்திமடல்</div>
    <h2>புதுப்பிப்புகளைப் பெற பதிவு செய்யுங்கள்</h2>
    <p>புதிய கட்டுரைகள், வீடியோக்கள் மற்றும் புத்தகங்கள் குறித்த அறிவிப்புகளை உங்கள் மின்னஞ்சலில் பெறுங்கள்.</p>
    <form id="ghNews">
      <div class="lang-pick">
        <label><input type="radio" name="newsletter_lang" value="tamil" checked><span>தமிழ்</span></label>
        <label><input type="radio" name="newsletter_lang" value="english"><span>English</span></label>
        <label><input type="radio" name="newsletter_lang" value="both"><span>Both</span></label>
      </div>
      <div class="row">
        <input type="email" class="ghne" placeholder="your@email.com" required>
        <button type="submit" class="btn btn-gold sub">✉️ பதிவு செய்யவும்</button>
      </div>
      <input type="text" id="ghHoney" class="honey" name="website" tabindex="-1" autocomplete="off">
      <input type="hidden" id="ghFt" value="<?php echo time(); ?>">
      <p class="hint" id="ghHint"></p>
    </form>
  </div>
</section>

<section class="verse">
  <div class="wrap">
    <p class="ar">وَإِذَا سَأَلَكَ عِبَادِي عَنِّي فَإِنِّي قَرِيبٌ ۖ أُجِيبُ دَعْوَةَ الدَّاعِ إِذَا دَعَانِ</p>
    <blockquote>என் அடியார்கள் என்னைப் பற்றி உன்னிடம் கேட்டால், நிச்சயமாக நான் அருகில் இருக்கிறேன். பிரார்த்திப்பவன் பிரார்த்திக்கும்போது அவனுடைய பிரார்த்தனைக்குப் பதிலளிக்கிறேன்.</blockquote>
    <cite>குர்ஆன் 2:186</cite>
  </div>
</section>

<?php get_footer(); ?>
