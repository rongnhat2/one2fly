(function () {
  var flipbook = null;
  var stage = document.getElementById('reader-stage');
  var ROOT = (stage && stage.dataset.flipbookRoot) || '/assets/vendor/real3d-flipbook-lite/';
  var PDF = (stage && stage.dataset.pdfUrl) || '/assets/nhung-cay-thuoc-va-vi-thuoc-viet-nam-vnras.pdf';

  function setContainerHeight(container) {
    var width = container.getBoundingClientRect().width;
    if (!width) return;
    container.style.height = (width < 768 ? width / 0.65 : width / 1.3) + 'px';
  }

  function sanitizePageInput(raw) {
    var cleaned = String(raw || '').replace(/[^\d-]/g, '');
    var parts = cleaned.split('-').filter(Boolean);
    if (!parts.length) return '';
    if (parts.length === 1) return parts[0];
    return parts[0] + ' - ' + parts[1];
  }

  function setNavDisabled(el, disabled) {
    if (el) el.disabled = disabled;
  }

  function updateUI() {
    if (!flipbook) return;
    var total = flipbook.options && flipbook.options.numPages;
    var pageStr = flipbook.currentPageValue;
    var input = document.getElementById('page-input');
    var label = document.getElementById('page-indicator');
    var canPrev = flipbook.Book && flipbook.Book.canFlipPrev();
    var canNext = flipbook.Book && flipbook.Book.canFlipNext();
    if (label) {
      if (!total) label.textContent = 'Đang tải…';
      else if (pageStr) label.textContent = 'Trang ' + pageStr + ' / ' + total;
      else label.textContent = 'Trang 1 / ' + total;
    }
    if (input && total) {
      input.disabled = false;
      if (document.activeElement !== input) input.value = sanitizePageInput(pageStr || '1');
    }
    setNavDisabled(document.getElementById('btn-prev'), !canPrev);
    setNavDisabled(document.getElementById('btn-next'), !canNext);
    setNavDisabled(document.getElementById('side-prev'), !canPrev);
    setNavDisabled(document.getElementById('side-next'), !canNext);
    setNavDisabled(document.getElementById('btn-first'), !canPrev);
    setNavDisabled(document.getElementById('btn-last'), !canNext);
    setNavDisabled(document.getElementById('btn-goto'), !total);

    var progress = document.getElementById('reader-progress-bar');
    if (progress && total) {
      var current = parseInt(String(pageStr || '1').split('-')[0], 10) || 1;
      progress.style.width = Math.min(100, (current / total) * 100) + '%';
    }
    document.dispatchEvent(new CustomEvent('flipbook:pagechange', {
      detail: { pageStr: pageStr, total: total, canPrev: canPrev, canNext: canNext }
    }));
  }

  function goToInputPage() {
    if (!flipbook || !flipbook.options.numPages) return;
    var input = document.getElementById('page-input');
    if (!input) return;
    var sanitized = sanitizePageInput(input.value);
    input.value = sanitized;
    var first = parseInt(String(sanitized).split('-')[0], 10);
    if (isNaN(first)) return;
    flipbook.goToPage(first);
  }

  function bindNav(id, fn) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', function (e) { e.preventDefault(); fn(); });
  }

  function init() {
    var container = document.getElementById('flipbook-container');
    if (!container || typeof FlipBook === 'undefined') return;
    setContainerHeight(container);
    flipbook = new FlipBook(container, {
      rootFolder: ROOT,
      viewMode: 'webgl',
      pdfUrl: PDF,
      assets: {
        preloader: ROOT + 'assets/images/preloader.jpg',
        spinner: ROOT + 'assets/images/spinner.gif',
        flipMp3: ROOT + 'assets/mp3/turnPage.mp3'
      }
    });
    flipbook.on('pdfinit', function () {
      setContainerHeight(container);
      if (flipbook.resize) flipbook.resize();
      updateUI();
      document.dispatchEvent(new CustomEvent('flipbook:ready'));
    });
    flipbook.on('pagechange', updateUI);
    flipbook.on('turnpagecomplete', updateUI);
    var ready = setInterval(function () {
      if (flipbook.Book) { clearInterval(ready); if (flipbook.updateCurrentPage) flipbook.updateCurrentPage(); updateUI(); }
    }, 200);
    bindNav('btn-prev', function () { flipbook.prevPage(); });
    bindNav('btn-next', function () { flipbook.nextPage(); });
    bindNav('side-prev', function () { flipbook.prevPage(); });
    bindNav('side-next', function () { flipbook.nextPage(); });
    bindNav('btn-first', function () { flipbook.firstPage(); });
    bindNav('btn-last', function () { flipbook.lastPage(); });
    bindNav('btn-zoom-in', function () { flipbook.zoomIn(); });
    bindNav('btn-zoom-out', function () { flipbook.zoomOut(); });
    bindNav('btn-goto', goToInputPage);
    var input = document.getElementById('page-input');
    if (input) {
      input.addEventListener('keydown', function (e) { if (e.key === 'Enter') { e.preventDefault(); goToInputPage(); } });
      input.addEventListener('input', function () { input.value = sanitizePageInput(input.value); });
    }
    document.addEventListener('keydown', function (e) {
      if (!flipbook || e.target.closest('#page-input')) return;
      if (e.key === 'ArrowLeft') flipbook.prevPage();
      if (e.key === 'ArrowRight') flipbook.nextPage();
      if (e.key === 'Home') flipbook.firstPage();
      if (e.key === 'End') flipbook.lastPage();
    });
    window.addEventListener('resize', function () {
      setContainerHeight(container);
      if (flipbook && flipbook.resize) flipbook.resize();
    });
  }

  if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', init);
  else init();

  window.__one2flyReader = {
    goToPage: function (n) { if (flipbook) flipbook.goToPage(n); },
    prevPage: function () { if (flipbook) flipbook.prevPage(); },
    nextPage: function () { if (flipbook) flipbook.nextPage(); },
    zoomIn: function () { if (flipbook) flipbook.zoomIn(); },
    zoomOut: function () { if (flipbook) flipbook.zoomOut(); },
    getFlipbook: function () { return flipbook; }
  };
})();
