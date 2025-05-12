<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Category::factory(4)->create(),
        Category::create([
            'name' => 'Web Design',
            'slug' => 'web-design',
            'color'=> 'red'
        ]);
        Category::create([
            'name' => 'UI UX',
            'slug' => 'ui-ux',
            'color'=> 'green'
        ]);
        Category::create([
            'name' => 'Data Base',
            'slug' => 'data-base',
            'color'=> 'blue'
        ]);
    }
}
