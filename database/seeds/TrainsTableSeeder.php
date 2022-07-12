<?php

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Train;
use Carbon\Carbon;

class TrainsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $f)
    {
        $stazioni = ["Roma termini", "Roma ostiense", "Milano centrale"];
        $timeNow = Carbon::now()->toDateTimeString();

        for ($i = 0; $i < 10; $i++) {
            $newTrain = new Train();
            $newTrain->azienda = $f->company();
            $newTrain->stazione_partenza = $stazioni[rand(0, 2)];
            $newTrain->stazione_arrivo = $stazioni[rand(0, 2)];
            $newTrain->orario_partenza = $f->time();
            $newTrain->orario_arrivo = $f->time();
            $newTrain->codice_treno = $f->lexify('#?????');
            $newTrain->numero_carrozze = $f->numberBetween(1, 10);
            $newTrain->in_orario = $f->boolean();
            $newTrain->cancellato = $f->boolean();

            if ($f->numberBetween(1, 10) % 2 === 0) {
                $newTrain->data_partenza = $f->date($timeNow);
            } else  $newTrain->data_partenza = $f->date();

            $newTrain->save();
        }
    }
}
