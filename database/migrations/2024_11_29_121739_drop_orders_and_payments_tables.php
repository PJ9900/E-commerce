<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropOrdersAndPaymentsTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Drop the 'orders' and 'payments' tables
        Schema::dropIfExists('orders');
        Schema::dropIfExists('payments');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // Optionally, you can reverse the migration and recreate the tables
        // if you need to roll back. You can define the structure of the tables here.

        // Example: Recreate the 'orders' table
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->decimal('total_amount', 8, 2);
            $table->timestamps();
        });

        // Example: Recreate the 'payments' table
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_id')->constrained()->onDelete('cascade');
            $table->decimal('amount_paid', 8, 2);
            $table->timestamps();
        });
    }
}
