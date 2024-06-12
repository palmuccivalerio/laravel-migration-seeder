<?php

namespace Database\Seeders;

use Faker;
use App\Models\Train;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TrainsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i = 0; $i < 10; $i++) {
            $faker = Faker\Factory::create('it_IT');

            $newTrain = new Train();
            $newTrain->azienda = $faker->company;
            $newTrain->codice_treno = $faker->unique()->numerify('TR#####');
            $newTrain->stazione_di_partenza = $faker->city;
            $newTrain->stazione_di_arrivo = $faker->city;
            $newTrain->orario_di_partenza = $faker->dateTimeThisYear($max = 'now', $timezone = null);
            $newTrain->orario_di_arrivo = $faker->optional()->dateTimeThisYear($max = 'now', $timezone = null);
            $newTrain->numero_carrozze = $faker->numberBetween(3, 20);
            $newTrain->in_orario = $faker->boolean(80); // 80% true
            $newTrain->cancellato = $faker->boolean(10); // 10% true
            $newTrain->save();
        }
    }
}
