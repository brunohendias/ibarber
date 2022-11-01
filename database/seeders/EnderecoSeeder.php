<?php

namespace Database\Seeders;

use App\Models\Endereco;
use Illuminate\Database\Seeder;

class EnderecoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $registers = [
            ['estado' => 'MG',
                'cidade' => 'Belo Horizonte',
                'bairro' => 'Buritis',
                'rua' => 'Jose Hemeterio',
                'numero' => 1021,
                'cep' => '36874145'],
            ['estado' => 'MG',
                'cidade' => 'Belo Horizonte',
                'bairro' => 'Centro',
                'rua' => 'Rua dos busão',
                'numero' => 675,
                'cep' => '36874541'],
            ['estado' => 'SP',
                'cidade' => 'Birituba',
                'bairro' => 'Pingatudo',
                'rua' => 'Rua dos bares',
                'numero' => 547,
                'cep' => '36874345'],
            ["cep" => "25976310",
                "rua"=> "Rua Opala",
                "numero"=> 996,
                "bairro"=> "Prata",
                "cidade"=> "Teresópolis",
                "estado"=> "RJ"],
            ["cep" => "79826425",
                "rua" => "Rua José de Mattos Pereira",
                "numero" => 943,
                "bairro" => "Alto das Paineiras",
                "cidade" => "Dourados",
                "estado" => "MS"],
            ["cep" => "94415760",
                "rua" => "Travessa Serenita",
                "numero" => 798,
                "bairro" => "Tarumã",
                "cidade" => "Viamão",
                "estado" => "RS"],
            ["cep" => "68905705",
                "rua" => "Passagem Primeira José do Espírito Santo",
                "numero" => 962,
                "bairro" => "Perpétuo Socorro",
                "cidade" => "Macapá",
                "estado" => "AP"],
            ["cep" => "53330680",
                "rua" => "Vila dos Sargentos",
                "numero" => 505,
                "bairro" => "Ouro Preto",
                "cidade" => "Olinda",
                "estado" => "PE"],
            ["cep" => "68550063",
                "rua" => "Rua Bernadino de Melo",
                "numero" => 300,
                "bairro" => "Jardim Lucena",
                "cidade" => "Redenção",
                "estado" => "PA"],
            ["cep" => "53429260",
                "rua" => "Rua João Gonçalves Filho",
                "numero" => 788,
                "bairro" => "Nossa Senhora da Conceição",
                "cidade" => "Paulista",
                "estado" => "PE"],
            ["cep" => "68902868",
                "rua" => "Avenida dos Aimorés",
                "numero" => 141,
                "bairro" => "Buritizal",
                "cidade" => "Macapá",
                "estado" => "AP"],
            ["cep" => "96203540",
                "rua" => "Rua Mário Gomes Centro",
                "numero" => 247,
                "bairro" => "Vila Bernardeth",
                "cidade" => "Rio Grande",
                "estado" => "RS"],
            ["cep" => "69046150",
                "rua" => "Travessa Jaramataia",
                "numero" => 103,
                "bairro" => "Alvorada",
                "cidade" => "Manaus",
                "estado" => "AM"],
            ["cep" => "69317358",
                "rua" => "Rua Austral",
                "numero" => 431,
                "bairro" => "Equatorial",
                "cidade" => "Boa Vista",
                "estado" => "RR"],
            ["cep" => "79045302",
                "rua" => "Rua Senador Vergueiro",
                "numero" => 860,
                "bairro" => "Jardim Noroeste",
                "cidade" => "Campo Grande",
                "estado" => "MS"]
        ];

        foreach ($registers as $register) {
            Endereco::create($register);
        };
    }
}
