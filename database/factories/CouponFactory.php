<?php

namespace Database\Factories;

use App\Models\Coupon;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Coupon>
 */
class CouponFactory extends Factory
{
    protected $model = Coupon::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $faker = \Faker\Factory::create();

        // Get a random user ID with type 'vendor' from the users table
        $vendor = User::where('type', 'vendor')->inRandomOrder()->first();

        return [
            'coupon_image' => $faker->imageUrl(), // Generate a placeholder image URL
            'title_of_offer' => $faker->sentence,
            'coupon_code' => strtoupper($faker->lexify('??????')), // Generate a random alphanumeric coupon code
            'campaign_code' => $faker->optional()->lexify('???'), // Generate a random campaign code with a chance of being null
            'offer_validity' => $faker->dateTimeBetween('now', '+1 year'), // Generate a random validity date within a year
            'description' => $faker->paragraph,
            'instant_discount' => $faker->optional()->numberBetween(5, 50), // Generate a random instant discount value if present
            'percentage_discount' => $faker->optional()->numberBetween(5, 50), // Generate a random percentage discount value if present
            'cashback_value' => $faker->optional()->numberBetween(10, 100), // Generate a random cashback value if present
            'coupon_created_by' => $vendor->id,
            'coupon_country' => $vendor->country,
            'status' => $faker->randomElement(['0', '1']), // Randomly set the status as '0' or '1'
            'redeem_count' => $faker->optional()->numberBetween(0, 100), // Generate a random redeem count if present
            'created_at' => $faker->dateTimeBetween('-1 year', 'now'), // Generate a random creation date within a year
            'updated_at' => $faker->dateTimeBetween('-1 year', 'now'), // Generate a random update date within a year
        ];
    }
}
