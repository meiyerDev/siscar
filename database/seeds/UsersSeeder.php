<?php

use Illuminate\Database\Seeder;
use App\Models\{User,Role};

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
        DB::table('roles')->delete();

        Role::insert([
            [
                'id'   => 1,
                'name' => 'admin',
                'type' => 'root'
            ],
            [
                'id'   => 2,
                'name' => 'operador',
                'type' => 'aux'
            ],
        ]);

        $user = User::create([
        	'name'			=>	'Loriana Machado',
        	'email'			=>	'loriana@gmail.com',
        	'password'	=>	bcrypt('loriana'),
        ]);

        $user->roles()->attach(1);
    }
}
