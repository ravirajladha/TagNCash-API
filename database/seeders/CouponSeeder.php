<?php

namespace Database\Seeders;

use Database\Factories\CouponFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CouponSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        CouponFactory::new()->count(9)->create();
    }
}
