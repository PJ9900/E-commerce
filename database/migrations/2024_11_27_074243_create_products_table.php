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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->decimal('price', 8, 2);
            $table->integer('stock_quantity');
            $table->timestamps();

            // Add new product-related columns
            $table->string('p_sku', 255)->nullable();
            $table->integer('variant')->nullable();
            $table->string('p_featured_photo', 255)->nullable();
            $table->text('p_short_description')->nullable();
            $table->text('p_long_description');
            $table->text('additional_info')->nullable();
            $table->boolean('p_is_featured')->nullable();
            $table->boolean('p_is_active')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->text('slug')->nullable();

            // Set foreign key constraint
            // $table->foreign('category_id')
            //     ->references('tcat_id') // references 'tcat_id' from categories
            //     ->on('categories')
            //     ->onDelete('set null'); // delete action for foreign key (set to null)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop the foreign key and category_id column
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });

        Schema::dropIfExists('products');
    }
};
