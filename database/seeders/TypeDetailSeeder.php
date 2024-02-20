<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Faker\Generator as Faker;

use App\Models\TypeDetail;
use App\Models\Type;

class TypeDetailSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        $typeIds = Type::all()->pluck('id');

        foreach ($typeIds as $typeId) {
            $typeDetail = new TypeDetail();
            $typeDetail->type_id = $typeId;
            $typeDetail->description = $faker->realText(20);
            $typeDetail->save();
        }
    }
}
