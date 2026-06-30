(function () {
  var cats = ['Điểm đến', 'Văn hóa', 'Ẩm thực', 'Di sản', 'Nhiếp ảnh', 'Kiến trúc'];
  var titles = [
    'Nơi sương mù ở lại lâu nhất', 'Hội An, khi đèn lồng chưa sáng', 'Sa Pa ngoài mùa khách',
    'Một bữa cơm cung đình giản dị ở Huế', 'The Gardeners of Kyoto', 'Ruộng bậc thang mùa nước đổ',
    'Đêm trắng trên vịnh Lan Hạ', 'Những người giữ nghề chàm bên sông', 'Côn Đảo, đảo của thinh lặng',
    'Đà Lạt qua khung cửa quán cũ', 'Chợ phiên Bắc Hà lúc tinh mơ', 'Kiến trúc Pháp giữa lòng Hà Nội'
  ];
  var excerpts = [
    'Ba tuần trên cao nguyên đá, đi tìm thứ ánh sáng chậm rãi của miền núi.',
    'Khoảng thời gian phố cổ mà du khách không bao giờ nhìn thấy.',
    'Khi sương xuống và thị trấn trở về với chính mình.',
    'Sự tinh tế nằm ở những điều giản dị nhất trên mâm cơm.',
    'Bốn thế kỷ chăm một sườn đồi, và lời từ chối ghi chép lại.',
    'Khi cả thung lũng hóa thành tấm gương khổng lồ.'
  ];
  var authors = ['Lê Minh Anh', 'Trần Quốc Bảo', 'Phạm Thu Hà', 'Nguyễn Lan Hương', 'Marco Reyes', 'Đỗ Hải Yến'];

  var articleHref = document.querySelector('a[href*="article-detail"]');
  var articleUrl = articleHref ? articleHref.getAttribute('href') : 'pages/article-detail.html';

  function card(i) {
    var c = cats[i % cats.length], t = titles[i % titles.length], e = excerpts[i % excerpts.length], a = authors[i % authors.length];
    return '<a href="' + articleUrl + '" class="group cursor-pointer block">' +
      '<div class="imgwrap aspect-[3/4] mb-4"><img class="ph w-full h-full" src="https://picsum.photos/seed/pn-cat' + i + '/600/800" alt=""></div>' +
      '<p class="eyebrow text-clay mb-2">' + c + '</p>' +
      '<h3 class="font-display text-2xl leading-snug mb-2 group-hover:text-clay transition">' + t + '</h3>' +
      '<p class="text-muted text-sm mb-3">' + e + '</p>' +
      '<p class="meta">' + a + '</p></a>';
  }

  var cg = document.getElementById('cat-grid');
  if (cg) {
    var h = '';
    for (var i = 0; i < 9; i++) h += card(i);
    cg.innerHTML = h;
  }

  function sresult(i) {
    return '<a href="' + articleUrl + '" class="group cursor-pointer grid sm:grid-cols-[200px_1fr] gap-5 py-7 block">' +
      '<div class="imgwrap aspect-[4/3]"><img class="ph w-full h-full" src="https://picsum.photos/seed/pn-s' + i + '/400/300" alt=""></div>' +
      '<div><p class="eyebrow text-clay mb-2">' + cats[i % cats.length] + '</p>' +
      '<h3 class="font-display text-2xl mb-2 group-hover:text-clay transition">' + titles[i] + '</h3>' +
      '<p class="text-muted">' + excerpts[i % excerpts.length] + '</p></div></a>';
  }

  var sr = document.getElementById('search-results');
  if (sr) sr.innerHTML = sresult(0) + sresult(2) + sresult(5);

  var issEl = document.getElementById('issues-grid');
  if (issEl) {
    var months = ['Hè 2026', 'Xuân 2026', 'Đông 2025', 'Thu 2025', 'Hè 2025', 'Xuân 2025', 'Đông 2024', 'Thu 2024'];
    var names = ['Những vĩ độ lặng lẽ', 'Mùa của những con đường', 'Hơi thở phương Đông', 'Ánh sáng và muối', 'Di sản sống', 'Bản đồ của ký ức', 'Trên những đỉnh mù sương', 'Vị của chốn xa'];
    var hh = '';
    for (var k = 0; k < 8; k++) {
      hh += '<div class="group">' +
        '<div class="relative aspect-[3/4] overflow-hidden imgwrap shadow-[0_30px_60px_-30px_rgba(20,20,20,.4)]">' +
        '<img class="ph w-full h-full" src="https://picsum.photos/seed/pn-iss' + k + '/420/560" alt="">' +
        '<div class="absolute inset-0 p-4 flex flex-col justify-between text-ivory" style="background:linear-gradient(180deg,rgba(20,20,20,.1),rgba(20,20,20,.5))">' +
        '<div class="flex justify-between eyebrow"><span class="font-display tracking-widest">PN</span><span>Nº ' + (47 - k) + '</span></div>' +
        '<h4 class="font-display font-light text-xl leading-tight">' + names[k] + '</h4></div></div>' +
        '<p class="meta mt-3">' + months[k] + '</p>' +
        '<div class="flex gap-2 mt-2"><a href="' + articleUrl + '" class="eyebrow border border-ink px-3 py-1.5 hover:bg-navy hover:text-ivory transition">Đọc</a>' +
        '<button type="button" class="eyebrow border border-line px-3 py-1.5 hover:border-ink">PDF</button></div></div>';
    }
    issEl.innerHTML = hh;
  }

  var pt = document.getElementById('posts-tbody');
  if (pt) {
    var editorUrl = document.querySelector('a[href*="admin/editor"]');
    var editHref = editorUrl ? editorUrl.getAttribute('href') : 'editor.html';
    var rows = [
      ['Nơi sương mù ở lại lâu nhất', 'Điểm đến', 'pub', '14/06/26', '12.4k'],
      ['Hội An, khi đèn lồng chưa sáng', 'Di sản', 'pub', '11/06/26', '9.1k'],
      ['Một bữa cơm cung đình ở Huế', 'Ẩm thực', 'draft', '10/06/26', '—'],
      ['Sa Pa ngoài mùa khách', 'Điểm đến', 'pub', '08/06/26', '7.8k'],
      ['The Gardeners of Kyoto', 'Văn hóa', 'pub', '05/06/26', '5.2k'],
      ['Côn Đảo, đảo của thinh lặng', 'Điểm đến', 'draft', '03/06/26', '—'],
      ['Chợ phiên Bắc Hà lúc tinh mơ', 'Nhiếp ảnh', 'pub', '01/06/26', '6.6k']
    ];
    var ph = '';
    rows.forEach(function (r) {
      var badge = r[2] === 'pub'
        ? '<span class="text-[11px] bg-olive/15 text-olive px-2 py-1">Đã đăng</span>'
        : '<span class="text-[11px] bg-gold/20 text-clay px-2 py-1">Nháp</span>';
      ph += '<tr class="hover:bg-ivory/60">' +
        '<td class="px-6 py-4 font-medium">' + r[0] + '</td>' +
        '<td class="py-4 text-muted">' + r[1] + '</td>' +
        '<td class="py-4">' + badge + '</td>' +
        '<td class="py-4 meta">' + r[3] + '</td>' +
        '<td class="py-4 text-muted">' + r[4] + '</td>' +
        '<td class="py-4 pr-6 text-right whitespace-nowrap"><a href="' + editHref + '" class="text-clay hover:underline mr-3">Sửa</a><button type="button" class="text-muted hover:text-ink">Xóa</button></td></tr>';
    });
    pt.innerHTML = ph;
  }

  var mg = document.getElementById('media-grid');
  if (mg) {
    var mh = '';
    for (var m = 0; m < 15; m++) {
      mh += '<figure class="group bg-paper border border-line p-2">' +
        '<div class="imgwrap aspect-square mb-2"><img class="ph w-full h-full" src="https://picsum.photos/seed/pn-med' + m + '/300/300" alt=""></div>' +
        '<figcaption class="px-1 pb-1"><p class="text-xs truncate">anh-' + (1000 + m) + '.jpg</p>' +
        '<div class="flex gap-2 mt-1 opacity-0 group-hover:opacity-100 transition"><button type="button" class="text-[11px] text-clay hover:underline">Chèn</button><button type="button" class="text-[11px] text-muted hover:text-ink">Xóa</button></div></figcaption></figure>';
    }
    mg.innerHTML = mh;
  }

  var pubBurger = document.getElementById('pub-burger');
  if (pubBurger) {
    pubBurger.addEventListener('click', function () {
      var menu = document.getElementById('pub-menu');
      menu.classList.toggle('hidden');
      menu.classList.toggle('flex');
    });
  }

  var admBurger = document.getElementById('adm-burger');
  if (admBurger) {
    admBurger.addEventListener('click', function () {
      var sb = document.getElementById('admin-sidebar');
      sb.classList.toggle('hidden');
      sb.classList.toggle('block');
    });
  }

  var sBtn = document.getElementById('search-btn');
  var sIn = document.getElementById('search-input');
  function doSearch() {
    if (!sIn) return;
    var q = (sIn.value || '').trim();
    var empty = document.getElementById('search-empty');
    var res = document.getElementById('search-results');
    var cnt = document.getElementById('search-count');
    if (!empty || !res || !cnt) return;
    if (q === '') {
      empty.classList.remove('hidden');
      res.classList.add('hidden');
      cnt.textContent = 'Nhập từ khóa để bắt đầu tìm kiếm';
    } else {
      empty.classList.add('hidden');
      res.classList.remove('hidden');
      cnt.textContent = 'Tìm thấy 3 kết quả cho “' + q + '”';
    }
  }
  if (sBtn) {
    sBtn.addEventListener('click', doSearch);
    sIn.addEventListener('keydown', function (e) { if (e.key === 'Enter') doSearch(); });
  }

  function runReveal() {
    var els = document.querySelectorAll('.reveal');
    if (!('IntersectionObserver' in window)) {
      els.forEach(function (el) { el.classList.add('in'); });
      return;
    }
    var io = new IntersectionObserver(function (en) {
      en.forEach(function (x) {
        if (x.isIntersecting) {
          x.target.classList.add('in');
          io.unobserve(x.target);
        }
      });
    }, { threshold: 0.12, rootMargin: '0px 0px -8% 0px' });
    els.forEach(function (el) { io.observe(el); });
  }

  runReveal();
})();
