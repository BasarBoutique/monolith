<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campo= ['CLIENT','EMPLOYEE','AUTHOR','ADMIN'];
        for ($i=1; $i < count($campo)+1; $i++) { 
            $usuario = User::create([
                "name"=>$campo[$i-1],
                "email"=>$campo[$i-1]."@gmail.com",
                'email_verified_at' => now(),
                "password"=>bcrypt('contraseña')
            ])->permissions_user($i);
        }
    }
}
