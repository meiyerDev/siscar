<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        User::create([
        	'name'			=>	'Loriana Machado',
        	'email'			=>	'loriana@gmail.com',
        	'password'	=>	bcrypt('loriana'),
        ]);
    }
}
