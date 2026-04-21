/**
 * Wolfmotion Frontend JS
 */
(function() {
  'use strict';

  // Reveal on scroll
  function initReveal() {
    var els = document.querySelectorAll('.wm-reveal');
    if (!els.length) return;
    var io = new IntersectionObserver(function(entries) {
      entries.forEach(function(e) {
        if (e.isIntersecting) e.target.classList.add('wm-in');
      });
    }, { threshold: 0.12 });
    els.forEach(function(el) { io.observe(el); });
  }

  // FAQ accordion
  function initFAQ() {
    document.addEventListener('click', function(e) {
      var btn = e.target.closest('.wm-faq__q');
      if (!btn) return;
      var faq = btn.closest('.wm-faq');
      if (!faq) return;
      var wasOpen = faq.classList.contains('wm-open');
      // close all siblings
      var list = faq.closest('.wm-faq-list');
      if (list) {
        list.querySelectorAll('.wm-faq').forEach(function(f) { f.classList.remove('wm-open'); });
      }
      if (!wasOpen) faq.classList.add('wm-open');
    });
  }

  // Product pack picker
  function initProduct() {
    document.addEventListener('click', function(e) {
      var pack = e.target.closest('.wm-pack');
      if (!pack) return;
      var container = pack.closest('.wm-packs');
      if (!container) return;
      container.querySelectorAll('.wm-pack').forEach(function(p) { p.classList.remove('wm-selected'); });
      pack.classList.add('wm-selected');

      // Update price display
      var price = pack.getAttribute('data-price');
      var oldPrice = pack.getAttribute('data-old-price');
      var section = pack.closest('.wm-section');
      if (section && price) {
        var bigEl = section.querySelector('.wm-big');
        var oldEl = section.querySelector('.wm-old');
        var saveEl = section.querySelector('.wm-save');
        if (bigEl) bigEl.textContent = '$' + price;
        if (oldEl) oldEl.textContent = '$' + oldPrice;
        if (saveEl) saveEl.textContent = 'Save $' + (parseInt(oldPrice) - parseInt(price));
      }
    });

    // Color swatches
    document.addEventListener('click', function(e) {
      var swatch = e.target.closest('.wm-swatch');
      if (!swatch) return;
      var container = swatch.closest('.wm-swatches');
      if (!container) return;
      container.querySelectorAll('.wm-swatch').forEach(function(s) { s.classList.remove('wm-selected'); });
      swatch.classList.add('wm-selected');

      // Update color label
      var label = swatch.getAttribute('data-label');
      var section = swatch.closest('.wm-section');
      if (section && label) {
        var labelEl = section.querySelector('.wm-color-label-text');
        if (labelEl) labelEl.textContent = label;
      }
    });

    // Quantity stepper
    document.addEventListener('click', function(e) {
      var btn = e.target.closest('.wm-qty button');
      if (!btn) return;
      var qty = btn.closest('.wm-qty');
      if (!qty) return;
      var span = qty.querySelector('span');
      if (!span) return;
      var val = parseInt(span.textContent) || 1;
      if (btn.getAttribute('data-action') === 'dec') val = Math.max(1, val - 1);
      else val = Math.min(9, val + 1);
      span.textContent = val;
    });
  }

  // Setup step auto-advance
  function initSetup() {
    var steps = document.querySelectorAll('.wm-step');
    if (!steps.length) return;
    var current = 0;
    function activate(idx) {
      steps.forEach(function(s) { s.classList.remove('wm-active'); });
      if (steps[idx]) steps[idx].classList.add('wm-active');
    }
    activate(0);
    setInterval(function() {
      current = (current + 1) % steps.length;
      activate(current);
    }, 3000);
    steps.forEach(function(s, i) {
      s.addEventListener('mouseenter', function() {
        current = i;
        activate(i);
      });
    });
  }

  // Init all on DOM ready
  function init() {
    initReveal();
    initFAQ();
    initProduct();
    initSetup();
  }

  if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', init);
  } else {
    init();
  }
})();
