<?php

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Role::insert([
            ['name' => 'admin', 'display_name' => 'Administrator'],
            ['name' => 'editor', 'display_name' => 'Editor'],
            ['name' => 'author', 'display_name' => 'Author'],
            ['name' => 'subscriber', 'display_name' => 'Subscriber'],
        ]);
    }
}
