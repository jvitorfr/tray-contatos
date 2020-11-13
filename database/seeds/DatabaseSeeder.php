<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Models\TipoTelefone;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();



        TipoTelefone::create(['tipo' => 'Residencial']);
        TipoTelefone::create(['tipo' => 'Comercial']);
        TipoTelefone::create(['tipo' => 'Celular']);

        User::create([
                'name' => 'João Ribeiro',
                "password" => "$2y$10\$YGH872/29tpvNN7QIyk7s.mnhrycaSmGr3x4U7AoMdEzI.CBH7YA6",
                "email" => "jvitorfr@outlook.com"
            ]
        );
    }
}



