<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;

use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    
    $existingAdmin = User::where('role', 'admin')->first();

    
    if (!$existingAdmin) {
        User::create([
            'name' => 'Victor Muñoz',
            'email' => 'Calidad@itszo.edu.mx',
            'password' => bcrypt('calidadItszo2000'),
            'role' => 'admin',
        ]);
    }
}

}
