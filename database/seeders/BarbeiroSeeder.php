<?php

namespace Database\Seeders;

use App\Models\Barbeiro;
use Illuminate\Database\Seeder;

class BarbeiroSeeder extends Seeder
{
    public function run()
    {
        $registers = [
            ['nome' => 'Barbeiro Test',
                'email' => 'BarbeiroTest@gmail.com',
                'endereco_id' => 2,'user_id' => 2, 'semAgenda' => 1],
            ['nome' => 'Sandra Jennifer Eliane da Silva',
                'email' => 'sandrajennifereliane@iglod.com',
                'endereco_id' => 3,'user_id' => 3],
            ['nome' => 'Danilo Samuel Lorenzo Nascimento',
                'email' => 'danilosamuellore@defensoria.sp.gov.br',
                'endereco_id' => 4,'user_id' => 4],
            ['nome' => 'Filipe Matheus Ribeiro',
                'email' => 'filipematheusribeiro@hotamail.com',
                'endereco_id' => 5,'user_id' => 5],
            ['nome' => 'Isis Clarice Tatiane Pires',
                'email' => 'isisclaricet@abrangenciacorretora.com.br',
                'endereco_id' => 6,'user_id' => 6],
            ['nome' => 'Vanessa Elaine da Rocha',
                'email' => 'vanessaelaine@simoesmendonca.adv.br',
                'endereco_id' => 7,'user_id' => 7],
            ['nome' => 'Alícia Catarina Olivia Sales',
                'email' => 'aliciacatarinaolives@ambarnet.com.br',
                'endereco_id' => 8,'user_id' => 8],
            ['nome' => 'Leandro Elias da Cunha',
                'email' => 'lleandroeliasdacunha@ci.com.br',
                'endereco_id' => 9,'user_id' => 9],
            ['nome' => 'Caleb Tomás da Cruz',
                'email' => 'calebtomasdacruz-90@plastic.com.br',
                'endereco_id' => 10,'user_id' => 10],
            ['nome' => 'Priscila Eliane Adriana Freitas',
                'email' => 'priscilaelianea85@br.flextronics.com',
                'endereco_id' => 11,'user_id' => 11],
            ['nome' => 'Emanuel Igor Pietro da Mota',
                'email' => 'emanueligorpietroda@mfb.com.br',
                'endereco_id' => 12,'user_id' => 12],
            ['nome' => 'Luiz Murilo Moraes',
                'email' => 'lluizmurilomoraes@hotmmail.com',
                'endereco_id' => 13,'user_id' => 13]
        ];

        foreach ($registers as $register) {
            Barbeiro::create($register);
        };
    }
}
