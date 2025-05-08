<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_image')->nullable();
            $table->string('title_of_offer');
            $table->string('coupon_code');
            $table->string('campaign_code')->nullable();
            $table->dateTime('offer_validity')->nullable();
            $table->longText('description');
            $table->string('instant_discount')->nullable();
            $table->string('percentage_discount')->nullable();
            $table->string('cashback_value')->nullable();
            $table->unsignedBigInteger('coupon_created_by'); //this belongs to users table id coulumn where type_column is vendor
            $table->enum('coupon_country', ['India', 'USA']);// this is coupon_created_by's country
            $table->string('status', 10)->default('1');
            $table->string('redeem_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
