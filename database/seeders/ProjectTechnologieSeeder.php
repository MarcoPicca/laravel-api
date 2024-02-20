<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technologie;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectTechnologieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $projects = Project::all();
        $technologieIds = Technologie::all()->pluck('id');

        foreach ($projects as $project) {
            $project->technologies()->sync($faker->randomElements( $technologieIds, rand(1,10), false ));
        }
    }
}
