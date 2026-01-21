<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('excerpt')->nullable(); // Short description/summary
            $table->longText('body'); // Main blog content
            $table->json('body_images')->nullable(); // Array of image paths for images in blog body
            $table->string('featured_image')->nullable(); // Main/cover image for the blog
            $table->foreignId('author_id')->nullable()->constrained('users')->onDelete('set null'); // Blog author
            $table->string('category')->nullable(); // Blog category
            $table->json('tags')->nullable(); // Array of tags
            $table->string('meta_title')->nullable(); // SEO meta title
            $table->text('meta_description')->nullable(); // SEO meta description
            $table->integer('views')->default(0); // View count
            $table->enum('status', ['draft', 'published', 'archived'])->default('draft');
            $table->timestamp('published_at')->nullable(); // Publication date
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blogs');
    }
};
