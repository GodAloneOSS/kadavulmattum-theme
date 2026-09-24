/* Kadavulmattum Premium — front-end interactions
   Menu · theme toggle · Firebase login · newsletter · reveal · float */
(function () {
  "use strict";
  var $ = function (id) { return document.getElementById(id); };
  var CFG = window.KM || {};

  document.addEventListener("DOMContentLoaded", function () {

    /* ---------- Hamburger menu ---------- */
    var menuBtn = $("ghMenuBtn"), menu = $("ghMenu");
    if (menuBtn && menu) {
      menuBtn.addEventListener("click", function (e) { e.stopPropagation(); menu.classList.toggle("show"); });
    }

    /* ---------- Docx-imported article text visibility fix ---------- */
    /* Many essay/content pages are Word-doc imports (Docxpresso plugin) whose
       paragraph/span classes hardcode color:rgb(0,0,0) (Word's default black) --
       invisible against our dark navy background. Force near-black text to the
       theme's light ink color while dark/night mode is active; restore it in
       day mode (where black-on-cream is correct) and leave genuinely colored
       emphasis text (headings, highlights) untouched. */
    function kmFixDocxTextColor() {
      var article = document.querySelector(".article");
      if (!article) return;
      var isDay = document.documentElement.classList.contains("theme-day");
      var nodes = article.querySelectorAll("*");
      for (var i = 0; i < nodes.length; i++) {
        var el = nodes[i];
        if (!el.textContent || !el.textContent.trim()) continue;
        if (isDay) {
          if (el.dataset && el.dataset.kmColorFixed) {
            el.style.removeProperty("color");
            delete el.dataset.kmColorFixed;
          }
          continue;
        }
        var m = getComputedStyle(el).color.match(/[\d.]+/g);
        if (!m || m.length < 3) continue;
        var lum = 0.2126 * m[0] + 0.7152 * m[1] + 0.0722 * m[2];
        if (lum < 60) {
          el.style.setProperty("color", "var(--ink-soft)", "important");
          el.dataset.kmColorFixed = "1";
        }
      }
    }
    kmFixDocxTextColor();

    /* ---------- Theme toggle (default = night / navy) ---------- */
    var themeBtn = $("ghThemeBtn");
    function syncThemeIcon() {
      if (themeBtn) themeBtn.textContent = document.documentElement.classList.contains("theme-day") ? "☀️" : "🌙";
    }
    syncThemeIcon();
    if (themeBtn) {
      themeBtn.addEventListener("click", function () {
        var day = document.documentElement.classList.toggle("theme-day");
        try { localStorage.setItem("kmTheme3", day ? "day" : "night"); } catch (e) {}
        syncThemeIcon();
        kmFixDocxTextColor();
      });
    }

    /* ---------- Header shadow on scroll ---------- */
    var hdr = $("ghHdr");
    addEventListener("scroll", function () {
      if (hdr) hdr.classList.toggle("scrolled", scrollY > 12);
      var top = $("ghTop"); if (top) top.classList.toggle("show", scrollY > 600);
    }, { passive: true });

    /* ---------- Back to top ---------- */
    var topBtn = $("ghTop");
    if (topBtn) topBtn.addEventListener("click", function () { scrollTo({ top: 0, behavior: "smooth" }); });

    /* ---------- Close popovers on outside click ---------- */
    document.addEventListener("click", function (e) {
      if (menuBtn && menu && !menuBtn.contains(e.target) && !menu.contains(e.target)) menu.classList.remove("show");
      var uw = $("ghUserw"), um = $("ghUmenu");
      if (uw && um && !uw.contains(e.target)) { um.classList.remove("show"); }
    });

    /* ---------- Reveal on scroll ---------- */
    var rev = document.querySelectorAll(".reveal");
    if (rev.length && "IntersectionObserver" in window) {
      var io = new IntersectionObserver(function (entries) {
        entries.forEach(function (x) { if (x.isIntersecting) { x.target.classList.add("in"); io.unobserve(x.target); } });
      }, { threshold: 0.12, rootMargin: "0px 0px -40px 0px" });
      Array.prototype.forEach.call(rev, function (el, i) {
        el.style.transitionDelay = (Math.min(i % 8, 6) * 45) + "ms";
        io.observe(el);
      });
      setTimeout(function () {
        document.querySelectorAll(".reveal:not(.in)").forEach(function (el) { el.classList.add("in"); });
      }, 1800);
    } else {
      Array.prototype.forEach.call(rev, function (el) { el.classList.add("in"); });
    }

    /* ---------- Firebase Google login ---------- */
    var fbOk = false;
    try {
      if (typeof firebase !== "undefined" && CFG.firebase) {
        if (!firebase.apps || !firebase.apps.length) firebase.initializeApp(CFG.firebase);
        fbOk = true;
      }
    } catch (e) { fbOk = false; }

    var signin = $("ghSignin"), userw = $("ghUserw"), chip = $("ghChip"), umenu = $("ghUmenu");
    function applyUser(u) {
      if (!signin) return;
      if (u) {
        signin.style.display = "none";
        if (userw) userw.style.display = "block";
        if ($("ghUnm")) $("ghUnm").textContent = (u.displayName || u.email || "Account").split(" ")[0];
        if ($("ghUfull")) $("ghUfull").textContent = u.displayName || "Signed in";
        if ($("ghUml")) $("ghUml").textContent = u.email || "";
        var av = $("ghAv");
        if (av) {
          if (u.photoURL) { av.innerHTML = '<img src="' + u.photoURL + '" referrerpolicy="no-referrer" alt="">'; }
          else { av.textContent = (u.displayName || u.email || "?").charAt(0).toUpperCase(); }
       }
        var ne = document.querySelector(".ghne");
        if (ne && !ne.value) ne.value = u.email || "";
      } else {
        signin.style.display = "";
        if (userw) userw.style.display = "none";
      }
    }
    if (fbOk) {
      firebase.auth().onAuthStateChanged(applyUser);
      if (signin) signin.addEventListener("click", function () {
        firebase.auth().signInWithPopup(new firebase.auth.GoogleAuthProvider()).catch(function (err) {
          if (err && err.code !== "auth/popup-closed-by-user" && err.code !== "auth/cancelled-popup-request")
            alert("உள்நுழைவு தோல்வியடைந்தது — மீண்டும் முயற்சிக்கவும்.");
        });
      });
      if (chip) chip.addEventListener("click", function (e) { e.stopPropagation(); if (umenu) umenu.classList.toggle("show"); });
      if ($("ghSignout")) $("ghSignout").addEventListener("click", function () {
        firebase.auth().signOut(); if (umenu) umenu.classList.remove("show");
      });
    } else if (signin) {
      signin.addEventListener("click", function () { alert("உள்நுழைவு தற்போது கிடைக்கவில்லை. விரைவில் முயற்சிக்கவும்."); });
    }

    /* ---------- Newsletter subscribe ---------- */
    var ft = $("ghFt");
    var form = $("ghNews");
    if (form) form.addEventListener("submit", function (e) {
      e.preventDefault();
      var email = form.querySelector(".ghne").value;
      var btn = form.querySelector(".sub");
      var honey = $("ghHoney");
      var sel = form.querySelector('input[name=newsletter_lang]:checked');
      var lang = sel ? sel.value : "tamil";
      if (honey && honey.value !== "") { alert("✅ பதிவு செய்ததற்கு நன்றி!"); form.reset(); return; }
      var hint = $("ghHint");
      btn.disabled = true; var label = btn.textContent; btn.textContent = "⏳ பதிவு செய்யப்படுகிறது…";
      var fd = new FormData();
      fd.append("action", "newsletter_subscribe");
      fd.append("newsletter_email", email);
      fd.append("newsletter_language", lang);
      fd.append("form_load_time", ft ? ft.value : "0");
      fd.append("website", honey ? honey.value : "");
      fd.append("nonce", CFG.nonce || "");
      fetch(CFG.ajax || "/wp-admin/admin-ajax.php", { method: "POST", body: fd })
        .then(function (r) { return r.json(); })
        .then(function (d) {
          if (hint) { hint.textContent = (d.success ? "✅ " : "❌ ") + d.data; hint.classList.add("show"); }
          if (d.success) form.reset();
          btn.disabled = false; btn.textContent = label;
          
        })
        .catch(function () {
          if (hint) { hint.textContent = "❌ பிழை ஏற்பட்டது. மீண்டும் முயற்சிக்கவும்."; hint.classList.add("show"); }
          btn.disabled = false; btn.textContent = label;
        });
    });

    /* ---------- Contact form ---------- */
    var cform = $("contactForm");
    if (cform) {
      var cft = $("contactFt"); 
      cform.addEventListener("submit", function (e) {
        e.preventDefault();
        var honey = $("contactHoney");
        if (honey && honey.value !== "") { alert("✅ உங்கள் செய்தி அனுப்பப்பட்டது!"); cform.reset(); return; }
        var btn = cform.querySelector('button[type="submit"]');
        var hint = $("contactHint");
        var label = btn.textContent;
        btn.disabled = true; btn.textContent = "⏳ அனுப்புகிறது…";
        var fd = new FormData(cform);
        fd.append("action", "submit_contact_form");
        fd.append("form_load_time", cft ? cft.value : "0");
        fd.append("nonce", CFG.nonceContact || "");
        fetch(CFG.ajax || "/wp-admin/admin-ajax.php", { method: "POST", body: fd })
          .then(function (r) { return r.json(); })
          .then(function (d) {
            if (hint) { hint.textContent = (d.success ? "✅ " : "❌ ") + d.data; hint.classList.add("show"); }
            if (d.success) cform.reset();
            btn.disabled = false; btn.textContent = label;
            
          })
          .catch(function () {
            if (hint) { hint.textContent = "❌ பிழை ஏற்பட்டது. மீண்டும் முயற்சிக்கவும்."; hint.classList.add("show"); }
            btn.disabled = false; btn.textContent = label;
          });
      });
    }

  });
})();
