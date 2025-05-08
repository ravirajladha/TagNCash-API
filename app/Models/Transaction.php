<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        "vendor_id",   
        "coupon_id",   
        "from_user_id",
        "to_user_id",  
        "reward",      
        "bill_value",  
        "discount",    
        "date",
    ];

    public function coupon() 
    {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }

    public function fromUser() 
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser() 
    {
        return $this->belongsTo(User::class, 'to_user_id');
    }
}
