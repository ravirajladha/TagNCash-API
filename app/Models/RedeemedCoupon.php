<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RedeemedCoupon extends Model
{
    use HasFactory;

    protected $fillable = [
        "coupon_id",  
        "redeemed_by",
        "redeem_otp"
    ];

    protected $casts = [
        "redeemed_by" => "array",
        "redeem_otp" => "array",
    ];

    public function coupon() {
        return $this->belongsTo(Coupon::class, "coupon_id");
    }

    
}
