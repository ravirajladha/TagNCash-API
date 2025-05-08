<?php

namespace App\Console\Commands;

use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CouponDeactivationUSA extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'coupondeactive:usa';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command will deactivate all the expired coupons in USA';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $coupons = Coupon::where('coupon_country', "USA")->get();
        Log::info(["coupon info" => $coupons]);
        if($coupons->isNotEmpty()) {
            foreach($coupons as $coupon) {
                $expiryDateTime = Carbon::parse($coupon->offer_validity);
                $expiryDateTime->setTime(0, 0, 0); // Setting expiry time to 6 PM

                // Check if expiry date and time is in the past
                if (Carbon::now()->gte($expiryDateTime)) {
                    // Expired, deactivate the coupon
                    $coupon->status = 0;
                    $coupon->save();
                }
            }
        }
    }
}
