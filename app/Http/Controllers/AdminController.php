<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AdminController extends Controller
{
    public function dashboard(): View
    {
        return $this->screen(
            'dashboard',
            'Dashboard',
            'Theo dõi nhanh toàn bộ nội dung du lịch, ấn phẩm và ưu đãi trong một không gian sáng, gọn và dễ thao tác.'
        );
    }

    public function destinations(): View
    {
        return $this->screen(
            'destinations',
            'Điểm đến',
            'Quản lý điểm đến, mô tả, mùa đẹp, trạng thái xuất bản và dữ liệu nền cho các trang client.'
        );
    }

    public function explore(): View
    {
        return $this->screen(
            'explore',
            'Khám phá',
            'Theo dõi feed khám phá, visual tile, category và các item giàu hình ảnh cho trang masonry client side.'
        );
    }

    public function issues(): View
    {
        return $this->screen(
            'issues',
            'Ấn phẩm số',
            'Quản lý e-magazine, số phát hành, PDF đọc online và các mục lục biên tập.'
        );
    }

    public function foodRegions(): View
    {
        return $this->screen(
            'food-regions',
            'Ẩm thực vùng miền',
            'Quản lý khối ẩm thực theo vùng, món ăn, quán ăn và nội dung cẩm nang địa phương.'
        );
    }

    public function articles(): View
    {
        return $this->screen(
            'articles',
            'Bài viết',
            'Tập trung các bài cẩm nang, story, route, feature và nội dung biên tập dùng lại ở nhiều màn.'
        );
    }

    public function offers(): View
    {
        return $this->screen(
            'offers',
            'Ưu đãi',
            'Theo dõi ưu đãi du lịch, CTA, thời gian áp dụng và trạng thái hiển thị trên trang chủ.'
        );
    }

    private function screen(string $pageKey, string $pageTitle, string $pageDescription): View
    {
        $primaryActions = [
            'dashboard' => 'Tạo nhanh',
            'destinations' => 'Thêm điểm đến',
            'explore' => 'Thêm item',
            'issues' => 'Thêm ấn phẩm',
            'food-regions' => 'Thêm vùng',
            'articles' => 'Thêm bài viết',
            'offers' => 'Thêm ưu đãi',
        ];

        return view('admin.screen', [
            'activeNav' => $pageKey,
            'pageKey' => $pageKey,
            'pageTitle' => $pageTitle,
            'pageDescription' => $pageDescription,
            'pageActionLabel' => $primaryActions[$pageKey] ?? 'Thêm mới',
        ]);
    }
}
