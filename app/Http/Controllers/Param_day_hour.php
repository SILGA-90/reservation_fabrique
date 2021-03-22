<?php

namespace App\Http\Controllers;

use Illuminate\Support\Carbon;
use Carbon\CarbonPeriod;
use Illuminate\Http\Request;
use App\Models\day_hour;
use Illuminate\Support\Facades\DB;

class Param_day_hour extends Controller
{
    public function index()
    {
        return view('paramétrage');
    }

    public function insertion (Request $request)
    {
   
    $configuration  =   day_hour::create([

            "choosed_day"       =>     date('Y-m-d', strtotime($request->choosed_day)),
            "start_hour"        =>     $request->start_hour,
            "end_hour"          =>     $request->end_hour,
            "selected_number"   =>     $request->selected_number,
            
        ]);

        
        if(!is_null($configuration)) {
           return back()->with("success", "date choosed successfully.");
        }

        else {
            return back()->with("failed", "day configuration not choosed.");
        }
         
    }

    public function showDate()
    {

        // $data = DB::table('param_days')->latest()->orderBy('created_at')->limit('1')->get();
        // return $data;
        // $debut = $data->debut;
        // $fin = $data->fin;
        $startDate = new Carbon('2021-03-20');
        $endDate = new Carbon('2021-03-27');
        $all_dates = array();
        while ($startDate->lte($endDate)) {
            $all_dates[] = $startDate->format('j F Y');

            $startDate->addDay();
        }
        return view('paramétrage', ['dates' => $all_dates]);
    }
    
}

