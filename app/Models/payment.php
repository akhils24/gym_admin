<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'amount',
        'payment_method',
        'validity',
        'payment_date',
        'expiry_date',
    ];

    protected $table ="payments";
    
     public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
