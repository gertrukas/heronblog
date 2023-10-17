<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\User;

use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Default credentials
        $user =  User::create([
            'name' => 'Edwin Roquet Flores',
            'email' => 'eroquetf@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'photo' => null,
            'phone' => 9212465384,
            'web' => 1,
            'api' => 1,
            'active' => 1,
            'remember_token' => Str::random(10)
        ]);

        $user->assignRole('Super Administrador');

        $user =  User::create([
            'name' => 'Gerardo Trujillo',
            'email' => 'trujillo@excess.com.mx',
            'email_verified_at' => now(),
            'password' => Hash::make('xsadmin'), // password
            'photo' => null,
            'phone' => 4421049006,
            'web' => 1,
            'api' => 1,
            'active' => 1,
            'remember_token' => Str::random(10)
        ]);

        $user->assignRole('Super Administrador');

  

    }
}
