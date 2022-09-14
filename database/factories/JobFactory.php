<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Company;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Job>
 */
class JobFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->text();
        return [
            'user_id' => User::all()->random()->id,
            'company_id' => Company::all()->random()->id,
            'category_id' => Category::all()->random()->id,
            'title' => $title,
            'slug' => Str::slug($title),
            'description' => fake()->paragraph(rand(2, 20)),
            'role' => fake()->name(),
            'position' => fake()->jobTitle,
            'address' => fake()->address,
            'type' => 'fulltime',
            'status' => rand(0,1),
            'last_date' => fake()->dateTime(),
            'number_of_vacancy' => rand(1, 10),
            'experience' => rand(1, 10),
            'gender' => fake()->randomElement(['male', 'famale']),
            'salary' => rand(500000, 1000000),
        ];
    }
}
