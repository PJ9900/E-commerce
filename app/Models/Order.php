<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Define the table name (optional if it matches the plural form of model)
    protected $table = 'orders';

    // Mass assignable fields
    protected $fillable = [
        'product_id',
        'product_name',
        'discount',
        'size',
        'color',
        'sku',
        'quantity',
        'unit_price',
        'message',
        'billing_name',
        'billing_email',
        'billing_company_name',
        'billing_gst',
        'billing_state',
        'billing_pincode',
        'payment_id',
        'user_id',
        'address',
        'aws_no',
        'delivery_link',
        'OrderStatus',
        'rtd',
        'delivery_date',
    ];

    // Define relationships (optional, depending on your application's needs)

    // Product relationship
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    // User relationship
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Payment relationship (if needed)
    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
