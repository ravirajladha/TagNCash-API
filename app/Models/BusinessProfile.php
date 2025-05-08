<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        "user_id",     
        "service_type",
        "business_name",  
        "business_email", 
        "business_phone", 
        "address",        
        "city",
        "state",
        "country",        
        "pincode",        
        "tax_id",
        "registration_id",
        "agreement", 
        "status",
        "hide"
    ];

    public function vendor() {
        return $this->belongsTo(User::class, "user_id");
    }

    public function coupons() {
        return $this->hasMany(Coupon::class, "coupon_created_by", "user_id");
    }
}
