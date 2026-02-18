<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('blog_category_id')->nullable()->constrained('post_categories')->nullOnDelete();
            // Polymorphic author: any guard (admin, hotel, guide, etc.)
            $table->nullableMorphs('author');
            $table->string('title', 255);
            $table->string('slug', 280)->unique();
            $table->text('excerpt')->nullable();

            // Imagen destacada (featured image) — igual que WordPress
            $table->foreignId('featured_image_id')
                ->nullable()
                ->constrained('media')
                ->nullOnDelete();


            $table->longText('content');
            $table->enum('status', ['draft', 'published', 'scheduled', 'archived'])->default('draft');
            $table->timestamp('published_at')->nullable();
            // SEO
            $table->string('meta_title', 160)->nullable();
            $table->string('meta_description', 320)->nullable();
            $table->string('og_image', 500)->nullable();
            // Counters
            $table->unsignedInteger('views_count')->default(0);
            $table->unsignedInteger('likes_count')->default(0);
            $table->unsignedSmallInteger('reading_time')->nullable()->comment('minutes');
            // Optional: link to destination
            $table->foreignId('destination_id')->nullable()->constrained('destinations')->nullOnDelete();
            $table->boolean('allow_comments')->default(true);
            $table->boolean('is_featured')->default(false);

            $table->foreignId('admin_id')->constrained('admins')->onDelete('cascade');



            $table->timestamps();
            $table->softDeletes();

            $table->index(['status', 'published_at']);


        });
    }

    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
