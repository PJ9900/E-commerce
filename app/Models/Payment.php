<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    // The table associated with the model
    protected $table = 'payments';

    // The attributes that are mass assignable
    protected $fillable = [
        'user_id',
        'user_name',
        'user_email',
        'txnid',
        'paid_amount',
        'card_number',
        'card_cvv',
        'card_month',
        'card_year',
        'bank_transaction_info',
        'payment_method',
        'payment_status',
        'shipping_status',
        'address',
        'state',
        'city',
        'pincode',
        'customer_phone',
        'payment_option',
        'add_info'
    ];

    // Define the relationship between Payment and User
    public function user()
    {
        return $this->belongsTo(User::class);  // Each payment belongs to one user
    }
}
