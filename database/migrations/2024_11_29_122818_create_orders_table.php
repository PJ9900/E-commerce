<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id(); // Creates an auto-incrementing primary key for 'id'
            $table->integer('product_id'); // Assuming product_id is a foreign key from a products table
            $table->string('product_name');
            $table->decimal('discount', 8, 2)->nullable(); // Discount can be null
            $table->string('size');
            $table->string('color');
            $table->string('sku');
            $table->integer('quantity');
            $table->decimal('unit_price', 8, 2);
            $table->text('message')->nullable(); // Message can be null
            $table->integer('payment_id'); // Assuming payment_id is a foreign key from a payments table
            $table->string('billing_name');
            $table->string('billing_email');
            $table->string('billing_company_name')->nullable();
            $table->string('billing_gst')->nullable();
            $table->string('billing_state');
            $table->string('billing_pincode');
            $table->timestamp('OrderDate');
            $table->integer('user_id'); // Assuming user_id is a foreign key from a users table
            $table->string('address');
            $table->string('aws_no')->nullable();
            $table->string('delivery_link')->nullable();
            $table->enum('OrderStatus', ['pending', 'completed', 'canceled', 'shipped'])->default('pending');
            $table->timestamp('rtd')->nullable(); // Time of delivery
            $table->timestamps(); // Created at and updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
