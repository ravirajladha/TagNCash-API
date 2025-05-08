<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;

    protected $fillable = [
        "coupon_image",       
        "title_of_offer",     
        "coupon_code",    
        "campaign_code",      
        "offer_validity",     
        "description",        
        "instant_discount",   
        "percentage_discount",
        "cashback_value",
        "coupon_country",
        "coupon_created_by",  
        "status",
        "redeem_count",  
    ];

    public function redeemed() {
        return $this->hasOne(RedeemedCoupon::class, "coupon_id");
    }
    
    public function vendor() 
    {
        return $this->belongsTo(User::class, "coupon_created_by");
    }
}
