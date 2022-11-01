<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        $registers = [
            ['name' => 'Cliente Test',
                'email' => 'ClienteTest@gmail.com',
                'password' => '123456798'],
            ['name' => 'Barbeiro Test',
                'email' => 'BarbeiroTest@gmail.com',
                'password' => '987654321'],
            ['name' => 'Sandra Jennifer Eliane da Silva',
                'email' => 'sandrajennifereliane@iglod.com',
                'password' => '987654321'],
            ['name' => 'Danilo Samuel Lorenzo Nascimento',
                'email' => 'danilosamuellore@defensoria.sp.gov.br',
                'password' => '987654321'],
            ['name' => 'Filipe Matheus Ribeiro',
                'email' => 'filipematheusribeiro@hotamail.com',
                'password' => '987654321'],
            ['name' => 'Isis Clarice Tatiane Pires',
                'email' => 'isisclaricet@abrangenciacorretora.com.br',
                'password' => '987654321'],
            ['name' => 'Vanessa Elaine da Rocha',
                'email' => 'vanessaelaine@simoesmendonca.adv.br',
                'password' => '987654321'],
            ['name' => 'Alícia Catarina Olivia Sales',
                'email' => 'aliciacatarinaolives@ambarnet.com.br',
                'password' => '987654321'],
            ['name' => 'Leandro Elias da Cunha',
                'email' => 'lleandroeliasdacunha@ci.com.br',
                'password' => '987654321'],
            ['name' => 'Caleb Tomás da Cruz',
                'email' => 'calebtomasdacruz-90@plastic.com.br',
                'password' => '987654321'],
            ['name' => 'Priscila Eliane Adriana Freitas',
                'email' => 'priscilaelianea85@br.flextronics.com',
                'password' => '987654321'],
            ['name' => 'Emanuel Igor Pietro da Mota',
                'email' => 'emanueligorpietroda@mfb.com.br',
                'password' => '987654321'],
            ['name' => 'Luiz Murilo Moraes',
                'email' => 'lluizmurilomoraes@hotmmail.com',
                'password' => '987654321']
        ];

        foreach ($registers as $register) {
            User::create($register);
        };
    }
}
