<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder


{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'Roberto',
            'email' => 'roblopsan1@hotmail.com',
            'password' => bcrypt('Roberto1.')
                ]);
    }
}
