<?php

namespace Database\Seeders;

use App\Models\BusinessProfile;
use Database\Factories\BusinessProfileFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BusinessProfileFactory::new()->count(10)->create();
    }
}
