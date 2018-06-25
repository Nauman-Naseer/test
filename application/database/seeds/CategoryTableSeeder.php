<?php

use App\Models\Category\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CategoryTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Category::insert([

            ['category' => 'Literature'],
            ['category' => 'Historical'],
            ['category' => 'Industry'],
            ['category' => 'Culture'],
            ['category' => 'Sports'],
            ['category' => 'Travell'],
            ['category' => 'Movie'],
            ['category' => 'Religion'],
            ['category' => 'Others']
        ]);
    }
}
