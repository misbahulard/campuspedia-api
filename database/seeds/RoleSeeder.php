<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Role::insert([
            [
                'role_id' => '1',
                'role' => 'admin'
            ],
            [
                'role_id' => '2',
                'role' => 'user'
            ]
        ]);
    }
}
