<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('filament_projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->longText('long_description');
            $table->string('image')->nullable();
            $table->year('year');
            $table->string('role');
            $table->string('duration');
            $table->string('live_url')->nullable();
            $table->string('github_url')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_published')->default(true);
            $table->integer('order')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });

       Schema::create('project_tags', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('color')->nullable();
            $table->timestamps();
        });

        Schema::create('project_project_tag', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filament_project_id')->constrained()->onDelete('cascade');
            $table->foreignId('project_tag_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });

        Schema::create('project_features', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filament_project_id')->constrained()->onDelete('cascade');
            $table->text('feature');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('project_challenges', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filament_project_id')->constrained()->onDelete('cascade');
            $table->text('challenge');
            $table->integer('order')->default(0);
            $table->timestamps();
        });

        Schema::create('project_galleries', function (Blueprint $table) {
            $table->id();
            $table->foreignId('filament_project_id')->constrained()->onDelete('cascade');
            $table->string('image_path');
            $table->string('caption')->nullable();
            $table->integer('order')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('project_galleries');
        Schema::dropIfExists('project_challenges');
        Schema::dropIfExists('project_features');
        Schema::dropIfExists('project_project_tag');
        Schema::dropIfExists('project_tags');
        Schema::dropIfExists('filament_projects');
    }
};
