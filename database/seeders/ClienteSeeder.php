<?php

namespace Database\Seeders;

use App\Models\Cliente;
use Illuminate\Database\Seeder;

class ClienteSeeder extends Seeder
{
    public function run()
    {
        $registers = [
            ['nome' => 'Cliente Test',
                'email' => 'ClienteTest@gmail.com',
                'endereco_id' => 1,'user_id' => 1]
        ];

        foreach ($registers as $register) {
            Cliente::create($register);
        };
    }
}
