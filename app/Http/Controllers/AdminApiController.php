<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class AdminApiController extends Controller
{
    public function dashboard(): JsonResponse
    {
        $stats = [
            [
                'label' => 'Điểm đến',
                'value' => $this->count('destinations'),
                'accent' => 'sky',
            ],
            [
                'label' => 'Feed khám phá',
                'value' => $this->count('explore_items'),
                'accent' => 'emerald',
            ],
            [
                'label' => 'Ấn phẩm số',
                'value' => $this->count('issues'),
                'accent' => 'amber',
            ],
            [
                'label' => 'Bài viết',
                'value' => $this->count('articles'),
                'accent' => 'violet',
            ],
            [
                'label' => 'Ưu đãi',
                'value' => $this->count('offers'),
                'accent' => 'rose',
            ],
        ];

        return response()->json([
            'success' => true,
            'data' => [
                'stats' => $stats,
                'latest_destinations' => $this->latest('destinations', ['id', 'name', 'slug', 'status', 'updated_at']),
                'latest_issues' => $this->latest('issues', ['id', 'title', 'issue_number', 'status', 'published_at', 'updated_at']),
                'latest_articles' => $this->latest('articles', ['id', 'title', 'type', 'status', 'published_at', 'updated_at']),
            ],
        ]);
    }

    public function destinations(): JsonResponse
    {
        return $this->listing(
            'destinations',
            ['id', 'name', 'slug', 'country', 'province_or_city', 'travel_style', 'best_season', 'status', 'updated_at']
        );
    }

    public function explore(): JsonResponse
    {
        return $this->listing(
            'explore_items',
            ['id', 'title', 'slug', 'location_name', 'content_type', 'display_size', 'status', 'published_at', 'updated_at']
        );
    }

    public function issues(): JsonResponse
    {
        return $this->listing(
            'issues',
            ['id', 'title', 'issue_number', 'season', 'year', 'page_count', 'status', 'published_at', 'updated_at']
        );
    }

    public function foodRegions(): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => [
                'regions' => $this->rows(
                    'food_regions',
                    ['id', 'name', 'slug', 'status', 'updated_at']
                ),
                'dishes' => $this->rows(
                    'dishes',
                    ['id', 'name', 'province_or_city', 'price_range', 'is_featured', 'status', 'updated_at'],
                    12
                ),
                'restaurants' => $this->rows(
                    'restaurants',
                    ['id', 'name', 'province_or_city', 'price_range', 'rating', 'status', 'updated_at'],
                    12
                ),
            ],
            'meta' => [
                'total_regions' => $this->count('food_regions'),
                'total_dishes' => $this->count('dishes'),
                'total_restaurants' => $this->count('restaurants'),
            ],
        ]);
    }

    public function articles(): JsonResponse
    {
        return $this->listing(
            'articles',
            ['id', 'title', 'slug', 'type', 'reading_time', 'status', 'published_at', 'updated_at']
        );
    }

    public function offers(): JsonResponse
    {
        return $this->listing(
            'offers',
            ['id', 'title', 'slug', 'provider_name', 'cta_text', 'start_at', 'end_at', 'status', 'updated_at']
        );
    }

    private function listing(string $table, array $columns): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data' => $this->rows($table, $columns),
            'meta' => [
                'total' => $this->count($table),
            ],
        ]);
    }

    private function latest(string $table, array $columns)
    {
        return $this->rows($table, $columns, 5);
    }

    private function rows(string $table, array $columns, int $limit = 24)
    {
        if (! Schema::hasTable($table)) {
            return [];
        }

        return DB::table($table)
            ->select($columns)
            ->orderByDesc('id')
            ->limit($limit)
            ->get();
    }

    private function count(string $table): int
    {
        if (! Schema::hasTable($table)) {
            return 0;
        }

        return DB::table($table)->count();
    }
}
