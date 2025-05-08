<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        "notifiable_id",
        "title",
        "message",
        "read",
        "notification_by",
        "coupon_id"
    ];

    public function coupon() {
        return $this->belongsTo(Coupon::class, 'coupon_id');
    } 
}
