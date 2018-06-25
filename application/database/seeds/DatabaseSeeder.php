<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(ConfigTableSeeder::class);
        $this->call(LanguagesTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(LocalesTableSeeder::class);
        $this->call(BlogTableSeeder::class);
        $this->call(BasicTableSeeder::class);
        $this->call(CategoryTableSeeder::class);
        $this->call(PositionTableSeeder::class);
        $this->call(UsersTableSeeder::class);

        Model::reguard();
    }
}
