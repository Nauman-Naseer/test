<?php

use App\Models\Position\Position;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PositionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Position::insert([

            ['position' => 'Slider'],
            ['position' => 'Features'],
            ['position' => 'Main Feature'],
            ['position' => 'About']

        ]);
    }
}
