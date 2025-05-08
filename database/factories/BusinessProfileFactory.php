<?php

namespace Database\Factories;

use App\Models\BusinessProfile;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BusinessProfile>
 */
class BusinessProfileFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $faker = \Faker\Factory::create();

        // Get a random user ID with type 'vendor' from the users table
        $vendor = User::where('type', 'vendor')->inRandomOrder()->first();

        // Check if the vendor already has a business profile
        $existingProfile = BusinessProfile::where('user_id', $vendor->id)->exists();

        if ($existingProfile) {
            // If a profile already exists, return an empty array to prevent duplication
            return [];
        }

        return [
            'user_id' => $vendor->id,
            'business_name' => $faker->company,
            'business_email' => $faker->unique()->safeEmail,
            'business_phone' => $faker->unique()->phoneNumber,
            'address' => $faker->address,
            'city' => $faker->city,
            'state' => $faker->state,
            'country' => $faker->country,
            'pincode' => $faker->postcode,
            'tax_id' => $faker->uuid,
            'registration_id' => $faker->uuid,
            'agreement' => $faker->text,
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
