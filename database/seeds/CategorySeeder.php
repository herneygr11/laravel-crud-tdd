<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            "name" => "Backend",
            "description" => "Desarrollador del lado del servidor",
        ]);

        Category::create([
            "name" => "Fromtend",
            "description" => "Desarrollador del lado del cliente",
        ]);

        Category::create([
            "name" => "FullStack",
            "description" => "Desarrollador del lado del servidor y del cliente",
        ]);
    }
}
