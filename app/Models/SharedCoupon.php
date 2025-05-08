<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedCoupon extends Model
{
    use HasFactory;

    protected $fillable = [
        "coupon_id",
        "to_user_id",
        "from_user_id",
        "shared_to",
        "redeemed",
        "redeemed_at",
        "status",
    ];

    public function fromUser() 
    {
        return $this->belongsTo(User::class, 'from_user_id');
    }

    public function toUser() {
        return $this->belongsTo(User::class, 'to_user_id');
    }

    public function coupon() {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    }
}
