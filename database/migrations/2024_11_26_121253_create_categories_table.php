<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {
            $table->id('tcat_id');  // primary key
            $table->text('tcat_name');
            $table->text('banner');
            $table->text('cbanner');
            $table->text('cimage');
            $table->text('lcat_id');
            $table->text('mcat_id');
            $table->text('content');
            $table->text('meta_title');
            $table->text('meta_keyword');
            $table->text('meta_description');
            $table->text('show_on_menu');
            $table->text('slug');
            $table->text('content_add');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
