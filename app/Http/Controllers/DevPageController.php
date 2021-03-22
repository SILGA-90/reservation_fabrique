<?php

namespace App\Http\Controllers;

// use Carbon\CarbonPeriod;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Models\DevPage;
use Illuminate\Support\Facades\DB;


class DevPageController extends Controller
{
    // public function index()
    // {
    //     return view('devPage');
    // }

    public function insertion (Request $request)
    {


        $choosed =  date('Y-m-d', strtotime($request->choosed_day)); 
        $choisie = [$choosed];
        $configuration = DB::insert('insert into reservation_day (choosed_day) value(?)', $choisie);
   
    // $configuration  =   DevPage::create([

    //         "choosed_day"       =>     date('Y-m-d', strtotime($request->choosed_day)),     
    //     ]);

        
        if(!is_null($configuration)) {
           return back()->with("success", "Reservation réussie, attendez confirmation.");
        }

        else {
            return back()->with("failed", "Echec de la reservation.");
        }
         
    }
    public function showDate()
    {
        $data = DB::table('email_configurations')->latest()->orderBy('created_at')->limit('5')->get();
        // $data = DB::table('param_days')->latest()->orderBy('created_at')->limit('1')->get();
        // return $data;
        // $debut = $data->debut;
        // $fin = $data->fin;
        $startDate = new Carbon('2021-03-01');
        $endDate = new Carbon('2021-03-07');
        $all_dates = array();
        while ($startDate->lte($endDate)) {
            $all_dates[] = $startDate->format('j F Y');

            $startDate->addDay();
        }
        return view('devPage', ['dates' => $all_dates, 'data' => $data]);
    }
}
