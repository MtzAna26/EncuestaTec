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
    // Verifica si hay al menos un administrador en la base de datos
    $existingAdmin = User::where('role', 'admin')->first();

    // Si no hay ningún administrador, crea uno
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
