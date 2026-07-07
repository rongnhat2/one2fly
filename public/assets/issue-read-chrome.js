(function () {
  var toc = document.getElementById('reader-toc');
  var tocBackdrop = document.getElementById('reader-toc-backdrop');
  var thumbs = document.getElementById('reader-thumbs');
  var thumbsTrack = document.getElementById('reader-thumbs-track');
  var loading = document.getElementById('reader-loading');
  var errorEl = document.getElementById('reader-error');
  var emptyEl = document.getElementById('reader-empty');
  var stage = document.getElementById('reader-stage');
  var loadTimer = null;
  var thumbsBuilt = false;

  function show(el) { if (el) el.classList.remove('hidden'); }
  function hide(el) { if (el) el.classList.add('hidden'); }

  function setLoading(on) {
    if (!loading) return;
    if (on) { show(loading); hide(errorEl); }
    else hide(loading);
  }

  function setError(on) {
    if (!errorEl) return;
    if (on) { show(errorEl); hide(loading); }
    else hide(errorEl);
  }

  function openToc() {
    if (!toc) return;
    toc.classList.add('is-open');
    toc.setAttribute('aria-hidden', 'false');
    if (tocBackdrop) {
      tocBackdrop.classList.add('is-visible');
      tocBackdrop.setAttribute('aria-hidden', 'false');
    }
    document.body.classList.add('issue-reader-panel-open');
  }

  function closeToc() {
    if (!toc) return;
    toc.classList.remove('is-open');
    toc.setAttribute('aria-hidden', 'true');
    if (tocBackdrop) {
      tocBackdrop.classList.remove('is-visible');
      tocBackdrop.setAttribute('aria-hidden', 'true');
    }
    if (!thumbs || !thumbs.classList.contains('is-open')) {
      document.body.classList.remove('issue-reader-panel-open');
    }
  }

  function toggleThumbs() {
    if (!thumbs) return;
    thumbs.classList.toggle('is-open');
    var open = thumbs.classList.contains('is-open');
    thumbs.setAttribute('aria-hidden', open ? 'false' : 'true');
    if (open) document.body.classList.add('issue-reader-panel-open');
    else if (!toc || !toc.classList.contains('is-open')) document.body.classList.remove('issue-reader-panel-open');
  }

  function buildThumbs(total) {
    if (!thumbsTrack || thumbsBuilt || !total) return;
    thumbsBuilt = true;
    thumbsTrack.innerHTML = '';
    var max = Math.min(total, 40);
    for (var i = 1; i <= max; i++) {
      var btn = document.createElement('button');
      btn.type = 'button';
      btn.className = 'issue-reader-thumb';
      btn.setAttribute('data-page', String(i));
      btn.setAttribute('aria-label', 'Trang ' + i);
      btn.innerHTML = '<span class="issue-reader-thumb-num">' + i + '</span>';
      btn.addEventListener('click', function () {
        var p = parseInt(this.getAttribute('data-page'), 10);
        if (window.__one2flyReader) window.__one2flyReader.goToPage(p);
      });
      thumbsTrack.appendChild(btn);
    }
  }

  function updateThumbsActive(pageStr) {
    if (!thumbsTrack) return;
    var current = parseInt(String(pageStr || '1').split('-')[0], 10) || 1;
    thumbsTrack.querySelectorAll('.issue-reader-thumb').forEach(function (el) {
      var p = parseInt(el.getAttribute('data-page'), 10);
      el.classList.toggle('is-active', p === current);
    });
  }

  function syncMobileIndicator(detail) {
    var mobile = document.getElementById('page-indicator-mobile');
    var label = document.getElementById('page-indicator');
    if (mobile && label) mobile.textContent = label.textContent;
  }

  function toggleFullscreen() {
    var root = document.getElementById('issue-reader');
    if (!root) return;
    if (!document.fullscreenElement) {
      if (root.requestFullscreen) root.requestFullscreen();
    } else if (document.exitFullscreen) {
      document.exitFullscreen();
    }
  }

  function bindClick(id, fn) {
    var el = document.getElementById(id);
    if (el) el.addEventListener('click', fn);
  }

  bindClick('btn-toc-toggle', function () {
    if (toc && toc.classList.contains('is-open')) closeToc();
    else openToc();
  });
  bindClick('btn-toc-close', closeToc);
  if (tocBackdrop) tocBackdrop.addEventListener('click', closeToc);

  bindClick('btn-thumbs-toggle', toggleThumbs);
  bindClick('btn-fullscreen', toggleFullscreen);
  bindClick('btn-fullscreen-toolbar', toggleFullscreen);

  bindClick('btn-share', function () {
    var url = window.location.href;
    var title = document.querySelector('.issue-reader-header-center h1');
    var text = title ? title.textContent : 'one2FLY Magazine';
    if (navigator.share) {
      navigator.share({ title: text, url: url }).catch(function () {});
    } else if (navigator.clipboard) {
      navigator.clipboard.writeText(url);
    }
  });

  bindClick('btn-retry', function () { window.location.reload(); });

  bindClick('btn-info-toggle', function () {
    var sheet = document.getElementById('reader-info-mobile');
    if (sheet) {
      sheet.classList.add('is-open');
      sheet.setAttribute('aria-hidden', 'false');
      document.body.classList.add('issue-reader-panel-open');
    }
  });
  bindClick('btn-info-close', function () {
    var sheet = document.getElementById('reader-info-mobile');
    if (sheet) {
      sheet.classList.remove('is-open');
      sheet.setAttribute('aria-hidden', 'true');
      document.body.classList.remove('issue-reader-panel-open');
    }
  });

  document.querySelectorAll('[data-trigger]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var target = document.getElementById(btn.getAttribute('data-trigger'));
      if (target) target.click();
    });
  });

  document.querySelectorAll('.issue-reader-toc-item').forEach(function (item) {
    item.addEventListener('click', function () {
      var page = parseInt(item.getAttribute('data-goto-page'), 10);
      if (!isNaN(page) && window.__one2flyReader) {
        window.__one2flyReader.goToPage(page);
        closeToc();
      }
    });
  });

  document.addEventListener('flipbook:pagechange', function (e) {
    var d = e.detail || {};
    if (d.total) buildThumbs(d.total);
    updateThumbsActive(d.pageStr);
    syncMobileIndicator(d);
    document.querySelectorAll('#reader-mobile-bar [data-trigger="btn-prev"]').forEach(function (btn) {
      btn.disabled = !d.canPrev;
      btn.style.opacity = d.canPrev ? '1' : '0.35';
    });
    document.querySelectorAll('#reader-mobile-bar [data-trigger="btn-next"]').forEach(function (btn) {
      btn.disabled = !d.canNext;
      btn.style.opacity = d.canNext ? '1' : '0.35';
    });
  });

  document.addEventListener('flipbook:ready', function () {
    clearTimeout(loadTimer);
    setLoading(false);
    setError(false);
    var fb = window.__one2flyReader && window.__one2flyReader.getFlipbook();
    if (fb && fb.options && fb.options.numPages) {
      buildThumbs(fb.options.numPages);
    }
  });

  if (stage) {
    var pdfUrl = stage.dataset.pdfUrl;
    if (!pdfUrl) {
      setLoading(false);
      show(emptyEl);
    } else {
      setLoading(true);
      loadTimer = setTimeout(function () {
        var fb = window.__one2flyReader && window.__one2flyReader.getFlipbook();
        if (!fb || !fb.options || !fb.options.numPages) {
          setLoading(false);
          setError(true);
        }
      }, 18000);
    }
  }

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape') {
      closeToc();
      if (thumbs) {
        thumbs.classList.remove('is-open');
        thumbs.setAttribute('aria-hidden', 'true');
      }
      var sheet = document.getElementById('reader-info-mobile');
      if (sheet) sheet.classList.remove('is-open');
      document.body.classList.remove('issue-reader-panel-open');
    }
  });
})();
