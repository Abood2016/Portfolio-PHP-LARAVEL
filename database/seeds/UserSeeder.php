<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'AbedElRahman',
            'email' => 'abed@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

    }
}
