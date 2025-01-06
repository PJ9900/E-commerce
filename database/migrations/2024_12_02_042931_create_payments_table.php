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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();  // Auto-incrementing primary key
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // Assuming there's a 'users' table
            $table->string('user_name');
            $table->string('user_email');
            $table->string('txnid'); // Transaction ID
            $table->decimal('paid_amount', 10, 2); // Amount paid
            $table->string('card_number');
            $table->string('card_cvv', 4);  // CVV should be a 3 or 4-digit string
            $table->string('card_month', 2); // Card expiration month
            $table->string('card_year', 4);  // Card expiration year
            $table->text('bank_transaction_info')->nullable();
            $table->string('payment_method'); // E.g., 'Credit Card', 'PayPal', etc.
            $table->enum('payment_status', ['pending', 'completed', 'failed', 'refunded']);
            $table->enum('shipping_status', ['pending', 'shipped', 'delivered', 'returned']);
            $table->string('address');
            $table->string('state');
            $table->string('city');
            $table->string('pincode', 6); // Assuming PIN code is a 6-digit string
            $table->string('customer_phone');
            $table->string('payment_option'); // E.g., 'installment', 'full payment'
            $table->text('add_info')->nullable();  // Additional information
            $table->timestamps(); // Created at and updated at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
