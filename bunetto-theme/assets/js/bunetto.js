/**
 * Bunetto Theme - Main JavaScript
 * Adapted from original static site for WordPress dynamic content
 * @package Bunetto
 */

/* ═══════════════════════════════════════
   COUNTDOWN
   ═══════════════════════════════════════ */
var T = new Date((typeof bunettoCountdownDate !== 'undefined') ? bunettoCountdownDate : '2026-05-12T00:00:00');
function tick() {
  var d = T - new Date();
  if (d <= 0) { revealSite(); return; }
  var pad = function(n) { return String(n).padStart(2, '0'); };
  var el;
  el = document.getElementById('cd-days');  if (el) el.textContent = pad(Math.floor(d / 86400000));
  el = document.getElementById('cd-hours'); if (el) el.textContent = pad(Math.floor(d % 86400000 / 3600000));
  el = document.getElementById('cd-mins');  if (el) el.textContent = pad(Math.floor(d % 3600000 / 60000));
  el = document.getElementById('cd-secs');  if (el) el.textContent = pad(Math.floor(d % 60000 / 1000));
}
if (document.getElementById('splash')) {
  tick(); setInterval(tick, 1000);
  document.body.style.overflow = 'hidden';
}

/* ═══════════════════════════════════════
   SNEAK PEEK / REVEAL
   ═══════════════════════════════════════ */
function revealSite() {
  var sp = document.getElementById('splash'), s = document.getElementById('site');
  if (!sp || !s) return;
  sp.classList.add('hiding');
  setTimeout(function() { sp.style.display = 'none'; s.classList.add('visible'); document.body.style.overflow = ''; }, 850);
}

/* ═══════════════════════════════════════
   SMOOTH SCROLL
   ═══════════════════════════════════════ */
function ss(e, id) {
  e.preventDefault();
  var el = document.getElementById(id);
  if (el) el.scrollIntoView({ behavior: 'smooth', block: 'start' });
}

/* ═══════════════════════════════════════
   HERO SLIDER
   ═══════════════════════════════════════ */
var cur = 0, hTimer;
var slides = document.querySelectorAll('.slide');
var inds = document.querySelectorAll('.indicator');

function goSlide(n) {
  if (!slides.length) return;
  slides[cur].classList.remove('active');
  if (inds[cur]) inds[cur].classList.remove('active');
  cur = (n + slides.length) % slides.length;
  slides[cur].classList.add('active');
  if (inds[cur]) inds[cur].classList.add('active');
}
function changeSlide(d) {
  clearInterval(hTimer);
  goSlide(cur + d);
  hTimer = setInterval(function() { goSlide(cur + 1); }, 5000);
}
if (slides.length) {
  hTimer = setInterval(function() { goSlide(cur + 1); }, 5000);
}

/* ═══════════════════════════════════════
   CATEGORY TABS
   ═══════════════════════════════════════ */
function setTab(el) {
  document.querySelectorAll('.cat-tab').forEach(function(t) { t.classList.remove('active'); });
  el.classList.add('active');
}

window.addEventListener('scroll', function() {
  var tabs = document.querySelectorAll('.cat-tab');
  if (!tabs.length) return;
  var catSlugs = (typeof bunettoCatSlugs !== 'undefined') ? bunettoCatSlugs : [];
  var allIds = [];
  catSlugs.forEach(function(slug) { allIds.push('menu-' + slug); });
  allIds.push('menu-all');

  allIds.forEach(function(id, i) {
    var el = document.getElementById(id);
    if (!el) return;
    var r = el.getBoundingClientRect();
    if (r.top <= 160 && r.bottom > 160) {
      tabs.forEach(function(t) { t.classList.remove('active'); });
      if (tabs[i]) tabs[i].classList.add('active');
    }
  });
});

/* ═══════════════════════════════════════
   HORIZONTAL SLIDERS
   ═══════════════════════════════════════ */
var SL = {};

function initSlider(name, cardW, gap) {
  var track = document.getElementById(name + '-track');
  var dotsEl = document.getElementById(name + '-dots');
  if (!track || !dotsEl) return;
  var count = track.children.length;
  if (count === 0) return;
  SL[name] = { track: track, cur: 0, count: count, cardW: cardW, gap: gap };
  dotsEl.innerHTML = '';
  for (var i = 0; i < count; i++) {
    var btn = document.createElement('button');
    btn.className = 's-dot' + (i === 0 ? ' active' : '');
    btn.onclick = (function(idx) { return function() { gotoSlide(name, idx); }; })(i);
    dotsEl.appendChild(btn);
  }
  addDrag(name);
}

function gotoSlide(name, idx) {
  var s = SL[name]; if (!s) return;
  s.cur = Math.max(0, Math.min(idx, s.count - 1));
  s.track.style.transform = 'translateX(-' + (s.cur * (s.cardW + s.gap)) + 'px)';
  document.querySelectorAll('#' + name + '-dots .s-dot').forEach(function(d, i) {
    d.classList.toggle('active', i === s.cur);
  });
}

function ms(name, dir) {
  var s = SL[name]; if (s) gotoSlide(name, s.cur + dir);
}

function addDrag(name) {
  var el = document.getElementById(name + '-track');
  if (!el) return;
  var sx = 0, dragging = false;
  el.addEventListener('mousedown', function(e) { sx = e.clientX; dragging = true; });
  document.addEventListener('mouseup', function(e) {
    if (!dragging) return; dragging = false;
    var dx = sx - e.clientX;
    if (Math.abs(dx) > 40) ms(name, dx > 0 ? 1 : -1);
  });
  el.addEventListener('touchstart', function(e) { sx = e.touches[0].clientX; }, { passive: true });
  el.addEventListener('touchend', function(e) {
    var dx = sx - e.changedTouches[0].clientX;
    if (Math.abs(dx) > 40) ms(name, dx > 0 ? 1 : -1);
  });
}

window.addEventListener('load', function() {
  // Init signature slider
  initSlider('sig', 310, 20);

  // Init category sliders dynamically
  var catSlugs = (typeof bunettoCatSlugs !== 'undefined') ? bunettoCatSlugs : [];
  catSlugs.forEach(function(slug) {
    initSlider(slug, 258, 20);
  });

  // Init "all" slider
  initSlider('all', 258, 20);
});

/* ═══════════════════════════════════════
   MODAL — Dynamic Add-ons
   ═══════════════════════════════════════ */
var CP = null, MQ = 1, EX = {};

function openModal(p) {
  // p can be a string (from data attribute) or object
  if (typeof p === 'string') {
    try { p = JSON.parse(p); } catch(e) { return; }
  }
  CP = p;
  MQ = 1;
  EX = {};

  document.getElementById('modal-img').src = p.img || '';
  document.getElementById('modal-title').textContent = p.name || '';
  document.getElementById('modal-price').textContent = 'Rs. ' + (p.price || 0).toLocaleString();
  document.getElementById('modal-qty').textContent = '1';

  // Render add-ons dynamically
  var extrasContainer = document.getElementById('modal-extras');
  extrasContainer.innerHTML = '';

  var addons = p.addons || [];
  addons.forEach(function(addon, i) {
    var key = 'addon_' + i;
    EX[key] = 0;
    var row = document.createElement('div');
    row.className = 'extra-row';
    row.innerHTML = '<span class="extra-name">' + escHtml(addon.name) + '</span>' +
      '<div class="extra-right"><span class="extra-price">+Rs. ' + addon.price + '</span>' +
      '<div class="qty-ctrl"><button class="qty-btn" onclick="chE(\'' + key + '\',-1)">−</button>' +
      '<span class="qty-num" id="extra-' + key + '">0</span>' +
      '<button class="qty-btn" onclick="chE(\'' + key + '\',1)">+</button></div></div>';
    extrasContainer.appendChild(row);
  });

  updMT();
  document.getElementById('modal-backdrop').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeModal() {
  document.getElementById('modal-backdrop').classList.remove('open');
  document.body.style.overflow = '';
}

function chE(key, d) {
  EX[key] = Math.max(0, (EX[key] || 0) + d);
  var el = document.getElementById('extra-' + key);
  if (el) el.textContent = EX[key];
  updMT();
}

function chQ(d) {
  MQ = Math.max(1, MQ + d);
  document.getElementById('modal-qty').textContent = MQ;
  updMT();
}

function updMT() {
  if (!CP) return;
  var extraTotal = 0;
  var addons = CP.addons || [];
  addons.forEach(function(addon, i) {
    extraTotal += (EX['addon_' + i] || 0) * addon.price;
  });
  var tot = (CP.price + extraTotal) * MQ;
  document.getElementById('modal-total').textContent = 'Rs. ' + tot.toLocaleString();
}

function escHtml(str) {
  var div = document.createElement('div');
  div.textContent = str;
  return div.innerHTML;
}

/* ═══════════════════════════════════════
   CART — Dynamic WhatsApp Number
   ═══════════════════════════════════════ */
var cart = [], OT = 'pickup';

function addToCart() {
  if (!CP) return;
  var el = [];
  var extraTotal = 0;
  var addons = CP.addons || [];
  addons.forEach(function(addon, i) {
    var qty = EX['addon_' + i] || 0;
    if (qty > 0) {
      el.push(addon.name + ' x' + qty);
      extraTotal += qty * addon.price;
    }
  });
  cart.push({ name: CP.name, img: CP.img, up: CP.price + extraTotal, qty: MQ, extras: el });
  closeModal(); renderCart(); updBadge(); setTimeout(openCart, 220);
}

function openCart() {
  document.getElementById('cart-panel').classList.add('open');
  document.body.style.overflow = 'hidden';
}

function closeCart() {
  document.getElementById('cart-panel').classList.remove('open');
  document.body.style.overflow = '';
}

function setOT(t) {
  OT = t;
  document.getElementById('opt-pickup').classList.toggle('active', t === 'pickup');
  document.getElementById('opt-delivery').classList.toggle('active', t === 'delivery');
  renderCart();
}

function removeItem(i) {
  cart.splice(i, 1); renderCart(); updBadge();
}

function renderCart() {
  var con = document.getElementById('cart-items');
  var emp = document.getElementById('cart-empty');
  con.querySelectorAll('.cart-item').forEach(function(e) { e.remove(); });

  if (!cart.length) {
    emp.style.display = 'block';
    document.getElementById('cart-total').textContent = 'Rs. 0';
    document.getElementById('delivery-fee').textContent = 'Rs. 0';
    document.getElementById('wa-btn').href = '#';
    return;
  }
  emp.style.display = 'none';
  var sub = 0;

  cart.forEach(function(item, i) {
    var t = item.up * item.qty; sub += t;
    var div = document.createElement('div');
    div.className = 'cart-item';
    div.innerHTML = '<img class="cart-item-img" src="' + item.img + '" alt="">' +
      '<div class="cart-item-info"><div class="cart-item-name">' + escHtml(item.name) + ' &times;' + item.qty + '</div>' +
      (item.extras.length ? '<div class="cart-item-extras">' + escHtml(item.extras.join(', ')) + '</div>' : '') +
      '<div class="cart-item-line"><span class="cart-item-price">Rs. ' + t.toLocaleString() + '</span>' +
      '<button class="cart-item-remove" onclick="removeItem(' + i + ')">Remove</button></div></div>';
    con.appendChild(div);
  });

  var fee = OT === 'delivery' ? 150 : 0, total = sub + fee;
  document.getElementById('delivery-fee').textContent = 'Rs. ' + fee.toLocaleString();
  document.getElementById('cart-total').textContent = 'Rs. ' + total.toLocaleString();

  var msg = '*New Order — Bunetto*\n\n';
  cart.forEach(function(item) {
    msg += '• ' + item.name + ' x' + item.qty + ' — Rs. ' + (item.up * item.qty).toLocaleString();
    if (item.extras.length) msg += ' (' + item.extras.join(', ') + ')';
    msg += '\n';
  });
  msg += '\n*Order Type:* ' + (OT === 'delivery' ? 'Delivery' : 'Pickup') + '\n';
  if (fee) msg += '*Delivery Fee:* Rs. ' + fee + '\n';
  msg += '*Total:* Rs. ' + total.toLocaleString();

  // Use dynamic WhatsApp number from WordPress
  var waNumber = (typeof bunettoData !== 'undefined' && bunettoData.whatsappNumber) ? bunettoData.whatsappNumber : '923012343423';
  document.getElementById('wa-btn').href = 'https://wa.me/' + waNumber + '?text=' + encodeURIComponent(msg);
}

function updBadge() {
  document.getElementById('cart-count').textContent = cart.reduce(function(s, i) { return s + i.qty; }, 0);
}

document.addEventListener('keydown', function(e) {
  if (e.key === 'Escape') { closeModal(); closeCart(); }
});
