<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class LoginSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Teste',
            'email' => 'teste@teste.com',
            'password' => 'teste',
        ]);
    }
}
