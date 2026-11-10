/* GodAlone account layer (shared by godalone.in, kadavulmattum.org, ekkhuda.org)
   Google sign-in (Firebase) · welcome with name · synced Quran settings · opt-in member list.
   Anonymous visitors see only a small "Sign in" button; nothing is stored unless they sign in. */
(function () {
  "use strict";
  if (window.GAAcct) return;

  var H = location.hostname.replace(/^www\./, "");
  var LANG = H === "kadavulmattum.org" ? "ta" : (H === "ekkhuda.org" ? "hi" : "en");
  var QURAN = LANG === "ta" ? "https://kadavulmattum.org/quran/" : "https://godalone.in/quran/";
  var ON_QURAN_APP = location.pathname.indexOf("/quran") === 0 && !!document.getElementById("root");
  var CFG = {
    apiKey: "AIzaSyAIvmDEiHvbxsyqIqvPnGg08aik1ra4yIw",
    authDomain: "bayyinah-c110a.firebaseapp.com",
    projectId: "bayyinah-c110a",
    storageBucket: "bayyinah-c110a.firebasestorage.app",
    messagingSenderId: "831184810834",
    appId: "1:831184810834:web:b134bfb3ef6014e9ebc08b"
  };
  var CDN = "https://www.gstatic.com/firebasejs/10.14.1/";
  var PREF_KEYS = ["quranTheme", "quranLangs", "quranFontSize", "quranPalette3", "quranMode", "quranDictLang", "quranQuizLang", "quranReadingPlan"];
  var LS = window.localStorage;

  var T = {
    en: {
      signin: "Sign in with Google", short: "Sign in", hello: "Assalamu alaikum", acct: "My account", out: "Sign out",
      benefit: "Keep your Quran bookmarks, reading place and settings with you on all our websites.",
      privacy: "Your Google name and email are used only to personalise your experience.",
      join: "Add me to the community list (name and email) to receive updates",
      joinNote: "Optional. You can turn this off at any time.",
      bm: "My Quran bookmarks", err: "Sign-in could not be completed. Please try again.",
      unauth: "Sign-in is not yet enabled on this website. Please try again later.", wait: "Please wait…",
      stk: "🔥 {n} days in a row", stk1: "🔥 1 day in a row",
      qz: "Quizzes: {c} taken · last {l} · best {b}",
      privLink: "Privacy policy", saveErr: "Could not save your choice. Please try again later."
    },
    ta: {
      signin: "Google மூலம் உள்நுழையவும்", short: "உள்நுழை", hello: "அஸ்ஸலாமு அலைக்கும்", acct: "என் கணக்கு", out: "வெளியேறு",
      benefit: "உங்கள் குர்ஆன் புக்மார்க்குகள், வாசிப்பு இடம் மற்றும் அமைப்புகளை எங்கள் அனைத்து இணையதளங்களிலும் பயன்படுத்தலாம்.",
      privacy: "உங்கள் Google பெயர் மற்றும் மின்னஞ்சல் உங்கள் அனுபவத்தைத் தனிப்பயனாக்க மட்டுமே பயன்படுத்தப்படும்.",
      join: "புதுப்பிப்புகளைப் பெற என்னை சமூகப் பட்டியலில் (பெயர், மின்னஞ்சல்) சேர்க்கவும்",
      joinNote: "விருப்பத்திற்குரியது. எப்போது வேண்டுமானாலும் நிறுத்தலாம்.",
      bm: "என் குர்ஆன் புக்மார்க்குகள்", err: "உள்நுழைவை முடிக்க இயலவில்லை. மீண்டும் முயலவும்.",
      unauth: "இந்த இணையதளத்தில் உள்நுழைவு இன்னும் இயக்கப்படவில்லை. பின்னர் முயலவும்.", wait: "காத்திருக்கவும்…",
      stk: "🔥 தொடர்ந்து {n} நாட்கள்", stk1: "🔥 தொடர்ந்து 1 நாள்",
      qz: "வினாடி வினா: {c} முறை · கடைசி {l} · சிறந்தது {b}",
      privLink: "தனியுரிமைக் கொள்கை", saveErr: "உங்கள் தேர்வைச் சேமிக்க இயலவில்லை. பின்னர் முயலவும்."
    },
    hi: {
      signin: "Google से साइन इन करें", short: "साइन इन", hello: "अस्सलामु अलैकुम", acct: "मेरा खाता", out: "साइन आउट",
      benefit: "अपने क़ुरआन बुकमार्क, पढ़ने की जगह और सेटिंग हमारी सभी वेबसाइटों पर साथ रखें।",
      privacy: "आपका Google नाम और ईमेल केवल आपके अनुभव को निजी बनाने के लिए इस्तेमाल होगा।",
      join: "अपडेट पाने के लिए मुझे कम्युनिटी सूची (नाम और ईमेल) में जोड़ें",
      joinNote: "वैकल्पिक। आप कभी भी इसे बंद कर सकते हैं।",
      bm: "मेरे क़ुरआन बुकमार्क", err: "साइन इन पूरा नहीं हो सका। कृपया फिर से कोशिश करें।",
      unauth: "इस वेबसाइट पर साइन इन अभी चालू नहीं है। कृपया बाद में कोशिश करें।", wait: "कृपया प्रतीक्षा करें…",
      stk: "🔥 लगातार {n} दिन", stk1: "🔥 लगातार 1 दिन",
      qz: "क्विज़: {c} बार · आख़िरी {l} · सबसे अच्छा {b}",
      privLink: "गोपनीयता नीति", saveErr: "आपका चुनाव सहेजा नहीं जा सका। कृपया बाद में कोशिश करें।"
    }
  };
  var L = T[LANG];

  var st = { user: null, db: null, ref: null, btn: null, panel: null, consent: false, ready: false };

  function el(tag, cls, txt) {
    var e = document.createElement(tag);
    if (cls) e.className = cls;
    if (txt != null) e.textContent = txt;
    return e;
  }
  function firstName(u) {
    var n = (u && (u.displayName || u.n)) || "";
    var f = String(n).trim().split(/\s+/)[0] || "";
    if (f.length > 1 && f === f.toUpperCase() && f !== f.toLowerCase()) f = f.charAt(0) + f.slice(1).toLowerCase();
    return f;
  }
  function noop() {}

  /* ---------- styles ---------- */
  function css() {
    var s = document.createElement("style");
    s.textContent =
      ".gaa-btn{position:relative;display:inline-flex;align-items:center;justify-content:center;overflow:hidden}" +
      ".gaa-btn svg{width:19px;height:19px}" +
      ".gaa-av{width:28px;height:28px;border-radius:50%;object-fit:cover;display:block;border:1.5px solid #d4af37}" +
      ".gaa-ini{width:28px;height:28px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:#d4af37;color:#0b1730;font:700 14px/1 Inter,system-ui,sans-serif}" +
      ".gaa-panel{position:fixed;z-index:100000;width:min(330px,calc(100vw - 24px));box-sizing:border-box;padding:16px;border-radius:16px;" +
      "background:#0f1d3a;color:#f3ead2;border:1px solid rgba(212,175,55,.45);box-shadow:0 18px 50px rgba(0,0,0,.45);font:400 14px/1.5 Inter,system-ui,sans-serif;display:none}" +
      "html.theme-day .gaa-panel{background:#fffaf0;color:#2b2416;border-color:rgba(160,120,20,.4);box-shadow:0 18px 50px rgba(60,40,0,.25)}" +
      ".gaa-panel.open{display:block}" +
      ".gaa-row{display:flex;align-items:center;gap:12px}" +
      ".gaa-hi{font-weight:700;font-size:16px;line-height:1.3;margin:0}" +
      ".gaa-sub{opacity:.75;font-size:12.5px;word-break:break-all}" +
      ".gaa-p{margin:10px 0 0;font-size:13px;opacity:.9}" +
      ".gaa-note{font-size:12px;opacity:.7;margin:6px 0 0}" +
      ".gaa-big{width:56px;height:56px;border-radius:50%}" +
      ".gaa-g{display:flex;align-items:center;justify-content:center;gap:10px;width:100%;margin-top:14px;padding:11px 14px;border-radius:12px;border:0;cursor:pointer;" +
      "background:#fff;color:#1f1f1f;font:600 14.5px/1 Inter,system-ui,sans-serif;box-shadow:0 1px 3px rgba(0,0,0,.3)}" +
      ".gaa-g[disabled]{opacity:.6;cursor:wait}" +
      ".gaa-chk{display:flex;gap:10px;align-items:flex-start;margin-top:14px;padding-top:12px;border-top:1px solid rgba(212,175,55,.25);cursor:pointer}" +
      ".gaa-chk input{margin-top:3px;width:17px;height:17px;accent-color:#d4af37;flex:none}" +
      ".gaa-link{display:block;margin-top:12px;color:inherit;text-decoration:underline;text-underline-offset:3px;font-weight:600}" +
      ".gaa-out{margin-top:14px;width:100%;padding:10px;border-radius:12px;border:1px solid rgba(212,175,55,.5);background:transparent;color:inherit;cursor:pointer;font:600 14px/1 Inter,system-ui,sans-serif}" +
      ".gaa-msg{margin-top:10px;font-size:12.5px;color:#ff9c8a}" +
      "html.theme-day .gaa-msg{color:#b3261e}" +
      ".gaa-toast{position:fixed;left:50%;bottom:84px;transform:translateX(-50%);z-index:100001;max-width:calc(100vw - 32px);padding:12px 20px;border-radius:999px;" +
      "background:#0f1d3a;color:#f3ead2;border:1px solid rgba(212,175,55,.55);box-shadow:0 10px 30px rgba(0,0,0,.4);font:600 14.5px/1.3 Inter,system-ui,sans-serif;opacity:0;transition:opacity .35s}" +
      "html.theme-day .gaa-toast{background:#fffaf0;color:#2b2416}" +
      ".gaa-toast.show{opacity:1}" +
      "@media(max-width:430px){.gh-right{gap:4px!important}.gh-right .ic,.gh-right #ghLang,.gh-right #ghThemeBtn{width:32px!important;height:32px!important}.gaa-av,.gaa-ini{width:24px;height:24px;font-size:12px}.gaa-btn svg{width:17px;height:17px}}";
    document.head.appendChild(s);
  }

  var ICON_USER = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><circle cx="12" cy="8" r="4"></circle><path d="M4 21c0-4.4 3.6-7 8-7s8 2.6 8 7"></path></svg>';
  var ICON_G = '<svg width="18" height="18" viewBox="0 0 48 48" aria-hidden="true"><path fill="#EA4335" d="M24 9.5c3.5 0 6.6 1.2 9.1 3.6l6.8-6.8C35.8 2.4 30.3 0 24 0 14.6 0 6.5 5.4 2.6 13.2l7.9 6.1C12.4 13.6 17.7 9.5 24 9.5z"/><path fill="#4285F4" d="M46.5 24.5c0-1.6-.1-3.1-.4-4.5H24v9h12.7c-.6 3-2.3 5.5-4.8 7.2l7.5 5.8c4.4-4.1 7.1-10.1 7.1-17.5z"/><path fill="#FBBC05" d="M10.5 28.7c-.5-1.5-.8-3-.8-4.7s.3-3.2.8-4.7l-7.9-6.1C.9 16.4 0 20.1 0 24s.9 7.6 2.6 10.8l7.9-6.1z"/><path fill="#34A853" d="M24 48c6.5 0 11.9-2.1 15.9-5.8l-7.5-5.8c-2.1 1.4-4.9 2.3-8.4 2.3-6.3 0-11.6-4.1-13.5-9.8l-7.9 6.1C6.5 42.6 14.6 48 24 48z"/></svg>';

  /* ---------- Firebase loading (only what is missing) ---------- */
  function loadScript(src) {
    return new Promise(function (res, rej) {
      var s = document.createElement("script");
      s.src = src; s.onload = res; s.onerror = rej;
      document.head.appendChild(s);
    });
  }
  function sdkReady() { return window.firebase && window.firebase.auth && window.firebase.apps !== undefined; }
  function loadSDK() {
    return new Promise(function (res) {
      var tries = 0;
      (function wait() {
        if (sdkReady()) return res(true);
        var tagged = document.querySelector('script[src*="firebase-app-compat"]');
        if (!tagged && tries > 6) {
          loadScript(CDN + "firebase-app-compat.js").then(function () { return loadScript(CDN + "firebase-auth-compat.js"); })
            .then(function () { res(sdkReady()); }, function () { res(false); });
          return;
        }
        if (tries++ > 80) return res(false);
        setTimeout(wait, 250);
      })();
    });
  }
  function fsReady() {
    if (window.firebase && window.firebase.firestore) return Promise.resolve(true);
    return loadScript(CDN + "firebase-firestore-compat.js").then(function () { return !!(window.firebase && window.firebase.firestore); }, function () { return false; });
  }
  function fbApp() {
    return window.firebase.apps.length ? window.firebase.app() : window.firebase.initializeApp(CFG);
  }

  /* ---------- UI ---------- */
  function avatar(user, big) {
    var wrap, photo = user && (user.photoURL || user.p);
    var nm = firstName(user);
    if (photo) {
      wrap = el("img", big ? "gaa-av gaa-big" : "gaa-av");
      wrap.src = photo; wrap.alt = ""; wrap.referrerPolicy = "no-referrer";
      wrap.onerror = function () { var i = el("span", big ? "gaa-ini gaa-big" : "gaa-ini", (nm || "?").charAt(0).toUpperCase()); if (wrap.parentNode) wrap.parentNode.replaceChild(i, wrap); };
    } else {
      wrap = el("span", big ? "gaa-ini gaa-big" : "gaa-ini", (nm || "?").charAt(0).toUpperCase());
    }
    return wrap;
  }

  function mountButton() {
    var anchor = document.getElementById("ghThemeBtn");
    var b = el("button", "ic gaa-btn");
    b.type = "button"; b.id = "gaaBtn";
    b.setAttribute("aria-haspopup", "dialog"); b.setAttribute("aria-expanded", "false");
    if (anchor && anchor.parentNode) anchor.parentNode.insertBefore(b, anchor);
    else { b.style.cssText = "position:fixed;top:12px;right:12px;z-index:99999;width:40px;height:40px;border-radius:50%;border:1px solid #d4af37;background:#0f1d3a;color:#f3ead2"; document.body.appendChild(b); }
    b.addEventListener("click", function (e) { e.stopPropagation(); togglePanel(); });
    var p = el("div", "gaa-panel"); p.setAttribute("role", "dialog"); p.setAttribute("aria-label", L.acct);
    p.addEventListener("click", function (e) { e.stopPropagation(); });
    document.body.appendChild(p);
    document.addEventListener("click", closePanel);
    document.addEventListener("keydown", function (e) { if (e.key === "Escape") closePanel(); });
    window.addEventListener("resize", placePanel);
    st.btn = b; st.panel = p;
  }
  function placePanel() {
    if (!st.panel || !st.btn) return;
    var r = st.btn.getBoundingClientRect();
    var w = Math.min(330, window.innerWidth - 24);
    var left = Math.max(12, Math.min(window.innerWidth - w - 12, r.right - w));
    st.panel.style.top = Math.round(r.bottom + 10) + "px";
    st.panel.style.left = left + "px";
  }
  function togglePanel() { if (st.panel.classList.contains("open")) closePanel(); else openPanel(); }
  function openPanel() {
    render();
    placePanel();
    st.panel.classList.add("open"); st.btn.setAttribute("aria-expanded", "true");
    ensureSDK();
  }
  function closePanel() {
    if (!st.panel) return;
    st.panel.classList.remove("open"); st.btn.setAttribute("aria-expanded", "false");
  }

  function paintButton() {
    var b = st.btn; if (!b) return;
    b.textContent = "";
    var u = st.user || hint();
    if (u) { b.appendChild(avatar(u)); b.setAttribute("aria-label", L.acct + " — " + firstName(u)); b.title = L.acct; }
    else { b.innerHTML = ICON_USER; b.setAttribute("aria-label", L.short); b.title = L.short; }
  }

  function render(msg) {
    var p = st.panel; if (!p) return;
    p.textContent = "";
    var u = st.user;
    if (u) {
      var top = el("div", "gaa-row");
      top.appendChild(avatar(u, true));
      var tx = el("div");
      tx.appendChild(el("p", "gaa-hi", L.hello + ", " + (firstName(u) || "")));
      tx.appendChild(el("div", "gaa-sub", u.email || ""));
      top.appendChild(tx); p.appendChild(top);
      var lab = el("label", "gaa-chk");
      var cb = el("input"); cb.type = "checkbox"; cb.checked = !!st.consent;
      cb.addEventListener("change", function () { setConsent(cb.checked); });
      var sp = el("span"); sp.appendChild(document.createTextNode(L.join));
      var nt = el("div", "gaa-note", L.joinNote); sp.appendChild(nt);
      lab.appendChild(cb); lab.appendChild(sp); p.appendChild(lab);
      var pl = progressLines();
      if (pl.length) { var pb = el("div", "gaa-note"); pb.style.margin = "4px 0 8px"; pb.style.lineHeight = "1.7"; pl.forEach(function (t) { pb.appendChild(el("div", null, t)); }); p.appendChild(pb); }
      var a = el("a", "gaa-link", L.bm + " →"); a.href = QURAN; p.appendChild(a);
      var ob = el("button", "gaa-out", L.out); ob.type = "button";
      ob.addEventListener("click", function () { if (sdkReady()) firebase.auth().signOut().catch(noop); closePanel(); });
      p.appendChild(ob);
    } else {
      p.appendChild(el("p", "gaa-hi", L.short));
      p.appendChild(el("p", "gaa-p", L.benefit));
      var g = el("button", "gaa-g"); g.type = "button";
      g.innerHTML = ICON_G; var gl = el("span", null, L.signin); g.appendChild(gl);
      if (!sdkReady()) { g.disabled = true; gl.textContent = L.wait; }
      g.addEventListener("click", signIn);
      p.appendChild(g);
      p.appendChild(el("p", "gaa-note", L.privacy));
      var pl = el("a", "gaa-link", L.privLink); pl.href = "/privacy-policy/"; pl.style.fontWeight = "500"; pl.style.fontSize = "12.5px"; p.appendChild(pl);
    }
    if (msg) p.appendChild(el("div", "gaa-msg", msg));
  }

  function toast(text) {
    var t = el("div", "gaa-toast", text); t.setAttribute("role", "status");
    document.body.appendChild(t);
    setTimeout(function () { t.classList.add("show"); }, 30);
    setTimeout(function () { t.classList.remove("show"); }, 4200);
    setTimeout(function () { if (t.parentNode) t.parentNode.removeChild(t); }, 4800);
  }

  /* ---------- hint (instant UI before the SDK finishes loading) ---------- */
  function hint() { try { return JSON.parse(LS.getItem("gaAcct") || "null"); } catch (e) { return null; } }
  function setHint(u) {
    try {
      if (u) LS.setItem("gaAcct", JSON.stringify({ n: u.displayName || "", p: u.photoURL || "" }));
      else LS.removeItem("gaAcct");
    } catch (e) { }
  }

  /* ---------- auth ---------- */
  function signIn() {
    if (!sdkReady()) return;
    fbApp();
    var prov = new firebase.auth.GoogleAuthProvider();
    firebase.auth().signInWithPopup(prov).catch(function (e) {
      var c = e && e.code;
      if (c === "auth/popup-closed-by-user" || c === "auth/cancelled-popup-request") return;
      render(c === "auth/unauthorized-domain" ? L.unauth : L.err);
    });
  }

  function ensureSDK() {
    if (st.ready) return Promise.resolve(true);
    if (st.loading) return st.loading;
    st.loading = loadSDK().then(function (ok) {
      if (!ok) { st.loading = null; return false; }
      st.ready = true;
      fbApp();
      firebase.auth().onAuthStateChanged(onUser);
      if (st.panel && st.panel.classList.contains("open")) render();
      return true;
    });
    return st.loading;
  }

  function onUser(u) {
    st.user = u || null;
    setHint(u);
    paintButton();
    if (st.panel && st.panel.classList.contains("open")) render();
    if (!u) { st.ref = null; st.consent = false; return; }
    try {
      if (!sessionStorage.getItem("gaWelcomed")) {
        sessionStorage.setItem("gaWelcomed", "1");
        if (!ON_QURAN_APP) toast(L.hello + ", " + (firstName(u) || "") + " ✦");
      }
    } catch (e) { }
    fsReady().then(function (ok) {
      if (!ok || !st.user || st.user.uid !== u.uid) return;
      st.db = firebase.firestore();
      st.ref = st.db.collection("users").doc(u.uid);
      // Read the saved account data from the server FIRST. If we write first, the SDK answers the read
      // with only the fields just written, so saved settings / place would look missing.
      st.ref.get({ source: "server" }).then(function (d) {
        var data = d && d.exists ? d.data() : {};
        st.consent = !!(data && data.consent && data.consent.community);
        if (st.panel && st.panel.classList.contains("open")) render();
        if (ON_QURAN_APP) startPrefs(data);
        startPlace(data);
        startProgress(data);
      }).catch(noop).then(function () {
        if (!st.ref || !st.user || st.user.uid !== u.uid) return;
        var ts = firebase.firestore.FieldValue.serverTimestamp();
        st.ref.set({
          profile: { name: u.displayName || "", email: u.email || "", photo: u.photoURL || "" },
          lang: LANG,
          sites: firebase.firestore.FieldValue.arrayUnion(H),
          lastSeen: ts
        }, { merge: true }).catch(noop);
      });
    });
  }

  /* ---------- opt-in member list ---------- */
  function setConsent(on) {
    st.consent = !!on;
    var u = st.user;
    if (!u || !st.db || !st.ref) { st.consent = !on; render(L.saveErr); return; }
    var ts = firebase.firestore.FieldValue.serverTimestamp();
    var m = st.db.collection("members").doc(u.uid);
    var p = on
      ? m.set({ name: u.displayName || "", email: u.email || "", lang: LANG, site: H, consentAt: ts, updatedAt: ts }, { merge: true })
      : m.delete();
    p.then(function () { return st.ref.set({ consent: { community: !!on, at: ts } }, { merge: true }); })
      .catch(function () { st.consent = !on; render(L.saveErr); });
  }

  /* ---------- Quran settings sync (Quran app pages only) ---------- */
  var lastSnap = "";
  function snap() {
    var o = {};
    PREF_KEYS.forEach(function (k) { var v = LS.getItem(k); if (v != null) o[k] = v; });
    return o;
  }
  function pushPrefs() {
    if (!st.ref) return;
    var o = snap(), s = JSON.stringify(o);
    if (s === lastSnap) return;
    lastSnap = s;
    var now = Date.now();
    LS.setItem("gaPrefsTs", String(now));
    st.ref.set({ prefs: o, prefsTs: now }, { merge: true }).catch(noop);
  }
  function startPrefs(data) {
    var remote = data && data.prefs, rts = (data && data.prefsTs) || 0, lts = parseInt(LS.getItem("gaPrefsTs") || "0", 10) || 0;
    if (remote && rts > lts) {
      var changed = false;
      PREF_KEYS.forEach(function (k) {
        if (remote[k] != null && LS.getItem(k) !== remote[k]) { LS.setItem(k, remote[k]); changed = true; }
      });
      LS.setItem("gaPrefsTs", String(rts));
      lastSnap = JSON.stringify(snap());
      try {
        if (changed && !sessionStorage.getItem("gaPrefsReload")) { sessionStorage.setItem("gaPrefsReload", "1"); location.reload(); return; }
      } catch (e) { }
    } else if (!remote) {
      lastSnap = ""; pushPrefs();
    } else {
      lastSnap = JSON.stringify(snap());
    }
    if (!st.prefTimer) st.prefTimer = setInterval(pushPrefs, 4000);
    window.addEventListener("pagehide", pushPrefs);
  }

  /* ---------- saved place for Utilities pages (prayer times, Qibla, Ramadan) ---------- */
  function isUtil() { return !!document.getElementById("gu-pcity"); }
  var PLACE_PAIRS = [["gu-op", "gu-pcity"], ["gu-oq", "gu-qcity"], ["gu-or", "gu-rcity"]];
  function byId(i) { return document.getElementById(i); }
  function readPlace() { try { return JSON.parse(LS.getItem("gaPlace") || "null"); } catch (e) { return null; } }
  function fillPlace() {
    var p = readPlace(); if (!isUtil() || !p || !p.c) return;
    PLACE_PAIRS.forEach(function (pr) { var e = byId(pr[1]); if (e && !e.value) e.value = p.c; });
    var m = byId("gu-pmeth");
    if (m && p.m != null) { for (var i = 0; i < m.options.length; i++) { if (m.options[i].value === String(p.m)) { m.value = String(p.m); break; } } }
  }
  function savePlace(c, m) {
    LS.setItem("gaPlace", JSON.stringify({ c: c, m: m, ts: Date.now() }));
  }
  function watchPlace() {
    if (!isUtil() || !window.MutationObserver) return;
    PLACE_PAIRS.forEach(function (pr) {
      var o = byId(pr[0]), inp = byId(pr[1]); if (!o || !inp) return;
      new MutationObserver(function () {
        if (!/(^|\s)ok(\s|$)/.test(o.className)) return;
        var c = inp.value.trim().slice(0, 80); if (!c) return;
        var m = byId("gu-pmeth");
        savePlace(c, m ? m.value : null);
      }).observe(o, { attributes: true, attributeFilter: ["class"], childList: true });
    });
  }
  /* The Utilities tools keep their place in "gaPlace"; the dedicated Salat / Ramadan pages keep theirs in
     "st_last_place_km" / "rc_last_place_km". All three follow the reader's Google account. */
  var PLACE_KEYS = ["gaPlace", "st_last_place_km", "rc_last_place_km"];
  var lastPlaces = "";
  function isPlacePage() { return !!(byId("gu-pcity") || byId("stPlace") || byId("rcPlace")); }
  function snapPlaces() {
    var o = {};
    PLACE_KEYS.forEach(function (k) { var v = LS.getItem(k); if (v != null && v !== "") o[k] = v; });
    return o;
  }
  function pushPlaces() {
    if (!st.ref || !isPlacePage()) return;
    var o = snapPlaces(), j = JSON.stringify(o);
    if (j === lastPlaces) return;
    lastPlaces = j;
    if (!Object.keys(o).length) return;
    var now = Date.now();
    LS.setItem("gaPlacesTs", String(now));
    st.ref.set({ places: o, placesTs: now }, { merge: true }).catch(noop);
  }
  function startPlace(data) {
    if (!isPlacePage()) return;
    var remote = data && data.places, rts = (data && data.placesTs) || 0;
    var lts = parseInt(LS.getItem("gaPlacesTs") || "0", 10) || 0;
    var changed = false, base = {};
    if (remote) {
      PLACE_KEYS.forEach(function (k) {
        if (remote[k] == null) return;
        var lv = LS.getItem(k);
        if ((lv == null || lv === "" || rts > lts) && lv !== remote[k]) { LS.setItem(k, remote[k]); changed = true; }
        base[k] = remote[k];
      });
      if (rts > lts) LS.setItem("gaPlacesTs", String(rts));
    }
    lastPlaces = Object.keys(base).length ? JSON.stringify(base) : "";
    fillPlace();
    try {
      if (changed && (byId("stPlace") || byId("rcPlace")) && !sessionStorage.getItem("gaPlaceReload")) {
        sessionStorage.setItem("gaPlaceReload", "1"); location.reload(); return;
      }
    } catch (e) { }
    if (!st.placeTimer) st.placeTimer = setInterval(pushPlaces, 4000);
    window.addEventListener("pagehide", pushPlaces);
  }

  /* ---------- reading streak + quiz scores (follow the Google account) ---------- */
  var STREAK_KEY = "quranReadStreak", QUIZ_KEY = "gaQuizHist";
  var lastProg = "";
  function dnum(d) { var m = /^(\d{4})-(\d{2})-(\d{2})$/.exec(d || ""); return m ? Math.round(Date.UTC(+m[1], +m[2] - 1, +m[3]) / 86400000) : null; }
  function dstr(n) { var d = new Date(n * 86400000); return d.getUTCFullYear() + "-" + ("0" + (d.getUTCMonth() + 1)).slice(-2) + "-" + ("0" + d.getUTCDate()).slice(-2); }
  function readStreak() { try { var o = JSON.parse(LS.getItem(STREAK_KEY) || "null"); return o && o.last && dnum(o.last) != null ? { count: o.count || 1, last: o.last } : null; } catch (e) { return null; } }
  /* Two devices each hold a run of consecutive reading days. If the runs touch or overlap they are one run;
     otherwise the more recent one wins. Nobody loses a streak by signing in on a new device. */
  function mergeStreak(a, b) {
    if (!a) return b; if (!b) return a;
    var la = dnum(a.last), lb = dnum(b.last), sa = la - (a.count - 1), sb = lb - (b.count - 1);
    var late = la >= lb ? a : b, early = late === a ? b : a;
    var sl = late === a ? sa : sb, se = late === a ? sb : sa, le = late === a ? lb : la;
    if (sl <= le + 1) { var last = Math.max(la, lb), start = Math.min(sa, sb); return { count: last - start + 1, last: dstr(last) }; }
    return { count: late.count, last: late.last };
  }
  function readQuiz() { try { var a = JSON.parse(LS.getItem(QUIZ_KEY) || "[]"); return Array.isArray(a) ? a : []; } catch (e) { return []; } }
  function mergeQuiz(a, b) {
    var seen = {}, out = [];
    (a || []).concat(b || []).forEach(function (r) { if (r && r.t && !seen[r.t]) { seen[r.t] = 1; out.push({ t: r.t, s: r.s | 0, n: r.n | 0 }); } });
    out.sort(function (x, y) { return x.t - y.t; });
    return out.slice(-50);
  }
  function fmt(t, o) { return t.replace(/\{(\w+)\}/g, function (m, k) { return o[k]; }); }
  function progressLines() {
    var out = [], s = readStreak(), q = readQuiz();
    if (s) {
      var loc = new Date(), t = dnum(loc.getFullYear() + "-" + ("0" + (loc.getMonth() + 1)).slice(-2) + "-" + ("0" + loc.getDate()).slice(-2));
      if (t - dnum(s.last) <= 1) out.push(s.count === 1 ? L.stk1 : fmt(L.stk, { n: s.count }));
    }
    if (q.length) {
      var best = 0, last = q[q.length - 1];
      q.forEach(function (r) { var pc = r.n ? r.s / r.n : 0; if (pc > best) best = pc; });
      var bb = q.filter(function (r) { return r.n && r.s / r.n === best; }).pop();
      out.push(fmt(L.qz, { c: q.length, l: last.s + "/" + last.n, b: bb ? bb.s + "/" + bb.n : "-" }));
    }
    return out;
  }
  function progSnap() { return JSON.stringify({ s: readStreak(), q: readQuiz() }); }
  function pushProgress() {
    if (!st.ref) return;
    var j = progSnap(); if (j === lastProg) return;
    lastProg = j;
    var o = JSON.parse(j), upd = {};
    if (o.s) upd.streak = o.s;
    if (o.q.length) upd.quiz = o.q;
    if (!Object.keys(upd).length) return;
    upd.progressTs = Date.now();
    st.ref.set(upd, { merge: true }).catch(noop);
  }
  function startProgress(data) {
    var rs = data && data.streak, rq = data && data.quiz, changed = false;
    if (rs && rs.last && dnum(rs.last) != null) {
      var ls = readStreak(), m = mergeStreak(ls, { count: rs.count || 1, last: rs.last });
      if (!ls || ls.count !== m.count || ls.last !== m.last) { LS.setItem(STREAK_KEY, JSON.stringify(m)); changed = true; }
    }
    if (rq && rq.length) {
      var lq = readQuiz(), mq = mergeQuiz(lq, rq);
      if (JSON.stringify(lq) !== JSON.stringify(mq)) LS.setItem(QUIZ_KEY, JSON.stringify(mq));
    }
    lastProg = "";
    pushProgress();
    if (!st.progTimer) st.progTimer = setInterval(pushProgress, 4000);
    window.addEventListener("pagehide", pushProgress);
    if (st.panel && st.panel.classList.contains("open")) render();
    try {
      if (changed && ON_QURAN_APP && !sessionStorage.getItem("gaStreakReload")) { sessionStorage.setItem("gaStreakReload", "1"); location.reload(); }
    } catch (e) { }
  }
  /* The quiz in the Quran app shows "<score> / <total>" on its result page. Record each finished quiz once. */
  function watchQuiz() {
    if (!ON_QURAN_APP || !window.MutationObserver) return;
    var busy = false;
    function scan() {
      busy = false;
      var els = document.querySelectorAll("div.font-display.text-3xl");
      for (var i = 0; i < els.length; i++) {
        var e = els[i]; if (e.getAttribute("data-ga-q")) continue;
        var m = /^(\d+)\s*\/\s*(\d+)$/.exec(e.textContent.trim());
        if (!m || !e.parentNode || String(e.parentNode.className).indexOf("pt-8") < 0) continue;
        e.setAttribute("data-ga-q", "1");
        var n = +m[2], sc = +m[1]; if (!n || sc > n) continue;
        var h = readQuiz(); h.push({ t: Date.now(), s: sc, n: n });
        try { LS.setItem(QUIZ_KEY, JSON.stringify(h.slice(-50))); } catch (x) { }
        if (st.ref) pushProgress();
      }
    }
    new MutationObserver(function () { if (!busy) { busy = true; setTimeout(scan, 250); } }).observe(document.body, { childList: true, subtree: true });
  }

  /* ---------- start ---------- */
  function start() {
    css();
    if (!ON_QURAN_APP) { mountButton(); paintButton(); }
    fillPlace(); watchPlace(); watchQuiz();
    var go = function () { ensureSDK(); };
    if (window.requestIdleCallback) requestIdleCallback(go, { timeout: 3500 }); else setTimeout(go, 1800);
  }
  window.GAAcct = {
    // test hook: GAAcct._fake({displayName:"Mohamed Ali",email:"x@y.z"}) renders the signed-in UI without logging in
    _fake: function (u) { st.user = u; paintButton(); render(); }
  };
  if (document.readyState === "loading") document.addEventListener("DOMContentLoaded", start); else start();
})();
