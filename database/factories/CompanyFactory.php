<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $cname = fake()->company;
        return [
            'user_id' => User::all()->random()->id,
            'cname' => $cname,
            'slug' => Str::slug($cname),
            'address' => fake()->address,
            'phone' => fake()->phoneNumber,
            'website' => fake()->domainName,
            'logo' => '',
            'cover_photo' => '',
            'slogan' => 'text-text and text',
            'description' => fake()->paragraph(rand(1, 20)),
        ];
    }
}
