<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Train;
use Carbon\Carbon;

class TrainController extends Controller
{
    public function index()
    {
        $trains = Train::whereDate('data_partenza', Carbon::now()->toDateString())->get();

        return view("welcome", compact('trains'));
    }
}
