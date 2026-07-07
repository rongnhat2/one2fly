<?php

namespace App\Http\Controllers;

class DisplayController extends Controller
{
    public function index()
    {
        return view('index2', [
            'heroHeader' => true,
            'home' => $this->homePageData(),
        ]);
    }

    public function about()
    {
        return view('pages.about', [
            'activeNav' => 'about',
            'heroHeader' => false,
        ]);
    }

    public function destinations()
    {
        return view('pages.destinations', [
            'heroHeader' => true,
            'activeNav' => 'destinations',
            'footerTipsHref' => '#dest-tips',
            'footerCultureHref' => '#dest-culture',
        ]);
    }

    public function destinationsDetail()
    {
        return view('pages.destinations-detail', [
            'activeNav' => 'destinations',
            'heroHeader' => true,
            'dest' => $this->destinationKyoto(),
        ]);
    }

    public function diemDen()
    {
        return view('pages.destinations', [
            'heroHeader' => true,
            'activeNav' => 'destinations',
            'pageTitle' => 'Hà Giang — Điểm đến · one2FLY!',
            'pageDescription' => 'Cẩm nang du lịch Hà Giang — one2FLY Magazine',
            'footerTipsHref' => '#dest-tips',
            'footerCultureHref' => '#dest-culture',
        ]);
    }

    public function gallery()
    {
        return view('pages.gallery', [
            'activeNav' => 'gallery',
            'hero' => [
                'eyebrow' => 'Phóng sự ảnh',
                'title' => 'Gallery',
                'subtitle' => 'Khoảnh khắc du lịch qua ống kính',
            ],
        ]);
    }

    public function galleryDetail()
    {
        return view('pages.gallery-detail', [
            'activeNav' => 'gallery',
            'hero' => [
                'eyebrow' => 'Photo Essay',
                'title' => 'Ruộng bậc thang mùa nước đổ',
                'subtitle' => 'Trần Quốc Bảo · 32 khung hình',
            ],
        ]);
    }

    public function issue()
    {
        $issues = $this->issues();

        return view('pages.issue', [
            'activeNav' => 'issue',
            'heroHeader' => false,
            'featured' => $issues[0],
            'issues' => $issues,
        ]);
    }

    public function guide()
    {
        return view('pages.guide', [
            'activeNav' => 'guide',
            'heroHeader' => false,
            'atlas' => $this->guideAtlas(),
            'timeline' => $this->guideTimeline(),
            'collections' => $this->guideCollections(),
            'latest' => $this->guideLatest(),
        ]);
    }

    public function food()
    {
        return view('pages.food', [
            'activeNav' => 'food',
            'heroHeader' => true,
            'food' => $this->foodGuideData(),
        ]);
    }

    public function foodRegion(string $region)
    {
        $regions = $this->foodRegionData();
        if (! isset($regions[$region])) {
            abort(404);
        }

        $data = $regions[$region];
        $data['siblings'] = array_values(array_filter($regions, fn($r) => $r['slug'] !== $region));

        return view('pages.food-region', [
            'activeNav' => 'food',
            'heroHeader' => true,
            'region' => $data,
        ]);
    }

    public function explore()
    {
        return view('pages.explore', [
            'activeNav' => 'explore',
            'heroHeader' => false,
            'filters' => $this->exploreFilters(),
            'moods' => $this->exploreMoods(),
            'feed' => $this->exploreFeed(),
            'featured' => $this->exploreFeatured(),
        ]);
    }

    public function issueDetail()
    {
        $issues = $this->issues();

        return view('pages.issue-detail', [
            'activeNav' => 'issue',
            'heroHeader' => false,
            'issue' => $this->issueDetailData(),
            'relatedIssues' => array_slice($issues, 1, 5),
        ]);
    }

    public function issueRead()
    {
        $issue = $this->issueDetailData();

        return view('pages.issue-read', [
            'hideHeader' => true,
            'hideFooter' => true,
            'reader' => [
                'num' => $issue['num'],
                'season' => $issue['season'],
                'label' => 'Nº ' . $issue['num'] . ' · ' . $issue['season'],
                'title' => $issue['title'],
                'desc' => $issue['intro'],
                'pages' => $issue['pages'],
                'coords' => $issue['coords'],
                'pdf' => asset('so-thang-10.pdf'),
                'contents' => array_map(function ($item, $index) {
                    return [
                        'num' => str_pad((string) ($index + 1), 2, '0', STR_PAD_LEFT),
                        'cat' => $item['cat'],
                        'title' => $item['title'],
                        'page' => (int) $item['page'],
                    ];
                }, array_slice($issue['contents'], 0, 8), array_keys(array_slice($issue['contents'], 0, 8))),
            ],
        ]);
    }

    public function notFound()
    {
        return response()->view('pages.404', [
            'hero' => [
                'eyebrow' => '404',
                'title' => 'Lạc trong một con ngõ nhỏ',
                'subtitle' => 'Trang bạn tìm không tồn tại.',
            ],
        ], 404);
    }

    private function issues(): array
    {
        return [
            [
                'num' => '47',
                'season' => 'Hè 2026',
                'year' => '2026',
                'season_name' => 'Hè',
                'title' => 'Những vĩ độ lặng lẽ',
                'description' => 'Ấn bản đặc biệt về những nơi chậm rãi nhất mùa hè này — từ cao nguyên đá đến bờ biển hoang vắng.',
                'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=1200&auto=format&fit=crop',
            ],
            [
                'num' => '46',
                'season' => 'Xuân 2026',
                'year' => '2026',
                'season_name' => 'Xuân',
                'title' => 'Mùa của những con đường',
                'description' => 'Những cung đường mở ra cùng mùa hoa nở — chậm lại để nghe tiếng gió giữa đèo.',
                'image' => 'https://images.unsplash.com/photo-1469854523086-cc02fe5d8800?q=80&w=1200&auto=format&fit=crop',
            ],
            [
                'num' => '45',
                'season' => 'Đông 2025',
                'year' => '2025',
                'season_name' => 'Đông',
                'title' => 'Biển và ký ức',
                'description' => 'Mùa biển vắng, ánh sáng mỏng và những câu chuyện được gió mang về bờ.',
                'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1200&auto=format&fit=crop',
            ],
            [
                'num' => '44',
                'season' => 'Thu 2025',
                'year' => '2025',
                'season_name' => 'Thu',
                'title' => 'Thành phố thở chậm',
                'description' => 'Đô thị trong những buổi chiều vàng — nhịp sống nhẹ hơn, khoảng trống nhiều hơn.',
                'image' => 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?q=80&w=1200&auto=format&fit=crop',
            ],
            [
                'num' => '43',
                'season' => 'Hè 2025',
                'year' => '2025',
                'season_name' => 'Hè',
                'title' => 'Hương vị miền núi',
                'description' => 'Ẩm thực bản địa, chợ phiên và mùi khói bếp trên những thửa ruộng bậc thang.',
                'image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=1200&auto=format&fit=crop',
            ],
            [
                'num' => '42',
                'season' => 'Xuân 2025',
                'year' => '2025',
                'season_name' => 'Xuân',
                'title' => 'Những buổi sáng tinh mơ',
                'description' => 'Ánh bình minh trải dài trên đồng lúa, làng quê và những chuyến đi không vội.',
                'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1200&auto=format&fit=crop',
            ],
            [
                'num' => '41',
                'season' => 'Đông 2024',
                'year' => '2024',
                'season_name' => 'Đông',
                'title' => 'Đi xa để trở về',
                'description' => 'Hành trình về phía chân trời và cảm giác trở về với chính mình sau mỗi chuyến đi.',
                'image' => 'https://images.unsplash.com/photo-1476514525535-07fb3b4dce5f?q=80&w=1200&auto=format&fit=crop',
            ],
            [
                'num' => '40',
                'season' => 'Thu 2024',
                'year' => '2024',
                'season_name' => 'Thu',
                'title' => 'Một mùa di sản',
                'description' => 'Di sản, làng nghề và những nơi thời gian dường như đi chậm hơn một nhịp.',
                'image' => 'https://images.unsplash.com/photo-1548013146-72479768bada?q=80&w=1200&auto=format&fit=crop',
            ],
        ];
    }

    private function issueDetailData(): array
    {
        return [
            'num' => '47',
            'season' => 'Hè 2026',
            'title' => 'Những vĩ độ lặng lẽ',
            'intro' => 'Ấn bản mùa hè về những nơi chậm rãi nhất — từ cao nguyên đá đến bờ biển hoang vắng, nơi thời gian dường như đi theo nhịp khác.',
            'pages' => '132',
            'stories' => '12',
            'type' => 'Travel Magazine',
            'coords' => '22.3364° N, 103.8438° E',
            'cover' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=1200&auto=format&fit=crop',
            'editor_quote' => 'Có những chuyến đi không thay đổi thế giới, nhưng thay đổi cách chúng ta nhìn thế giới.',
            'editor_note' => [
                'Số 47 bắt đầu từ một câu hỏi đơn giản: đi đâu khi muốn chậm lại? Chúng tôi không tìm đáp án nhanh — mà đi qua những vĩ độ ít ồn ào, nơi cảnh sắc và con người vẫn giữ được nhịp riêng.',
                'Trong ấn phẩm này có những cung đường núi phía Bắc Việt Nam, những buổi sáng yên ở Kyoto, và những bờ biển không checklist. Mỗi bài là một lát cắt — không phải hướng dẫn tour, mà là lời mời đi sâu hơn.',
                'Cảm ơn bạn đã mở số báo này. Hy vọng vài trang bên trong sẽ khiến bạn muốn đóng máy tính, ra ngoài, và đi chậm hơn một chút.',
            ],
            'theme_desc' => 'Chúng tôi chọn chủ đề "Những vĩ độ lặng lẽ" vì tin rằng du lịch đẹp nhất thường nằm ở những nơi không cố gắng gây ấn tượng. Số báo này dành cho người muốn quan sát, lắng nghe và để một điểm đến kể chuyện theo cách riêng.',
            'keywords' => ['Slow Travel', 'Nature', 'Culture', 'Architecture', 'Food', 'Photography'],
            'contents' => [
                ['cat' => 'City Guide', 'title' => '24 giờ ở Kyoto', 'desc' => 'A quiet journey through old streets and hidden cafés.', 'time' => '8 phút', 'page' => '12'],
                ['cat' => 'Feature', 'title' => 'Nơi sương mù ở lại lâu nhất', 'desc' => 'Hà Giang — cung đường đá và những bản làng chìm trong mây.', 'time' => '14 phút', 'page' => '28'],
                ['cat' => 'Food', 'title' => 'Ăn sáng như người địa phương', 'desc' => 'Từ phở Hà Nội đến matcha Kyoto — những buổi sáng đáng nhớ.', 'time' => '6 phút', 'page' => '44'],
                ['cat' => 'Photo Essay', 'title' => 'Biển và ký ức', 'desc' => 'Một loạt ảnh về những bờ biển vắng và ánh sáng mỏng.', 'time' => '10 phút', 'page' => '58'],
                ['cat' => 'Culture', 'title' => 'The Gardeners of Kyoto', 'desc' => 'Những người làm vườn và triết lý chậm rãi của thành phố cổ.', 'time' => '11 phút', 'page' => '72'],
                ['cat' => 'Route', 'title' => 'Weekend ở Đà Lạt', 'desc' => 'Lịch trình nhẹ cho hai ngày tránh đám đông.', 'time' => '7 phút', 'page' => '88'],
                ['cat' => 'Stay', 'title' => 'Homestay trên núi', 'desc' => 'Ghi chú về chỗ ở, thời tiết và những điều nên mang theo.', 'time' => '5 phút', 'page' => '102'],
                ['cat' => 'Essay', 'title' => 'Đi chậm có phải là lùi bước?', 'desc' => 'Một bài luận ngắn về slow travel trong thời đại vội vã.', 'time' => '9 phút', 'page' => '116'],
            ],
            'pick' => [
                'cat' => 'Feature',
                'title' => 'Nơi sương mù ở lại lâu nhất',
                'excerpt' => 'Đường đèo uốn quanh vách đá, sương trôi chậm qua mái nhà gỗ — Hà Giang không vội để bạn nhìn thấy hết ngay lần đầu. Đây là bài mở đầu của số báo, và cũng là trái tim của chủ đề mùa hè này.',
                'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=1400&auto=format&fit=crop',
                'url' => route('destinations.detail'),
            ],
            'photos' => [
                ['src' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=700&auto=format&fit=crop', 'cap' => 'Morning Light', 'tall' => true],
                ['src' => 'https://images.unsplash.com/photo-1524413840807-0c3cb6fa808d?q=80&w=700&auto=format&fit=crop', 'cap' => 'Temple Walk', 'tall' => false],
                ['src' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=900&auto=format&fit=crop', 'cap' => 'Old Streets', 'tall' => false],
                ['src' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=700&auto=format&fit=crop', 'cap' => 'Mountain View', 'tall' => true],
                ['src' => 'https://images.unsplash.com/photo-1555992336-fb0d2c5bfc3a?q=80&w=700&auto=format&fit=crop', 'cap' => 'Local Market', 'tall' => false],
                ['src' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=900&auto=format&fit=crop', 'cap' => 'Coastline', 'tall' => false],
            ],
            'contributors' => [
                ['role' => 'Photography', 'names' => 'Lê Minh Anh, Trần Quốc Bảo, Ban hình ảnh'],
                ['role' => 'Writing', 'names' => 'Nguyễn Thu Hà, Phạm Đức Khang, Ban biên tập'],
                ['role' => 'Illustration', 'names' => 'Studio Mây'],
                ['role' => 'Editorial', 'names' => 'Ban biên tập one2FLY'],
                ['role' => 'Design', 'names' => 'one2FLY Creative'],
            ],
            'timeline' => ['Research', 'Field Trip', 'Photography', 'Writing', 'Editing', 'Publication'],
        ];
    }

    private function homePageData(): array
    {
        return [
            'hero' => [
                'eyebrow' => 'Join me on my journey',
                'title' => "Experience\nthe World",
                'intro' => 'Cẩm nang du lịch thông minh, điểm đến đẹp, deal tốt và những câu chuyện đáng đọc cho mỗi chuyến đi.',
                'cta' => 'Xem chuyên mục nổi bật',
                'cta_href' => '#campaign-editorial',
                'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=3200&auto=format&fit=crop',
            ],
            'teasers' => [
                ['label' => 'Việt Nam', 'title' => 'Đà Lạt: góc nhỏ khiến bạn muốn quay lại', 'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=900&auto=format&fit=crop', 'url' => route('destinations')],
                ['label' => 'Miền núi', 'title' => 'Săn mây, ăn ngon và đi sao cho đáng', 'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=900&auto=format&fit=crop', 'url' => route('diem-den')],
                ['label' => 'Biển', 'title' => 'Quy Nhơn: lịch trình nhẹ mà rất đã', 'image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=900&auto=format&fit=crop', 'url' => route('explore')],
            ],
            'campaign' => [
                'eyebrow' => 'Chuyên mục quan trọng nhất',
                'title' => 'Du lịch đừng để bị chặt chém',
                'title_accent' => 'chặt chém',
                'lead' => 'Cập nhật giá tham khảo, tình huống dễ bị hét giá, kinh nghiệm hỏi trước khi dùng dịch vụ và danh sách nơi nên chọn để chuyến đi vui hơn, tỉnh hơn.',
                'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=1800&auto=format&fit=crop',
                'stats' => [
                    ['num' => '01', 'label' => 'Giá tham khảo'],
                    ['num' => '02', 'label' => 'Taxi & di chuyển'],
                    ['num' => '03', 'label' => 'Ăn uống đúng giá'],
                    ['num' => '04', 'label' => 'Né mất tiền oan'],
                ],
                'daily' => [
                    ['label' => 'Mục nhỏ mỗi ngày', 'title' => "Mỗi ngày một câu...\nkhông ngu.", 'desc' => 'Một câu ngắn, dễ nhớ, đọc xong đi chơi khôn hơn một chút.', 'image' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=900&auto=format&fit=crop'],
                    ['label' => 'Mục nhỏ mỗi ngày', 'title' => "Đọc tin rồi...\nđừng tức.", 'desc' => 'Tin nóng, chuyện lạ, cảnh báo nhẹ nhàng. Vui thôi nhưng thông tin phải đúng.', 'image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=900&auto=format&fit=crop'],
                ],
            ],
            'offers' => [
                'eyebrow' => 'Ưu đãi đặc biệt',
                'title' => 'Khuyến mãi & Mã giảm giá du lịch',
                'all_url' => route('explore'),
                'featured' => [
                    'eyebrow' => 'Ưu đãi có thời hạn',
                    'title' => 'Trốn đến Bali với ưu đãi độc quyền từ One2Fly',
                    'desc' => 'Chuyến bay được chọn lọc, chỗ ở được tuyển chọn và ưu đãi theo mùa cho trải nghiệm sang trọng yên tĩnh.',
                    'image' => 'https://images.unsplash.com/photo-1537996194471-e657df975ab4?q=80&w=1400&auto=format&fit=crop',
                    'cta' => 'Khám phá ưu đãi',
                    'url' => route('explore'),
                ],
                'editor_pick' => [
                    'eyebrow' => 'Lựa chọn của biên tập viên',
                    'title' => 'Sang trọng yên bình tại Ubud',
                    'desc' => 'Lịch trình nhẹ nhàng hơn với spa, dạo bộ giữa ruộng bậc thang và xe đưa đón riêng.',
                    'image' => 'https://images.unsplash.com/photo-1555400038-63f5ba517a47?q=80&w=800&auto=format&fit=crop',
                    'url' => route('destinations.detail'),
                ],
                'side' => [
                    ['eyebrow' => 'Giá tốt cuối tuần', 'title' => 'Vé cuối tuần Paris', 'desc' => 'Một kỳ nghỉ thành phố cao cấp với khách sạn được chọn lọc gần sông Seine.', 'image' => 'https://images.unsplash.com/photo-1502602898657-3e91760cbb34?q=80&w=900&auto=format&fit=crop', 'url' => route('explore')],
                    ['eyebrow' => 'Đảo nghỉ dưỡng', 'title' => 'Kỳ nghỉ Maldives Resort', 'desc' => 'Biệt thự trên mặt nước, đầm phá yên tĩnh và quyền lợi nghỉ dưỡng theo mùa.', 'image' => 'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?q=80&w=900&auto=format&fit=crop', 'url' => route('explore')],
                ],
                'highlights' => [
                    ['title' => 'Kỳ nghỉ Seoul', 'desc' => '4 đêm, khu phố boutique, và chợ đêm sầm uất.', 'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=200&auto=format&fit=crop', 'url' => route('explore')],
                    ['title' => 'Ưu đãi chớp nhoáng Singapore', 'desc' => 'Gói lưu trú ngắn ngày với view thành phố và phòng chờ sân bay.', 'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=200&auto=format&fit=crop', 'url' => route('explore')],
                    ['title' => 'Gia đình khám phá Bangkok', 'desc' => 'Nâng cấp phòng, tour phù hợp trẻ em và xe đưa đón sân bay tiện lợi.', 'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=200&auto=format&fit=crop', 'url' => route('explore')],
                    ['title' => 'Dừng chân sang chảnh Dubai', 'desc' => 'Giá tốt cho chuyển tiếp giữa các chặng bay dài.', 'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=200&auto=format&fit=crop', 'url' => route('explore')],
                    ['title' => 'Viên ngọc ẩn Hà Nội', 'desc' => 'Ở phố cổ, khám phá ẩm thực đường phố, tour riêng trong ngày.', 'image' => 'https://images.unsplash.com/photo-1512453979798-5ea266f8880c?q=80&w=200&auto=format&fit=crop', 'url' => route('food.region', 'mien-bac')],
                ],
            ],
            'food' => [
                'eyebrow' => 'Ẩm thực',
                'title' => 'Ẩm thực 3 miền',
                'feature' => [
                    'label' => 'Ẩm thực nổi bật',
                    'title' => 'Ăn ngon, hỏi giá trước, khỏi quê sau.',
                    'desc' => 'Một khối nội dung riêng cho các món nên thử, quán đáng ghé, mức giá tham khảo và vài dấu hiệu nên né khi ăn uống ở điểm du lịch.',
                    'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=1800&auto=format&fit=crop',
                ],
                'panels' => [
                    ['eyebrow' => 'Ăn gì cho đáng?', 'title' => 'Menu có giá, bụng mới yên.', 'desc' => 'Gợi ý cách xem menu, hỏi khẩu phần, kiểm tra phụ phí và giữ hóa đơn khi đi ăn ở khu du lịch.', 'dark' => false],
                    ['eyebrow' => '01', 'title' => 'Món nên thử', 'desc' => 'Danh sách món đặc sản theo vùng, đi kèm mức giá tham khảo để dễ chọn.', 'dark' => false, 'num' => true],
                    ['eyebrow' => '02', 'title' => 'Quán nên ghé', 'desc' => 'Ưu tiên địa điểm rõ giá, đông khách thật, đánh giá ổn và phục vụ tử tế.', 'dark' => false, 'num' => true],
                    ['eyebrow' => 'Né mất tiền oan', 'title' => 'Thấy “giá theo thời điểm” thì hỏi kỹ trước khi gọi.', 'desc' => 'Khối này có thể dùng để đăng các cảnh báo nhẹ nhàng về hải sản, chợ đêm, quán gần điểm du lịch và những tình huống dễ bị tính thêm tiền.', 'dark' => true],
                ],
            ],
            'emagazine' => [
                'eyebrow' => 'Ấn phẩm số',
                'title' => 'E-Magazine',
                'feature' => [
                    'badge' => 'Cover Story',
                    'label' => 'E-Magazine',
                    'title' => 'Nghe sóng biển kể chuyện quê hương',
                    'date' => 'Đăng ngày 28/05/2026',
                    'desc' => 'Một hành trình dọc bờ biển — câu chuyện, hình ảnh và nhịp sống địa phương được kể bằng ngôn ngữ tạp chí du lịch.',
                    'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=1800&auto=format&fit=crop',
                    'cta' => 'Xem chi tiết',
                    'url' => route('issue.detail'),
                ],
                'more' => [
                    ['title' => 'Hải Sắc Thái Của Xứ Sở Du Mục', 'url' => route('issue')],
                    ['title' => 'Âm Nhạc Cũng Cần Một Bầu Trời Xanh Để Cất Tiếng', 'url' => route('issue')],
                    ['title' => 'Phi Mã An Nam – Đã Đến Lúc Khơi Dòng Viễn Phương', 'url' => route('issue.detail')],
                    ['title' => 'Ảnh Tết – Cuốn Phim Nhỏ Của Mỗi Ngôi Nhà', 'url' => route('issue')],
                    ['title' => 'Nơi Khởi Nguồn Sắc Xuân Hà Nội', 'url' => route('issue.read')],
                ],
            ],
            'afar' => [
                'collage' => [
                    ['src' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=1400&auto=format&fit=crop', 'alt' => 'Bờ biển Việt Nam', 'cell' => 'wide'],
                    ['src' => 'https://images.unsplash.com/photo-1506744038136-46273834b3fb?q=80&w=900&auto=format&fit=crop', 'alt' => 'Miền núi', 'cell' => 'portrait'],
                    ['src' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=600&auto=format&fit=crop', 'alt' => 'Ẩm thực địa phương', 'cell' => 'sq-a'],
                    ['src' => 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?q=80&w=600&auto=format&fit=crop', 'alt' => 'Làng chài', 'cell' => 'sq-b'],
                    ['src' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=700&auto=format&fit=crop', 'alt' => 'Đường ven biển', 'cell' => 'tall'],
                ],
                'feature' => [
                    'eyebrow' => 'Điểm đến nổi bật',
                    'title' => 'Khám phá những bờ biển ẩn mình của Việt Nam',
                    'desc' => 'Điểm đến được chọn lọc, trải nghiệm bản địa chân thực và cảm hứng du lịch được tuyển chọn khắp Việt Nam và hơn thế nữa.',
                    'byline' => 'Bởi đội ngũ biên tập one2FLY',
                ],
                'cards' => [
                    ['label' => 'Miền núi', 'title' => 'Mountain Adventures', 'author' => 'Minh Anh', 'image' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=900&auto=format&fit=crop', 'url' => route('diem-den')],
                    ['label' => 'Biển đảo', 'title' => 'Beach Escapes', 'author' => 'Lan Phương', 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=900&auto=format&fit=crop', 'url' => route('destinations')],
                    ['label' => 'Ẩm thực', 'title' => 'Culinary Journeys', 'author' => 'Quốc Huy', 'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=900&auto=format&fit=crop', 'url' => route('food')],
                ],
                'tips' => [
                    ['text' => 'Mẹo du lịch thông minh trước mỗi chuyến đi', 'url' => route('guide')],
                    ['text' => 'Cập nhật visa và thủ tục nhập cảnh mới nhất', 'url' => route('guide')],
                    ['text' => 'Tin tức hàng không và lịch bay mùa cao điểm', 'url' => route('explore')],
                    ['text' => 'Cẩm nang điểm đến theo từng vùng miền', 'url' => route('food')],
                    ['text' => 'Gợi ý theo mùa: đi đâu, khi nào là đẹp nhất', 'url' => route('destinations')],
                    ['text' => 'Lưu ý an toàn khi du lịch tự túc', 'url' => route('food') . '#food-warnings'],
                ],
                'tips_all_url' => route('guide'),
            ],
            'stories' => [
                'eyebrow' => 'Most Popular Posts',
                'title' => 'The Latest Inspiring Stories',
                'items' => [
                    ['type' => 'story', 'label' => 'Hidden Gems', 'title' => 'Những góc nhỏ ở Việt Nam ít người biết', 'desc' => 'Làng chài, đèo nhỏ và những buổi sáng không cần lịch trình.', 'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=900&auto=format&fit=crop', 'url' => route('destinations.detail')],
                    ['type' => 'quote', 'quote' => 'Đi xa không phải để trốn đi — mà để quay lại với phiên bản tốt hơn của mình.', 'cite' => 'Cộng đồng độc giả one2FLY'],
                    ['type' => 'visual', 'label' => 'Beach Escape', 'desc' => 'Bình minh ở Phú Quốc — khi biển còn thuộc về người đi sớm.', 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=900&auto=format&fit=crop', 'url' => route('explore')],
                    ['type' => 'split', 'label' => 'Interview', 'title' => '“Tôi đi để nghe một thành phố kể chuyện”', 'desc' => 'Phỏng vấn ngắn với nhà sáng tạo du lịch về Hội An và nhịp sống chậm.', 'image' => 'https://images.unsplash.com/photo-1496747611176-843222e1e57c?q=80&w=700&auto=format&fit=crop', 'url' => route('food.region', 'mien-trung')],
                    ['type' => 'boutique', 'label' => 'Boutique Hotels', 'title' => 'Nghỉ nhỏ mà đủ sang', 'desc' => 'Homestay và khách sạn boutique được chọn theo cảm giác, không theo sao.', 'image' => 'https://images.unsplash.com/photo-1566073771259-6a8506099945?q=80&w=700&auto=format&fit=crop', 'url' => route('destinations')],
                    ['type' => 'food_list', 'label' => 'Local Food Stories', 'side_label' => 'Culture Guide', 'links' => [
                        ['text' => 'Phở Hà Nội: ăn sớm, ăn đúng chỗ', 'url' => route('food.region', 'mien-bac')],
                        ['text' => 'Cà phê Sài Gòn và những quán cũ', 'url' => route('food.region', 'mien-nam')],
                        ['text' => 'Chợ đêm Huế: mua gì, tránh gì', 'url' => route('food.region', 'mien-trung')],
                    ], 'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=800&auto=format&fit=crop'],
                ],
            ],
            'magazine' => [
                'eyebrow' => 'Ấn phẩm số mới',
                'title' => 'Digital Magazine',
                'subtitle' => 'one2FLY Magazine',
                'desc' => 'one2FLY Magazine — tuyển chọn điểm đến, trải nghiệm, ẩm thực và cẩm nang du lịch thông minh.',
                'cover' => [
                    'brand' => 'one2FLY Magazine',
                    'title' => "Vietnam,\nBeautifully Curated",
                    'issue' => 'Issue 01 / 2026',
                    'tags' => 'Destinations • Food • Culture • Smart Travel',
                    'image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=900&auto=format&fit=crop',
                ],
                'rows' => [
                    ['label' => 'Điểm đến nổi bật', 'title' => 'Những vùng đất đáng khám phá trong mùa này', 'desc' => 'Tuyển chọn theo mùa, khí hậu và nhịp sống địa phương.', 'url' => route('destinations')],
                    ['label' => 'Trải nghiệm bản địa', 'title' => 'Câu chuyện văn hóa, con người và hành trình', 'desc' => 'Gặp gỡ, lắng nghe và đi sâu hơn một điểm đến quen thuộc.', 'url' => route('issue.detail')],
                    ['label' => 'Cẩm nang thông minh', 'title' => 'Mẹo bay, lịch trình, visa và chi phí du lịch', 'desc' => 'Thông tin thực tế, gọn gàng — đủ để lên kế hoạch tự tin.', 'url' => route('guide')],
                ],
            ],
        ];
    }

    private function foodGuideData(): array
    {
        return [
            'hero' => [
                'label' => 'ẨM THỰC VIỆT NAM',
                'title' => "Ăn ngon,\nhỏi giá trước,\nkhỏi quê sau.",
                'desc' => 'Ẩm thực luôn là một phần đáng nhớ của mỗi chuyến đi. Nhưng để thưởng thức trọn vẹn, đôi khi điều quan trọng không chỉ là món ngon mà còn là biết chọn đúng nơi, đúng giá và đúng trải nghiệm.',
                'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=2000&auto=format&fit=crop',
                'coords' => '21.0285° N, 105.8542° E',
                'stats' => ['3 miền', '150+ món ăn', '80+ địa điểm'],
            ],
            'editor_quote' => 'Mỗi vùng đất đều được nhớ bằng một hương vị.',
            'editor_note' => [
                'Ẩm thực Việt Nam không chỉ là danh sách món ăn — mà là cách một vùng đất kể chuyện qua gia vị, nhịp sống chợ và thói quen ăn uống của người địa phương. Từ phở sáng sớm ở Hà Nội đến hủ tiếu Nam Vang, mỗi miền mang một giọng riêng.',
                'Khi đi du lịch, ăn uống thường là khoảnh khắc dễ nhớ nhất — nhưng cũng là nơi dễ mất tiền oan nếu không hỏi giá, không đọc menu và không chọn đúng quán. Cẩm nang này giúp bạn ăn ngon hơn, tự tin hơn và ít bất ngờ hơn.',
                'Chúng tôi tuyển chọn món nên thử, quán đáng ghé và mức giá tham khảo — không phải để “check-in”, mà để bạn thưởng thức đúng cách, đúng giá và đúng trải nghiệm của nơi mình đến.',
            ],
            'dishes' => [
                ['name' => 'Bún bò Huế', 'region' => 'Huế', 'region_slug' => 'mien-trung', 'desc' => 'Đậm vị, nước dùng cay nhẹ.', 'price' => '60.000–90.000đ', 'image' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=400&auto=format&fit=crop'],
                ['name' => 'Phở Hà Nội', 'region' => 'Hà Nội', 'region_slug' => 'mien-bac', 'desc' => 'Nước dùng trong, thơm quế và hành.', 'price' => '45.000–70.000đ', 'image' => 'https://images.unsplash.com/photo-1582878826629-29ae7d2b3e9a?q=80&w=400&auto=format&fit=crop'],
                ['name' => 'Cao lầu', 'region' => 'Hội An', 'region_slug' => 'mien-trung', 'desc' => 'Mì vàng, thịt xá xíu và rau sống.', 'price' => '40.000–55.000đ', 'image' => 'https://images.unsplash.com/photo-1563245372-f21724e3856d?q=80&w=400&auto=format&fit=crop'],
                ['name' => 'Bánh xèo miền Tây', 'region' => 'Cần Thơ', 'region_slug' => 'mien-nam', 'desc' => 'Giòn rụm, cuốn rau sống và nước mắm chua.', 'price' => '35.000–60.000đ', 'image' => 'https://images.unsplash.com/photo-1626200419199-391ae4be7c7d?q=80&w=400&auto=format&fit=crop'],
                ['name' => 'Bún chả', 'region' => 'Hà Nội', 'region_slug' => 'mien-bac', 'desc' => 'Thịt nướng than hoa, nước mắm pha chua ngọt.', 'price' => '50.000–80.000đ', 'image' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?q=80&w=400&auto=format&fit=crop'],
                ['name' => 'Hủ tiếu Nam Vang', 'region' => 'Sài Gòn', 'region_slug' => 'mien-nam', 'desc' => 'Nước lèo ngọt thanh, topping đa dạng.', 'price' => '40.000–65.000đ', 'image' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?q=80&w=400&auto=format&fit=crop'],
            ],
            'featured_restaurant' => [
                'name' => 'Quán Cô Liên',
                'location' => '36 Lê Lợi, Huế',
                'price' => '80.000–150.000đ / người',
                'rating' => '4.6',
                'hours' => '06:00 – 14:00',
                'desc' => 'Quán bún bò lâu năm, đông khách địa phương từ sáng sớm. Menu treo rõ giá, phục vụ nhanh và không hối khách.',
                'image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1200&auto=format&fit=crop',
                'maps' => 'https://maps.google.com',
            ],
            'restaurants' => [
                ['name' => 'Phở Thìn', 'location' => 'Hà Nội', 'price' => '50.000–70.000đ', 'note' => 'Phở bò tái lăn — nên đến sớm'],
                ['name' => 'Bánh Mì Phượng', 'location' => 'Hội An', 'price' => '25.000–40.000đ', 'note' => 'Bánh mì đầy nhân, quán nhỏ luôn đông'],
                ['name' => 'Cơm tấm Ba Ghiền', 'location' => 'Sài Gòn', 'price' => '45.000–75.000đ', 'note' => 'Cơm tấm sườn bì — mở đến khuya'],
            ],
            'price_guide' => [
                ['cat' => 'Street Food', 'range' => '20–60k'],
                ['cat' => 'Traditional Restaurant', 'range' => '80–200k'],
                ['cat' => 'Seafood', 'range' => 'Theo thời giá'],
                ['cat' => 'Coffee', 'range' => '30–80k'],
                ['cat' => 'Dessert', 'range' => '20–60k'],
            ],
            'warnings' => [
                'Không gọi hải sản khi chưa hỏi giá.',
                'Nếu menu không ghi giá, hãy hỏi trước.',
                'Kiểm tra phụ phí phục vụ.',
                'Hỏi khẩu phần trước khi gọi.',
                'Giữ hóa đơn khi thanh toán.',
            ],
            'regions' => [
                ['slug' => 'mien-bac', 'name' => 'Miền Bắc', 'desc' => 'Thanh đạm, tinh tế — phở, bún chả, chả cá và những món ăn ít cay, nhiều rau thơm.', 'image' => 'https://images.unsplash.com/photo-1582878826629-29ae7d2b3e9a?q=80&w=1200&auto=format&fit=crop'],
                ['slug' => 'mien-trung', 'name' => 'Miền Trung', 'desc' => 'Đậm đà, cay nồng — bún bò, mì Quảng, bánh tráng cuốn và hương vị cung đình Huế.', 'image' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=1200&auto=format&fit=crop'],
                ['slug' => 'mien-nam', 'name' => 'Miền Nam', 'desc' => 'Ngọt thanh, đa dạng — hủ tiếu, cơm tấm, bánh xèo và ẩm thực đường phố sôi động.', 'image' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?q=80&w=1200&auto=format&fit=crop'],
            ],
            'tips' => [
                'Ưu tiên quán đông người địa phương.',
                'Đừng chọn quán ngay sát cổng khu du lịch.',
                'Đọc menu trước khi ngồi.',
                'Kiểm tra phụ phí nếu đi nhóm đông.',
                'Mang theo tiền mặt ở một số khu chợ.',
            ],
            'gallery' => [
                ['src' => 'https://images.unsplash.com/photo-1555992336-fb0d2c5bfc3a?q=80&w=700&auto=format&fit=crop', 'cap' => 'Morning Market', 'tall' => true],
                ['src' => 'https://images.unsplash.com/photo-1529042410759-befb1204bfea?q=80&w=900&auto=format&fit=crop', 'cap' => 'Street BBQ', 'tall' => false],
                ['src' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=900&auto=format&fit=crop', 'cap' => 'Traditional Kitchen', 'tall' => false],
                ['src' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=700&auto=format&fit=crop', 'cap' => 'Fresh Seafood', 'tall' => true],
                ['src' => 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?q=80&w=700&auto=format&fit=crop', 'cap' => 'Coffee Corner', 'tall' => false],
                ['src' => 'https://images.unsplash.com/photo-1500382017468-9049fed747ef?q=80&w=900&auto=format&fit=crop', 'cap' => 'Rice Fields Lunch', 'tall' => false],
            ],
            'related' => [
                ['cat' => 'City Guide', 'title' => 'Ẩm thực Hà Nội', 'time' => '8 phút', 'url' => route('food.region', 'mien-bac')],
                ['cat' => 'Food', 'title' => 'Ăn gì ở Hội An', 'time' => '6 phút', 'url' => route('food.region', 'mien-trung')],
                ['cat' => 'Coffee', 'title' => 'Coffee Guide Đà Lạt', 'time' => '5 phút', 'url' => route('destinations')],
                ['cat' => 'Seafood', 'title' => 'Hải sản Phú Quốc', 'time' => '7 phút', 'url' => route('food.region', 'mien-nam')],
                ['cat' => 'Street Food', 'title' => 'Street Food Sài Gòn', 'time' => '9 phút', 'url' => route('food.region', 'mien-nam')],
            ],
        ];
    }

    private function foodRegionData(): array
    {
        return [
            'mien-bac' => [
                'slug' => 'mien-bac',
                'name' => 'Miền Bắc',
                'hero' => [
                    'label' => 'ẨM THỰC THEO VÙNG',
                    'title' => 'Ẩm thực Miền Bắc',
                    'tagline' => 'Thanh vị, tinh tế và mang nhiều dấu ấn của văn hóa lâu đời.',
                    'image' => 'https://images.unsplash.com/photo-1582878826629-29ae7d2b3e9a?q=80&w=2000&auto=format&fit=crop',
                    'coords' => '21.0285° N, 105.8542° E',
                    'stats' => ['20+ đặc sản', '45+ quán gợi ý', '5 tỉnh nổi bật'],
                ],
                'overview' => [
                    'heading' => 'Miền Bắc có gì đặc biệt?',
                    'paragraphs' => [
                        'Ẩm thực miền Bắc nổi tiếng với vị thanh, ít cay, ưu tiên nước dùng trong và hương thảo mộc tự nhiên. Phở, bún chả, chả cá Lã Vọng hay bánh cuốn Thanh Trì đều mang dấu ấn của một nền văn hóa ăn uống trang nhã, không ồn ào.',
                        'Nguyên liệu thường theo mùa — rau thơm, nấm, cá nước ngọt và thịt lợn. Cách nấu chú trọng sự cân bằng: không quá ngọt, không quá béo, để hương vị tự nhiên của món ăn được tôn lên.',
                        'Văn hóa ăn uống phố cổ Hà Nội gắn với quán vỉa hè, ghế nhựa thấp và nhịp sống sáng sớm. Ăn sáng là nghi thức — phở, xôi, bánh mì hoặc cháo quẩy đều là cách bắt đầu ngày mới của người địa phương.',
                    ],
                    'keywords' => ['Thanh vị', 'Ít cay', 'Nước dùng', 'Phở', 'Bún', 'Ẩm thực phố cổ'],
                ],
                'dishes' => [
                    ['name' => 'Phở Hà Nội', 'province' => 'Hà Nội', 'desc' => 'Nước dùng trong, thơm và cân bằng.', 'price' => '45.000–80.000đ', 'image' => 'https://images.unsplash.com/photo-1582878826629-29ae7d2b3e9a?q=80&w=500&auto=format&fit=crop'],
                    ['name' => 'Bún chả', 'province' => 'Hà Nội', 'desc' => 'Thịt nướng than, nước mắm chua ngọt.', 'price' => '50.000–80.000đ', 'image' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?q=80&w=500&auto=format&fit=crop'],
                    ['name' => 'Chả cá Lã Vọng', 'province' => 'Hà Nội', 'desc' => 'Cá nướng nóng, thì là và hành.', 'price' => '120.000–200.000đ', 'image' => 'https://images.unsplash.com/photo-1563245372-f21724e3856d?q=80&w=500&auto=format&fit=crop'],
                    ['name' => 'Bánh cuốn Thanh Trì', 'province' => 'Hà Nội', 'desc' => 'Bánh mỏng, nhân thịt, chấm nước mắm.', 'price' => '35.000–55.000đ', 'image' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=500&auto=format&fit=crop'],
                    ['name' => 'Bún đậu mắm tôm', 'province' => 'Hà Nội', 'desc' => 'Đậu chiên, thịt luộc, mắm tôm đặc trưng.', 'price' => '40.000–70.000đ', 'image' => 'https://images.unsplash.com/photo-1626200419199-391ae4be7c7d?q=80&w=500&auto=format&fit=crop'],
                ],
                'featured_restaurant' => [
                    'name' => 'Phở Thìn Bồ Hoàn',
                    'location' => '13 Lò Đúc, Hai Bà Trưng, Hà Nội',
                    'price' => '50.000–80.000đ / người',
                    'hours' => '05:30 – 10:00',
                    'desc' => 'Quán phở bò tái lăn kinh điển, mở cửa từ bình minh. Nước dùng đậm vị, thịt bò xào trên chảo trước khi cho vào tô — trải nghiệm đúng chất phố cổ.',
                    'image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1200&auto=format&fit=crop',
                    'maps' => 'https://maps.google.com',
                ],
                'restaurants' => [
                    ['name' => 'Bún chả Hương Liên', 'district' => 'Ba Đình', 'price' => '60.000đ', 'rating' => '4.5'],
                    ['name' => 'Chả cá Thăng Long', 'district' => 'Đống Đa', 'price' => '150.000đ', 'rating' => '4.4'],
                    ['name' => 'Bánh cuốn Gia An', 'district' => 'Hoàn Kiếm', 'price' => '45.000đ', 'rating' => '4.3'],
                    ['name' => 'Cà phê Giảng', 'district' => 'Hoàn Kiếm', 'price' => '35.000đ', 'rating' => '4.6'],
                ],
                'provinces' => [
                    ['name' => 'Hà Nội', 'guides' => 24, 'image' => 'https://images.unsplash.com/photo-1599700909050-350ade9a2073?q=80&w=800&auto=format&fit=crop', 'url' => route('destinations')],
                    ['name' => 'Hải Phòng', 'guides' => 12, 'image' => 'https://images.unsplash.com/photo-1555992336-fb0d2c5bfc3a?q=80&w=800&auto=format&fit=crop', 'url' => route('destinations')],
                    ['name' => 'Ninh Bình', 'guides' => 10, 'image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=800&auto=format&fit=crop', 'url' => route('destinations.detail')],
                    ['name' => 'Quảng Ninh', 'guides' => 14, 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop', 'url' => route('explore')],
                    ['name' => 'Lào Cai', 'guides' => 8, 'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=800&auto=format&fit=crop', 'url' => route('diem-den')],
                    ['name' => 'Sapa', 'guides' => 9, 'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=800&auto=format&fit=crop', 'url' => route('diem-den')],
                ],
                'price_guide' => [
                    ['cat' => 'Street Food', 'range' => '20–60k'],
                    ['cat' => 'Traditional Restaurant', 'range' => '80–180k'],
                    ['cat' => 'Specialty Restaurant', 'range' => '200–500k'],
                    ['cat' => 'Coffee', 'range' => '30–70k'],
                    ['cat' => 'Dessert', 'range' => '20–60k'],
                ],
                'tips' => [
                    'Ăn sáng sớm để có trải nghiệm ngon nhất.',
                    'Quán đông người địa phương thường đáng tin hơn.',
                    'Đừng ngại hỏi giá trước khi gọi thêm.',
                    'Một số món chỉ bán theo mùa.',
                ],
                'avoid' => [
                    'Không gọi hải sản nếu chưa biết giá.',
                    'Đọc kỹ menu trước khi gọi.',
                    'Kiểm tra phụ phí.',
                    'Giữ hóa đơn.',
                    'Không chọn quán chỉ vì gần điểm du lịch.',
                ],
                'journey' => [
                    'title' => 'Một ngày ăn gì ở Miền Bắc?',
                    'image' => 'https://images.unsplash.com/photo-1555992336-fb0d2c5bfc3a?q=80&w=800&auto=format&fit=crop',
                    'steps' => [
                        ['time' => '08:00', 'label' => 'Phở'],
                        ['time' => '10:30', 'label' => 'Cà phê'],
                        ['time' => '12:30', 'label' => 'Bún chả'],
                        ['time' => '15:00', 'label' => 'Bánh cốm'],
                        ['time' => '19:00', 'label' => 'Chả cá'],
                    ],
                ],
                'related_guides' => [
                    ['cat' => 'City Guide', 'title' => 'Ẩm thực Hà Nội', 'time' => '8 phút', 'url' => route('food.region', 'mien-bac')],
                    ['cat' => 'Food', 'title' => 'Ẩm thực Hải Phòng', 'time' => '6 phút', 'url' => route('destinations')],
                    ['cat' => 'Food', 'title' => 'Ẩm thực Sapa', 'time' => '7 phút', 'url' => route('diem-den')],
                    ['cat' => 'Food', 'title' => 'Ẩm thực Ninh Bình', 'time' => '5 phút', 'url' => route('destinations.detail')],
                ],
                'related_destinations' => [
                    ['name' => 'Hà Nội', 'mood' => 'Phố cổ · Ẩm thực', 'image' => 'https://images.unsplash.com/photo-1599700909050-350ade9a2073?q=80&w=600&auto=format&fit=crop', 'url' => route('destinations')],
                    ['name' => 'Ninh Bình', 'mood' => 'Ruộng bậc thang · Chậm', 'image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=600&auto=format&fit=crop', 'url' => route('explore')],
                    ['name' => 'Hạ Long', 'mood' => 'Biển · Hải sản', 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=600&auto=format&fit=crop', 'url' => route('explore')],
                    ['name' => 'Sapa', 'mood' => 'Núi · Chợ phiên', 'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=600&auto=format&fit=crop', 'url' => route('diem-den')],
                ],
            ],
            'mien-trung' => [
                'slug' => 'mien-trung',
                'name' => 'Miền Trung',
                'hero' => [
                    'label' => 'ẨM THỰC THEO VÙNG',
                    'title' => 'Ẩm thực Miền Trung',
                    'tagline' => 'Đậm đà, cay nồng và gắn với di sản cung đình.',
                    'image' => 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?q=80&w=2000&auto=format&fit=crop',
                    'coords' => '16.4637° N, 107.5909° E',
                    'stats' => ['18+ đặc sản', '38+ quán gợi ý', '4 tỉnh nổi bật'],
                ],
                'overview' => [
                    'heading' => 'Miền Trung có gì đặc biệt?',
                    'paragraphs' => [
                        'Ẩm thực miền Trung đậm đà hơn, nhiều món cay và mặn — phản ánh khí hậu khắc nghiệt và văn hóa cung đình Huế. Bún bò, mì Quảng, bánh bèo và bánh khoái là những tên gọi quen thuộc với du khách.',
                        'Hải sản ven biển Đà Nẵng, Quy Nhơn bổ sung palette hương vị: tươi, ngọt tự nhiên, thường nướng hoặc luộc giữ vị. Gia vị ớt, sả, tỏi được dùng táo bạo hơn miền Bắc.',
                        'Phố cổ Hội An và kinh thành Huế là hai trục ẩm thực chính — một bên hướng biển, một bên hướng cung đình, cùng tạo nên bức tranh ẩm thực đa tầng của miền đất hẹp.',
                    ],
                    'keywords' => ['Cay nồng', 'Cung đình', 'Bún bò', 'Mì Quảng', 'Hải sản', 'Bánh Huế'],
                ],
                'dishes' => [
                    ['name' => 'Bún bò Huế', 'province' => 'Huế', 'desc' => 'Nước dùng đậm, sả và ớt cay nhẹ.', 'price' => '60.000–90.000đ', 'image' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=500&auto=format&fit=crop'],
                    ['name' => 'Mì Quảng', 'province' => 'Quảng Nam', 'desc' => 'Mì vàng, nước dùng ít, topping đa dạng.', 'price' => '40.000–65.000đ', 'image' => 'https://images.unsplash.com/photo-1563245372-f21724e3856d?q=80&w=500&auto=format&fit=crop'],
                    ['name' => 'Cao lầu', 'province' => 'Hội An', 'desc' => 'Mì độc quyền, thịt xá xíu và rau sống.', 'price' => '40.000–55.000đ', 'image' => 'https://images.unsplash.com/photo-1626200419199-391ae4be7c7d?q=80&w=500&auto=format&fit=crop'],
                    ['name' => 'Bánh bèo', 'province' => 'Huế', 'desc' => 'Bánh nhỏ, nhân tôm, chấm mắm ruốc.', 'price' => '30.000–50.000đ', 'image' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?q=80&w=500&auto=format&fit=crop'],
                    ['name' => 'Bánh khoái', 'province' => 'Huế', 'desc' => 'Bánh xèo giòn kiểu cung đình.', 'price' => '50.000–80.000đ', 'image' => 'https://images.unsplash.com/photo-1582878826629-29ae7d2b3e9a?q=80&w=500&auto=format&fit=crop'],
                ],
                'featured_restaurant' => [
                    'name' => 'Quán Cô Liên',
                    'location' => '36 Lê Lợi, Huế',
                    'price' => '80.000–150.000đ / người',
                    'hours' => '06:00 – 14:00',
                    'desc' => 'Bún bò Huế chuẩn vị — đông khách địa phương, menu rõ giá, phục vụ nhanh.',
                    'image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1200&auto=format&fit=crop',
                    'maps' => 'https://maps.google.com',
                ],
                'restaurants' => [
                    ['name' => 'Mì Quảng Bà Mua', 'district' => 'Hội An', 'price' => '45.000đ', 'rating' => '4.5'],
                    ['name' => 'Bánh bèo Nậm', 'district' => 'Huế', 'price' => '40.000đ', 'rating' => '4.4'],
                    ['name' => 'Bánh Mì Phượng', 'district' => 'Hội An', 'price' => '30.000đ', 'rating' => '4.6'],
                    ['name' => 'Hải sản Bé Mặn', 'district' => 'Đà Nẵng', 'price' => '200.000đ', 'rating' => '4.3'],
                ],
                'provinces' => [
                    ['name' => 'Huế', 'guides' => 18, 'image' => 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?q=80&w=800&auto=format&fit=crop', 'url' => route('food.region', 'mien-trung')],
                    ['name' => 'Hội An', 'guides' => 16, 'image' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=800&auto=format&fit=crop', 'url' => route('food.region', 'mien-trung')],
                    ['name' => 'Đà Nẵng', 'guides' => 14, 'image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=800&auto=format&fit=crop', 'url' => route('explore')],
                    ['name' => 'Quy Nhơn', 'guides' => 11, 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop', 'url' => route('explore')],
                    ['name' => 'Nha Trang', 'guides' => 12, 'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=800&auto=format&fit=crop', 'url' => route('destinations')],
                    ['name' => 'Quảng Bình', 'guides' => 7, 'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=800&auto=format&fit=crop', 'url' => route('diem-den')],
                ],
                'price_guide' => [
                    ['cat' => 'Street Food', 'range' => '25–65k'],
                    ['cat' => 'Traditional Restaurant', 'range' => '90–200k'],
                    ['cat' => 'Specialty Restaurant', 'range' => '220–550k'],
                    ['cat' => 'Coffee', 'range' => '30–75k'],
                    ['cat' => 'Dessert', 'range' => '20–65k'],
                ],
                'tips' => [
                    'Món cay có thể điều chỉnh — hãy nói trước với chủ quán.',
                    'Hải sản luôn hỏi giá theo kg trước khi chọn.',
                    'Ăn sáng bún bò từ 6h sáng là đúng nhịp Huế.',
                    'Hội An đông khách — đặt bàn nếu đi cuối tuần.',
                ],
                'avoid' => [
                    'Không gọi hải sản khi chưa biết giá.',
                    'Đọc kỹ menu trước khi gọi.',
                    'Kiểm tra phụ phí.',
                    'Giữ hóa đơn.',
                    'Tránh quán chỉ có menu tiếng Anh không giá.',
                ],
                'journey' => [
                    'title' => 'Một ngày ăn gì ở Miền Trung?',
                    'image' => 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?q=80&w=800&auto=format&fit=crop',
                    'steps' => [
                        ['time' => '07:00', 'label' => 'Bún bò'],
                        ['time' => '10:00', 'label' => 'Bánh bèo'],
                        ['time' => '12:30', 'label' => 'Mì Quảng'],
                        ['time' => '15:00', 'label' => 'Chè Huế'],
                        ['time' => '18:30', 'label' => 'Hải sản'],
                    ],
                ],
                'related_guides' => [
                    ['cat' => 'Food', 'title' => 'Ẩm thực Huế', 'time' => '9 phút', 'url' => route('food.region', 'mien-trung')],
                    ['cat' => 'Food', 'title' => 'Ăn gì ở Hội An', 'time' => '6 phút', 'url' => route('food.region', 'mien-trung')],
                    ['cat' => 'Seafood', 'title' => 'Hải sản Đà Nẵng', 'time' => '7 phút', 'url' => route('explore')],
                    ['cat' => 'Food', 'title' => 'Mì Quảng guide', 'time' => '5 phút', 'url' => route('food')],
                ],
                'related_destinations' => [
                    ['name' => 'Huế', 'mood' => 'Cung đình · Chậm', 'image' => 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?q=80&w=600&auto=format&fit=crop', 'url' => route('destinations.detail')],
                    ['name' => 'Hội An', 'mood' => 'Phố cổ · Đèn lồng', 'image' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=600&auto=format&fit=crop', 'url' => route('explore')],
                    ['name' => 'Đà Nẵng', 'mood' => 'Biển · Ẩm thực', 'image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=600&auto=format&fit=crop', 'url' => route('explore')],
                    ['name' => 'Quy Nhơn', 'mood' => 'Biển vắng · Chill', 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=600&auto=format&fit=crop', 'url' => route('explore')],
                ],
            ],
            'mien-nam' => [
                'slug' => 'mien-nam',
                'name' => 'Miền Nam',
                'hero' => [
                    'label' => 'ẨM THỰC THEO VÙNG',
                    'title' => 'Ẩm thực Miền Nam',
                    'tagline' => 'Ngọt thanh, đa dạng và sôi động như nhịp sống thành phố.',
                    'image' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?q=80&w=2000&auto=format&fit=crop',
                    'coords' => '10.8231° N, 106.6297° E',
                    'stats' => ['22+ đặc sản', '50+ quán gợi ý', '6 tỉnh nổi bật'],
                ],
                'overview' => [
                    'heading' => 'Miền Nam có gì đặc biệt?',
                    'paragraphs' => [
                        'Ẩm thực miền Nam ngọt thanh hơn, đa dạng topping và thường phục vụ kèm rau sống, nước mắm pha. Hủ tiếu, cơm tấm, bánh xèo và lẩu mắm là những biểu tượng khó bỏ qua.',
                        'Sài Gòn là trung tâm hội tụ — từ street food đến quán ven hẻm, từ chợ Bến Thành đến quận Chợ Lớn. Miền Tây mang palette khác: bánh xèo, lẩu mắm, trái cây nhiệt đới.',
                        'Văn hóa ăn uống linh hoạt — mở cửa sớm, đóng cửa khuya, giá phải chăng và khẩu phần thường lớn. Ăn ở miền Nam là trải nghiệm xã hội: chia bàn, gọi thêm, trò chuyện giữa các món.',
                    ],
                    'keywords' => ['Ngọt thanh', 'Street food', 'Cơm tấm', 'Hủ tiếu', 'Bánh xèo', 'Chợ nổi'],
                ],
                'dishes' => [
                    ['name' => 'Hủ tiếu Nam Vang', 'province' => 'Sài Gòn', 'desc' => 'Nước lèo ngọt, topping đa dạng.', 'price' => '40.000–65.000đ', 'image' => 'https://images.unsplash.com/photo-1569718212165-3a8278d5f624?q=80&w=500&auto=format&fit=crop'],
                    ['name' => 'Cơm tấm sườn bì', 'province' => 'Sài Gòn', 'desc' => 'Sườn nướng, bì, chả, đồ chua.', 'price' => '45.000–75.000đ', 'image' => 'https://images.unsplash.com/photo-1604908176997-125f25cc6f3d?q=80&w=500&auto=format&fit=crop'],
                    ['name' => 'Bánh xèo miền Tây', 'province' => 'Cần Thơ', 'desc' => 'Bánh lớn, nhân tôm thịt, cuốn rau.', 'price' => '35.000–60.000đ', 'image' => 'https://images.unsplash.com/photo-1626200419199-391ae4be7c7d?q=80&w=500&auto=format&fit=crop'],
                    ['name' => 'Bánh mì Sài Gòn', 'province' => 'Sài Gòn', 'desc' => 'Vỏ giòn, nhân đầy, sốt đặc trưng.', 'price' => '25.000–45.000đ', 'image' => 'https://images.unsplash.com/photo-1582878826629-29ae7d2b3e9a?q=80&w=500&auto=format&fit=crop'],
                    ['name' => 'Lẩu mắm', 'province' => 'Cần Thơ', 'desc' => 'Nước lẩu đậm, rau địa phương.', 'price' => '150.000–250.000đ', 'image' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=500&auto=format&fit=crop'],
                ],
                'featured_restaurant' => [
                    'name' => 'Cơm tấm Ba Ghiền',
                    'location' => '126 Nguyễn Thị Minh Khai, Q.3, TP.HCM',
                    'price' => '45.000–75.000đ / người',
                    'hours' => '07:00 – 22:00',
                    'desc' => 'Cơm tấm sườn bì chả kinh điển Sài Gòn — quán đông, giá rõ, mở đến khuya.',
                    'image' => 'https://images.unsplash.com/photo-1517248135467-4c7edcad34c4?q=80&w=1200&auto=format&fit=crop',
                    'maps' => 'https://maps.google.com',
                ],
                'restaurants' => [
                    ['name' => 'Hủ tiếu Nam Vang Nhân', 'district' => 'Q.5', 'price' => '50.000đ', 'rating' => '4.5'],
                    ['name' => 'Bánh xèo Cái Răng', 'district' => 'Cần Thơ', 'price' => '55.000đ', 'rating' => '4.4'],
                    ['name' => 'Bánh mì Hồng Hoa', 'district' => 'Q.1', 'price' => '35.000đ', 'rating' => '4.6'],
                    ['name' => 'Lẩu mắm U Minh', 'district' => 'Cà Mau', 'price' => '180.000đ', 'rating' => '4.3'],
                ],
                'provinces' => [
                    ['name' => 'Sài Gòn', 'guides' => 28, 'image' => 'https://images.unsplash.com/photo-1563492065-73a8964f1f67?q=80&w=800&auto=format&fit=crop', 'url' => route('food.region', 'mien-nam')],
                    ['name' => 'Cần Thơ', 'guides' => 14, 'image' => 'https://images.unsplash.com/photo-1555992336-fb0d2c5bfc3a?q=80&w=800&auto=format&fit=crop', 'url' => route('food.region', 'mien-nam')],
                    ['name' => 'Phú Quốc', 'guides' => 12, 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop', 'url' => route('explore')],
                    ['name' => 'Vũng Tàu', 'guides' => 9, 'image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=800&auto=format&fit=crop', 'url' => route('destinations')],
                    ['name' => 'Đà Lạt', 'guides' => 11, 'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=800&auto=format&fit=crop', 'url' => route('destinations')],
                    ['name' => 'An Giang', 'guides' => 8, 'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=800&auto=format&fit=crop', 'url' => route('food.region', 'mien-nam')],
                ],
                'price_guide' => [
                    ['cat' => 'Street Food', 'range' => '20–65k'],
                    ['cat' => 'Traditional Restaurant', 'range' => '80–200k'],
                    ['cat' => 'Specialty Restaurant', 'range' => '200–500k'],
                    ['cat' => 'Coffee', 'range' => '30–80k'],
                    ['cat' => 'Dessert', 'range' => '20–65k'],
                ],
                'tips' => [
                    'Cơm tấm và hủ tiếu ngon nhất vào giữa trưa.',
                    'Chợ nổi Cái Răng nên đến sớm 5h–7h sáng.',
                    'Hỏi giá hải sản Phú Quốc theo kg trước khi chọn.',
                    'Mang tiền mặt ở chợ và quán nhỏ.',
                ],
                'avoid' => [
                    'Không gọi hải sản khi chưa biết giá.',
                    'Đọc kỹ menu trước khi gọi.',
                    'Kiểm tra phụ phí.',
                    'Giữ hóa đơn.',
                    'Không chọn quán chỉ vì gần điểm du lịch.',
                ],
                'journey' => [
                    'title' => 'Một ngày ăn gì ở Miền Nam?',
                    'image' => 'https://images.unsplash.com/photo-1563492065-73a8964f1f67?q=80&w=800&auto=format&fit=crop',
                    'steps' => [
                        ['time' => '07:30', 'label' => 'Hủ tiếu'],
                        ['time' => '10:00', 'label' => 'Cà phê sữa đá'],
                        ['time' => '12:00', 'label' => 'Cơm tấm'],
                        ['time' => '15:00', 'label' => 'Bánh mì'],
                        ['time' => '19:00', 'label' => 'Lẩu mắm'],
                    ],
                ],
                'related_guides' => [
                    ['cat' => 'Street Food', 'title' => 'Street Food Sài Gòn', 'time' => '9 phút', 'url' => route('food.region', 'mien-nam')],
                    ['cat' => 'Food', 'title' => 'Ẩm thực Cần Thơ', 'time' => '7 phút', 'url' => route('food.region', 'mien-nam')],
                    ['cat' => 'Seafood', 'title' => 'Hải sản Phú Quốc', 'time' => '8 phút', 'url' => route('explore')],
                    ['cat' => 'Coffee', 'title' => 'Coffee Guide Đà Lạt', 'time' => '5 phút', 'url' => route('destinations')],
                ],
                'related_destinations' => [
                    ['name' => 'Sài Gòn', 'mood' => 'Đô thị · Street food', 'image' => 'https://images.unsplash.com/photo-1563492065-73a8964f1f67?q=80&w=600&auto=format&fit=crop', 'url' => route('explore')],
                    ['name' => 'Cần Thơ', 'mood' => 'Chợ nổi · Miền Tây', 'image' => 'https://images.unsplash.com/photo-1555992336-fb0d2c5bfc3a?q=80&w=600&auto=format&fit=crop', 'url' => route('explore')],
                    ['name' => 'Phú Quốc', 'mood' => 'Biển · Hải sản', 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=600&auto=format&fit=crop', 'url' => route('explore')],
                    ['name' => 'Đà Lạt', 'mood' => 'Núi · Cà phê', 'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=600&auto=format&fit=crop', 'url' => route('explore')],
                ],
            ],
        ];
    }

    private function guideAtlas(): array
    {
        return [
            ['name' => 'Japan', 'label' => 'Nhật Bản', 'guides' => 24, 'desc' => 'Thành phố, đền chùa và những con phố yên tĩnh.', 'image' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=1200&auto=format&fit=crop', 'url' => route('destinations.detail')],
            ['name' => 'Korea', 'label' => 'Hàn Quốc', 'guides' => 18, 'desc' => 'Seoul, Busan và những hành trình cuối tuần.', 'image' => 'https://images.unsplash.com/photo-1517154427253-bc3d730a2bfa?q=80&w=1200&auto=format&fit=crop', 'url' => route('explore')],
            ['name' => 'Thailand', 'label' => 'Thái Lan', 'guides' => 21, 'desc' => 'Bangkok sôi động, Chiang Mai chậm rãi, đảo yên bình.', 'image' => 'https://images.unsplash.com/photo-1528181304800-259b08848526?q=80&w=1200&auto=format&fit=crop', 'url' => route('explore')],
            ['name' => 'Vietnam', 'label' => 'Việt Nam', 'guides' => 32, 'desc' => 'Từ phố cổ đến biển đảo và cao nguyên đá.', 'image' => 'https://images.unsplash.com/photo-1528127269322-539801943592?q=80&w=1200&auto=format&fit=crop', 'url' => route('destinations')],
            ['name' => 'France', 'label' => 'Pháp', 'guides' => 15, 'desc' => 'Paris, Provence và những làng quê nghệ thuật.', 'image' => 'https://images.unsplash.com/photo-1502602898657-3b917717cb31?q=80&w=1200&auto=format&fit=crop', 'url' => route('explore')],
            ['name' => 'Italy', 'label' => 'Ý', 'guides' => 19, 'desc' => 'Rome, Florence, Amalfi — nghệ thuật và ẩm thực.', 'image' => 'https://images.unsplash.com/photo-1523906834658-6e24ef2386f9?q=80&w=1200&auto=format&fit=crop', 'url' => route('explore')],
        ];
    }

    private function guideTimeline(): array
    {
        return [
            ['time' => '08:00', 'title' => 'Quán cà phê đầu ngày', 'note' => 'Gion · Kyoto'],
            ['time' => '10:30', 'title' => 'Bảo tàng / phố cổ', 'note' => 'Higashiyama'],
            ['time' => '13:00', 'title' => 'Bữa trưa địa phương', 'note' => 'Nishiki Market'],
            ['time' => '16:00', 'title' => 'Đi bộ không lịch trình', 'note' => 'Arashiyama'],
            ['time' => '20:00', 'title' => 'Một góc thành phố về đêm', 'note' => 'Ponto-chō'],
        ];
    }

    private function guideCollections(): array
    {
        return [
            ['name' => 'Weekend Escapes', 'label' => 'Chuyến đi cuối tuần', 'desc' => 'Những hành trình ngắn, đủ để thở và quay về với năng lượng mới.', 'count' => 14, 'url' => route('destinations')],
            ['name' => 'Hidden Cafes', 'label' => 'Quán cà phê ẩn', 'desc' => 'Nơi ngồi lại, quan sát và ghi chép — không cần check-in.', 'count' => 22, 'url' => route('food')],
            ['name' => 'Local Culture', 'label' => 'Văn hóa địa phương', 'desc' => 'Chợ phiên, lễ hội, làng nghề và những nghi thức nhỏ.', 'count' => 18, 'url' => route('explore')],
            ['name' => 'Island Life', 'label' => 'Đảo & biển', 'desc' => 'Nhịp sống chậm, ánh sáng trong và đường bờ biển ít người.', 'count' => 11, 'url' => route('destinations')],
            ['name' => 'Road Trips', 'label' => 'Hành trình đường bộ', 'desc' => 'Cung đường, điểm dừng và những quãng đường đáng nhớ.', 'count' => 16, 'url' => route('diem-den')],
        ];
    }

    private function guideLatest(): array
    {
        return [
            ['cat' => 'City Guide', 'title' => 'Sáng sớm ở Hội An', 'excerpt' => 'Ánh đèn lồng mờ dần, tiếng xe đạp và mùi cà phê pha phin trên phố cổ.', 'time' => '8 phút', 'image' => 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?q=80&w=800&auto=format&fit=crop', 'tall' => true, 'url' => route('food.region', 'mien-trung')],
            ['cat' => 'Food', 'title' => 'Ăn sáng như người địa phương', 'excerpt' => 'Từ bún chả đến bánh mì — những quán nhỏ mở cửa sớm nhất.', 'time' => '6 phút', 'image' => null, 'tall' => false, 'url' => route('food')],
            ['cat' => 'Route', 'title' => 'Ba ngày ở Đà Lạt', 'excerpt' => 'Lịch trình nhẹ nhàng cho người muốn tránh đám đông.', 'time' => '12 phút', 'image' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=800&auto=format&fit=crop', 'tall' => false, 'url' => route('destinations')],
            ['cat' => 'Culture', 'title' => 'Chợ phiên cuối tuần', 'excerpt' => 'Cách chọn thời điểm, ứng xử và những món đáng thử.', 'time' => '7 phút', 'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=800&auto=format&fit=crop', 'tall' => true, 'url' => route('explore')],
            ['cat' => 'Stay', 'title' => 'Homestay trên núi', 'excerpt' => 'Ghi chú về chỗ ở, thời tiết và những điều nên mang theo.', 'time' => '5 phút', 'image' => null, 'tall' => false, 'url' => route('diem-den')],
            ['cat' => 'Island', 'title' => 'Phú Quốc không vội', 'excerpt' => 'Bãi biển phía tây, hải sản buổi chiều và hoàng hôn trên cát.', 'time' => '9 phút', 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop', 'tall' => false, 'url' => route('food.region', 'mien-nam')],
        ];
    }

    private function exploreFilters(): array
    {
        return [
            ['id' => 'all', 'label' => 'Tất cả'],
            ['id' => 'beach', 'label' => 'Biển đảo'],
            ['id' => 'city', 'label' => 'Thành phố'],
            ['id' => 'mountain', 'label' => 'Núi rừng'],
            ['id' => 'culture', 'label' => 'Văn hóa'],
            ['id' => 'food', 'label' => 'Ẩm thực'],
            ['id' => 'resort', 'label' => 'Nghỉ dưỡng'],
            ['id' => 'heritage', 'label' => 'Di sản'],
        ];
    }

    private function exploreMoods(): array
    {
        return [
            ['id' => 'slow', 'label' => 'Chậm lại', 'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=400&auto=format&fit=crop'],
            ['id' => 'sea', 'label' => 'Biển xanh', 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=400&auto=format&fit=crop'],
            ['id' => 'oldtown', 'label' => 'Thành phố cổ', 'image' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=400&auto=format&fit=crop'],
            ['id' => 'mountain', 'label' => 'Đường núi', 'image' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=400&auto=format&fit=crop'],
            ['id' => 'night', 'label' => 'Đêm đô thị', 'image' => 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?q=80&w=400&auto=format&fit=crop'],
            ['id' => 'culture', 'label' => 'Văn hóa bản địa', 'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=400&auto=format&fit=crop'],
        ];
    }

    private function exploreFeatured(): array
    {
        return [
            'title' => 'Mediterranean Summer',
            'subtitle' => 'Những vùng biển xanh, thị trấn trắng và buổi chiều rất chậm.',
            'image' => 'https://images.unsplash.com/photo-1449824913935-59a10b8d2000?q=80&w=1200&auto=format&fit=crop',
            'location' => 'Amalfi Coast, Italy',
        ];
    }

    private function exploreFeed(): array
    {
        return [
            ['category' => 'city', 'size' => 'portrait', 'location' => 'Kyoto, Japan', 'title' => 'Một buổi sáng ở Gion', 'meta' => 'City Guide · 12 ảnh', 'coords' => '35.0116° N, 135.7681° E', 'image' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=800&auto=format&fit=crop', 'description' => 'Sương mù mỏng trên mái ngói, tiếng geta vang vọng trên đá cuội — Gion trước khi đám đông đến.'],
            ['category' => 'beach', 'size' => 'square', 'location' => 'Phú Quốc, Vietnam', 'title' => 'Hoàng hôn phía tây', 'meta' => 'Island · 8 ảnh', 'coords' => '10.2899° N, 103.9840° E', 'image' => 'https://images.unsplash.com/photo-1507525428034-b723cf961d3e?q=80&w=800&auto=format&fit=crop', 'description' => 'Cát vàng, nước trong và bầu trời chuyển màu từ cam sang tím.'],
            ['category' => 'mountain', 'size' => 'landscape', 'location' => 'Hà Giang, Vietnam', 'title' => 'Đèo quanh co lúc bình minh', 'meta' => 'Road Trip · 16 ảnh', 'coords' => '23.3520° N, 104.9810° E', 'image' => 'https://images.unsplash.com/photo-1506905925346-21bda4d32df4?q=80&w=1200&auto=format&fit=crop', 'description' => 'Sương mù tan dần trên những cung đường đá vôi phía Bắc.'],
            ['category' => 'food', 'size' => 'portrait', 'location' => 'Bangkok, Thailand', 'title' => 'Chợ đêm và mùi gia vị', 'meta' => 'Food · 10 ảnh', 'coords' => null, 'image' => 'https://images.unsplash.com/photo-1504674900247-0877df9cc836?q=80&w=800&auto=format&fit=crop', 'description' => 'Khói bếp, ánh đèn vàng và những món ăn đường phố không cần tên.'],
            ['category' => 'culture', 'size' => 'square', 'location' => 'Luang Prabang, Laos', 'title' => 'Alms giving lúc bình minh', 'meta' => 'Culture · 6 ảnh', 'coords' => '19.8845° N, 102.1347° E', 'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?q=80&w=800&auto=format&fit=crop', 'description' => 'Nghi thức tĩnh lặng giữa phố cổ và sông Mekong.'],
            ['category' => 'heritage', 'size' => 'portrait', 'location' => 'Hội An, Vietnam', 'title' => 'Đèn lồng trên phố cổ', 'meta' => 'Heritage · 14 ảnh', 'coords' => '15.8801° N, 108.3380° E', 'image' => 'https://images.unsplash.com/photo-1559592413-7cec4d0cae2b?q=80&w=800&auto=format&fit=crop', 'description' => 'Ánh sáng vàng phản chiếu trên sông Thu Bồn khi đêm xuống.'],
            ['category' => 'city', 'size' => 'landscape', 'location' => 'Paris, France', 'title' => 'Một góc Marais', 'meta' => 'City Guide · 9 ảnh', 'coords' => '48.8566° N, 2.3522° E', 'image' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=800&auto=format&fit=crop', 'description' => 'Kiến trúc Haussmann, quán cà phê nhỏ và những buổi chiều không vội.'],
            ['category' => 'resort', 'size' => 'square', 'location' => 'Maldives', 'title' => 'Nước trong như thủy tinh', 'meta' => 'Resort · 11 ảnh', 'coords' => null, 'image' => 'https://images.unsplash.com/photo-1514282401047-d79a71a590e8?q=80&w=800&auto=format&fit=crop', 'description' => 'San hô, cát trắng và khoảng trống giữa biển và trời.'],
            ['category' => 'beach', 'size' => 'portrait', 'location' => 'Santorini, Greece', 'title' => 'Những mái vòm trắng', 'meta' => 'Island · 7 ảnh', 'coords' => '36.3932° N, 25.4615° E', 'image' => 'https://images.unsplash.com/photo-1613395877344-13d4a8e0d49e?q=80&w=800&auto=format&fit=crop', 'description' => 'Oia lúc hoàng hôn — một trong những khung cảnh được chụp nhiều nhất, vẫn đáng đến.'],
            ['category' => 'mountain', 'size' => 'square', 'location' => 'Sapa, Vietnam', 'title' => 'Ruộng bậc thang trong sương', 'meta' => 'Mountain · 13 ảnh', 'coords' => '22.3364° N, 103.8438° E', 'image' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=800&auto=format&fit=crop', 'description' => 'Mùa nước đổ — khi những thửa ruộng trở thành gương phản chiếu bầu trời.'],
            ['category' => 'food', 'size' => 'landscape', 'location' => 'Osaka, Japan', 'title' => 'Dotonbori về đêm', 'meta' => 'Food · 8 ảnh', 'coords' => null, 'image' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=800&auto=format&fit=crop', 'description' => 'Neon, takoyaki và nhịp sống đường phố sôi động nhất Nhật Bản.'],
            ['category' => 'culture', 'size' => 'portrait', 'location' => 'Chiang Mai, Thailand', 'title' => 'Đền chùa trong rừng', 'meta' => 'Culture · 5 ảnh', 'coords' => '18.7883° N, 98.9853° E', 'image' => 'https://images.unsplash.com/photo-1528181304800-259b08848526?q=80&w=800&auto=format&fit=crop', 'description' => 'Kiến trúc Lanna giữa cây xanh và hương nhang.'],
            ['category' => 'city', 'size' => 'square', 'location' => 'Seoul, Korea', 'title' => 'Hanok và hiện đại', 'meta' => 'City Guide · 10 ảnh', 'coords' => '37.5665° N, 126.9780° E', 'image' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=800&auto=format&fit=crop', 'description' => 'Bukchon — nơi mái ngói truyền thống nằm cạnh skyline đương đại.'],
            ['category' => 'heritage', 'size' => 'landscape', 'location' => 'Angkor, Cambodia', 'title' => 'Bình minh trên Angkor Wat', 'meta' => 'Heritage · 18 ảnh', 'coords' => '13.4125° N, 103.8670° E', 'image' => 'https://images.unsplash.com/photo-1548013146-72479768bada?q=80&w=1200&auto=format&fit=crop', 'description' => 'Phản chiếu trong hồ nước — khoảnh khắc huyền thoại của di sản thế giới.'],
            ['category' => 'beach', 'size' => 'portrait', 'location' => 'Bali, Indonesia', 'title' => 'Terrace và biển', 'meta' => 'Island · 9 ảnh', 'coords' => null, 'image' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=800&auto=format&fit=crop', 'description' => 'Ruộng bậc thang Ubud và bờ biển Uluwatu trong một hành trình.'],
            ['category' => 'resort', 'size' => 'square', 'location' => 'Đà Nẵng, Vietnam', 'title' => 'Bãi biển sáng sớm', 'meta' => 'Resort · 6 ảnh', 'coords' => '16.0544° N, 108.2022° E', 'image' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=800&auto=format&fit=crop', 'description' => 'My Khe trước khi du khách đến — chỉ tiếng sóng và cát ấm.'],
            ['category' => 'mountain', 'size' => 'portrait', 'location' => 'Dolomites, Italy', 'title' => 'Đỉnh núi và mây thấp', 'meta' => 'Mountain · 15 ảnh', 'coords' => '46.4102° N, 11.8440° E', 'image' => 'https://images.unsplash.com/photo-1464822759023-fed622ff2c3b?q=80&w=800&auto=format&fit=crop', 'description' => 'Dãy Alps phía Bắc Ý — địa hình kỳ vĩ và những con đường mòn yên tĩnh.'],
            ['category' => 'food', 'size' => 'square', 'location' => 'Hà Nội, Vietnam', 'title' => 'Phở sáng sớm', 'meta' => 'Food · 4 ảnh', 'coords' => '21.0285° N, 105.8542° E', 'image' => 'https://images.unsplash.com/photo-1559339352-11d035aa65de?q=80&w=800&auto=format&fit=crop', 'description' => 'Quán vỉa hè, hơi nước bốc lên và nhịp sống bắt đầu từ 6 giờ sáng.'],
            ['category' => 'city', 'size' => 'landscape', 'location' => 'New York, USA', 'title' => 'Brooklyn và cầu', 'meta' => 'City Guide · 12 ảnh', 'coords' => null, 'image' => 'https://images.unsplash.com/photo-1496442226666-8d4d0e62e6e9?q=80&w=1200&auto=format&fit=crop', 'description' => 'Skyline Manhattan từ DUMBO — góc nhìn kinh điển nhưng không bao giờ cũ.'],
            ['category' => 'culture', 'size' => 'portrait', 'location' => 'Marrakech, Morocco', 'title' => 'Chợ và gạch đỏ', 'meta' => 'Culture · 11 ảnh', 'coords' => '31.6295° N, 7.9811° W', 'image' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=800&auto=format&fit=crop', 'description' => 'Medina — mê cung hẻm nhỏ, đồ thủ công và trà bạc hà.'],
            ['category' => 'heritage', 'size' => 'square', 'location' => 'Huế, Vietnam', 'title' => 'Hoàng thành trong mưa', 'meta' => 'Heritage · 8 ảnh', 'coords' => '16.4637° N, 107.5909° E', 'image' => 'https://images.unsplash.com/photo-1501785888041-af3ef285b470?q=80&w=800&auto=format&fit=crop', 'description' => 'Kiến trúc triều Nguyễn — uy nghiêm và trầm lắng dưới mưa phố Huế.'],
        ];
    }

    private function destinationKyoto(): array
    {
        return [
            'slug' => 'kyoto',
            'label' => 'KYOTO, JAPAN',
            'name' => 'Kyoto',
            'tagline' => 'Thành phố của những con phố gỗ, trà nóng và buổi sáng rất chậm.',
            'country' => 'Japan',
            'best_time' => 'Mar–May / Oct–Nov',
            'mood' => 'Culture · Slow Travel · Heritage',
            'coords' => '35.0116° N, 135.7681° E',
            'hero_image' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=3200&auto=format&fit=crop',
            'facts' => [
                ['label' => 'Thời điểm đẹp', 'value' => 'Mar–May / Oct–Nov'],
                ['label' => 'Số ngày gợi ý', 'value' => '3–5 ngày'],
                ['label' => 'Chi phí tham khảo', 'value' => '$$$'],
                ['label' => 'Phù hợp với', 'value' => 'Văn hóa · Ăn uống · Đi bộ'],
                ['label' => 'Sân bay gần', 'value' => 'KIX / ITM'],
            ],
            'intro_title' => 'Kyoto không phải nơi để đi vội.',
            'intro' => [
                'Thành phố cố đô mang vẻ đẹp của những điều đã qua — mái ngói gỗ, hẻm đá, tiếng chuông đền vang vọng giữa buổi sáng mờ sương. Kyoto không cố gắng gây ấn tượng; nó để bạn tự tìm thấy nhịp của mình.',
                'Mùa xuân có hoa anh đào dọc sông Kamo; mùa thu nhuộm lá vàng khắp Higashiyama. Giữa hai mùa đẹp nhất là những buổi trưa yên trong quán trà, những con phố vắng và cảm giác thời gian chậm lại đáng kể.',
                'Đây là điểm đến dành cho người muốn đi sâu — không checklist, không vội vàng — chỉ quan sát, ăn đúng chỗ, và để một thành phố kể chuyện theo cách riêng.',
            ],
            'photos' => [
                ['src' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=1400&auto=format&fit=crop', 'cap' => 'Morning streets', 'large' => true],
                ['src' => 'https://images.unsplash.com/photo-1545569341-9eb8b30979d9?q=80&w=800&auto=format&fit=crop', 'cap' => 'Tea houses', 'large' => false],
                ['src' => 'https://images.unsplash.com/photo-1524413840807-0c3cb6fa808d?q=80&w=800&auto=format&fit=crop', 'cap' => 'Temple walk', 'large' => false],
                ['src' => 'https://images.unsplash.com/photo-1555992336-fb0d2c5bfc3a?q=80&w=800&auto=format&fit=crop', 'cap' => 'Local market', 'large' => false],
            ],
            'experiences' => [
                ['title' => 'Đi bộ ở Gion vào sáng sớm', 'desc' => 'Trước khi đám đông đến — chỉ tiếng geta, hơi ẩm và những con phố gỗ chưa bật đèn.', 'img' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=600&auto=format&fit=crop'],
                ['title' => 'Uống matcha trong một quán trà cũ', 'desc' => 'Ngồi lâu, quan sát và để vị trà đắng tan chậm trên lưỡi.', 'img' => 'https://images.unsplash.com/photo-1545569341-9eb8b30979d9?q=80&w=600&auto=format&fit=crop'],
                ['title' => 'Đi tàu đến Arashiyama', 'desc' => 'Rừng tre, sông Hozu và nhịp sống chậm hơn trung tâm thành phố.', 'img' => 'https://images.unsplash.com/photo-1524413840807-0c3cb6fa808d?q=80&w=600&auto=format&fit=crop'],
                ['title' => 'Ăn tối ở một con hẻm yên tĩnh', 'desc' => 'Ponto-chō về đêm — đèn lồng, mùi nướng và không gian vừa đủ riêng tư.', 'img' => 'https://images.unsplash.com/photo-1590559899731-a382839d82de?q=80&w=600&auto=format&fit=crop'],
            ],
            'route_title' => '24 giờ ở Kyoto',
            'route' => [
                ['time' => '08:00', 'title' => 'Morning coffee', 'note' => 'Quán nhỏ gần Kamo River'],
                ['time' => '10:00', 'title' => 'Temple walk', 'note' => 'Higashiyama'],
                ['time' => '13:00', 'title' => 'Local lunch', 'note' => 'Nishiki Market'],
                ['time' => '16:00', 'title' => 'Riverside walk', 'note' => 'Kamo River'],
                ['time' => '20:00', 'title' => 'Dinner alley', 'note' => 'Ponto-chō'],
            ],
            'route_image' => 'https://images.unsplash.com/photo-1545569341-9eb8b30979d9?q=80&w=900&auto=format&fit=crop',
            'areas' => [
                ['name' => 'Gion', 'desc' => 'Phố cổ, geisha district và những buổi tối đèn lồng.'],
                ['name' => 'Higashiyama', 'desc' => 'Đền chùa, phố đá và view toàn thành phố.'],
                ['name' => 'Arashiyama', 'desc' => 'Rừng tre, cầu Togetsukyo và chùa Tenryū-ji.'],
                ['name' => 'Nishiki Market', 'desc' => 'Chợ ẩm thực — nơi Kyoto ăn sáng và mua quà.'],
                ['name' => 'Kamo River', 'desc' => 'Bờ sông để đi bộ, ngồi và ngắm hoàng hôn.'],
            ],
            'guides' => [
                ['cat' => 'City Guide', 'title' => '24 giờ ở Kyoto', 'url' => route('guide')],
                ['cat' => 'Food', 'title' => 'Ăn gì ở Kyoto', 'url' => route('guide')],
                ['cat' => 'Culture', 'title' => 'Những ngôi đền nên ghé', 'url' => route('guide')],
                ['cat' => 'Stay', 'title' => 'Ở đâu để đi bộ nhiều nhất', 'url' => route('guide')],
            ],
            'related' => [
                ['name' => 'Osaka', 'country' => 'Japan', 'mood' => 'Food · City', 'img' => 'https://images.unsplash.com/photo-1590559899731-a382839d82de?q=80&w=800&auto=format&fit=crop'],
                ['name' => 'Nara', 'country' => 'Japan', 'mood' => 'Heritage · Nature', 'img' => 'https://images.unsplash.com/photo-1524413840807-0c3cb6fa808d?q=80&w=800&auto=format&fit=crop'],
                ['name' => 'Tokyo', 'country' => 'Japan', 'mood' => 'Urban · Culture', 'img' => 'https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?q=80&w=800&auto=format&fit=crop'],
                ['name' => 'Kanazawa', 'country' => 'Japan', 'mood' => 'Slow · Crafts', 'img' => 'https://images.unsplash.com/photo-1493976040374-85c8e12f0c0e?q=80&w=800&auto=format&fit=crop'],
            ],
        ];
    }
}
