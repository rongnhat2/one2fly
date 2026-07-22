<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('destinations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('country')->nullable();
            $table->string('region')->nullable();
            $table->string('province_or_city')->nullable();
            $table->string('short_description', 500)->nullable();
            $table->longText('full_description')->nullable();
            $table->string('hero_image')->nullable();
            $table->string('cover_image')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('best_season')->nullable();
            $table->string('recommended_duration')->nullable();
            $table->string('budget_level', 50)->nullable();
            $table->string('travel_style')->nullable();
            $table->string('weather_summary')->nullable();
            $table->string('language_summary')->nullable();
            $table->string('currency_summary')->nullable();
            $table->string('transport_summary')->nullable();
            $table->string('suitable_for')->nullable();
            $table->text('editor_quote')->nullable();
            $table->string('status', 30)->default('draft');
            $table->timestamp('published_at')->nullable();
            $table->string('seo_title')->nullable();
            $table->string('seo_description', 500)->nullable();
            $table->timestamps();
        });

        Schema::create('destination_experiences', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->string('category')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('destination_itineraries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->unsignedInteger('day_number')->nullable();
            $table->string('title');
            $table->string('image')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('destination_itinerary_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('itinerary_id')->nullable();
            $table->string('time_label')->nullable();
            $table->text('content');
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('destination_tips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->string('title');
            $table->text('content')->nullable();
            $table->string('type', 50)->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('explore_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type', 50)->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('moods', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('image')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('explore_items', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('location_name')->nullable();
            $table->string('short_description', 500)->nullable();
            $table->string('meta_text')->nullable();
            $table->string('image')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('display_size', 30)->nullable();
            $table->string('content_type', 50)->nullable();
            $table->unsignedBigInteger('related_destination_id')->nullable();
            $table->unsignedBigInteger('related_article_id')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('status', 30)->default('draft');
            $table->timestamps();
        });

        Schema::create('issues', function (Blueprint $table) {
            $table->id();
            $table->string('issue_number', 20)->nullable();
            $table->string('title');
            $table->string('season')->nullable();
            $table->string('season_name')->nullable();
            $table->string('year', 10)->nullable();
            $table->text('intro')->nullable();
            $table->text('description')->nullable();
            $table->unsignedInteger('page_count')->nullable();
            $table->unsignedInteger('story_count')->nullable();
            $table->string('issue_type', 100)->nullable();
            $table->string('cover_image')->nullable();
            $table->string('pdf_file')->nullable();
            $table->string('coordinates_label')->nullable();
            $table->text('editor_quote')->nullable();
            $table->longText('theme_description')->nullable();
            $table->json('editor_note')->nullable();
            $table->json('keywords')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('status', 30)->default('draft');
            $table->string('seo_title')->nullable();
            $table->string('seo_description', 500)->nullable();
            $table->timestamps();
        });

        Schema::create('issue_contents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('issue_id')->nullable();
            $table->string('category')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('reading_time', 50)->nullable();
            $table->unsignedInteger('start_page')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->unsignedBigInteger('related_article_id')->nullable();
            $table->timestamps();
        });

        Schema::create('issue_contributors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('issue_id')->nullable();
            $table->string('role')->nullable();
            $table->string('names')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('food_regions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('hero_label')->nullable();
            $table->string('hero_title')->nullable();
            $table->string('hero_tagline', 500)->nullable();
            $table->string('hero_image')->nullable();
            $table->string('coordinates_label')->nullable();
            $table->string('overview_heading')->nullable();
            $table->longText('overview_content')->nullable();
            $table->json('overview_paragraphs')->nullable();
            $table->json('keywords')->nullable();
            $table->json('hero_stats')->nullable();
            $table->string('status', 30)->default('draft');
            $table->string('seo_title')->nullable();
            $table->string('seo_description', 500)->nullable();
            $table->timestamps();
        });

        Schema::create('dishes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('food_region_id')->nullable();
            $table->string('province_or_city')->nullable();
            $table->string('short_description', 500)->nullable();
            $table->string('price_range')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->string('status', 30)->default('draft');
            $table->timestamps();
        });

        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->unsignedBigInteger('food_region_id')->nullable();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->string('address')->nullable();
            $table->string('district')->nullable();
            $table->string('province_or_city')->nullable();
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->string('price_range')->nullable();
            $table->decimal('rating', 3, 1)->nullable();
            $table->string('opening_hours')->nullable();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->string('map_url')->nullable();
            $table->string('price_level', 20)->nullable();
            $table->string('status', 30)->default('draft');
            $table->timestamps();
        });

        Schema::create('price_guides', function (Blueprint $table) {
            $table->id();
            $table->string('context_type', 50)->nullable();
            $table->unsignedBigInteger('context_id')->nullable();
            $table->string('category')->nullable();
            $table->string('price_range')->nullable();
            $table->unsignedInteger('sort_order')->default(0);
            $table->timestamps();
        });

        Schema::create('articles', function (Blueprint $table) {
            $table->id();
            $table->string('type', 50)->nullable();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable();
            $table->longText('content')->nullable();
            $table->string('featured_image')->nullable();
            $table->unsignedBigInteger('author_id')->nullable();
            $table->string('reading_time', 50)->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('status', 30)->default('draft');
            $table->string('seo_title')->nullable();
            $table->string('seo_description', 500)->nullable();
            $table->timestamps();
        });

        Schema::create('media_assets', function (Blueprint $table) {
            $table->id();
            $table->string('file_path');
            $table->string('file_type', 50)->nullable();
            $table->string('alt_text')->nullable();
            $table->string('caption')->nullable();
            $table->string('credit')->nullable();
            $table->unsignedInteger('width')->nullable();
            $table->unsignedInteger('height')->nullable();
            $table->unsignedBigInteger('uploaded_by')->nullable();
            $table->timestamps();
        });

        Schema::create('tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('type', 50)->nullable();
            $table->timestamps();
        });

        Schema::create('people', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('bio')->nullable();
            $table->string('avatar')->nullable();
            $table->string('role')->nullable();
            $table->timestamps();
        });

        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('short_description', 500)->nullable();
            $table->longText('full_description')->nullable();
            $table->string('image')->nullable();
            $table->string('provider_name')->nullable();
            $table->unsignedBigInteger('destination_id')->nullable();
            $table->timestamp('start_at')->nullable();
            $table->timestamp('end_at')->nullable();
            $table->string('cta_text')->nullable();
            $table->string('cta_url')->nullable();
            $table->string('status', 30)->default('draft');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('offers');
        Schema::dropIfExists('people');
        Schema::dropIfExists('tags');
        Schema::dropIfExists('media_assets');
        Schema::dropIfExists('articles');
        Schema::dropIfExists('price_guides');
        Schema::dropIfExists('restaurants');
        Schema::dropIfExists('dishes');
        Schema::dropIfExists('food_regions');
        Schema::dropIfExists('issue_contributors');
        Schema::dropIfExists('issue_contents');
        Schema::dropIfExists('issues');
        Schema::dropIfExists('explore_items');
        Schema::dropIfExists('moods');
        Schema::dropIfExists('explore_categories');
        Schema::dropIfExists('destination_tips');
        Schema::dropIfExists('destination_itinerary_items');
        Schema::dropIfExists('destination_itineraries');
        Schema::dropIfExists('destination_experiences');
        Schema::dropIfExists('destinations');
    }
};
