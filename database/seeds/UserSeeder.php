<?php

use Illuminate\Database\Seeder;
use App\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();
        $password = Hash::make('admin');
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => $password
        ]);
    }
}
