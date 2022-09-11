<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Company;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // factory('App\Models\User', 20)->create();
        \App\Models\User::factory(10)->create();
        
        \App\Models\Company::factory(10)->create();
        $categories = [
            'Технологи',
            'Инженер',
            'Анагаах ухаан',
            'Программ хангамж',
            'Шинжлэх ухаан'
        ];
        foreach($categories as $category){
            Category::create(['name' => $category]);
        };
        \App\Models\Job::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
