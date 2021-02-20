<?php

namespace Database\Seeders;

use App\Models\Pytania;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PytaniaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0');
        Pytania::truncate();
        DB::statement('SET FOREIGN_KEY_CHECKS=1');
        Pytania::create([
            'trescPytania' => 'Tlumaczenie wykladowcy'
        ]);
        Pytania::create([
            'trescPytania' => 'Zachowanie wykladowcy'
        ]);
        Pytania::create([
            'trescPytania' => 'Ogolna ocena'
        ]);
    }
}
