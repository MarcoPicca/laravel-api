<?php

namespace Database\Seeders;

use App\Models\Technologie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TechnologieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $names = [
            'HTML',
            'CSS',
            'Javascript',
            'VUE',
            'PHP',
            'MySQL',
            'Bootstrap',
            'Axios',
            'SASS',
            'Laravel',
            'MAMP'
        ];

        foreach ($names as $name){
            $newTechnologie = new Technologie();
            $newTechnologie->name = $name;
            $newTechnologie->save();
        }

    }
}
