<?php

namespace Database\Seeders;

use App\Models\Przedmiot;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PrzedmiotTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Przedmiot::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        Przedmiot::create([
            'nazwaPrzedmiota' => 'Programowanie w jezyku Java',
            'formaPrzedmiota' => 'wyklad'
        ]);
        Przedmiot::create([
            'nazwaPrzedmiota' => 'Bazy Danych',
            'formaPrzedmiota' => 'wyklad'
        ]);
        Przedmiot::create([
            'nazwaPrzedmiota' => 'Regulatory',
            'formaPrzedmiota' => 'wyklad'
        ]);
    }
}
