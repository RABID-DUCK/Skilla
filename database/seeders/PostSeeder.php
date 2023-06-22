<?php

namespace Database\Seeders;

use App\Models\Categories;
use App\Models\Posts;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        Posts::factory()
            ->count(50)
            ->create();
    }
}
