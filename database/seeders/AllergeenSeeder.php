<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AllergeenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('Allergeen')->truncate();
        DB::table('Allergeen')->insert([
            ['naam' => 'Gluuuuten', 'omschrijving' => 'Dit product bevat gluuuuten'],
            ['naam' => 'Gelatine', 'omschrijving' => 'Dit product bevat gelatine'],
            ['naam' => 'AZO-kleurstof', 'omschrijving' => 'Dit product bevat AZO-kleurstof'],
            ['naam' => 'Lactose', 'omschrijving' => 'Dit product bevat lactose'],
            ['naam' => 'Soja', 'omschrijving' => 'Dit product bevat soja'],
        ]);
    }
}
