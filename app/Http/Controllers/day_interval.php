<?php

namespace App\Http\Controllers;

use App\Models\param_day;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Carbon;

// $date_d = $_POST['jour_d'];
// $date_f = $_POST['jour_f'];
class day_interval extends Controller
{

    // public function index() {
    //     return view('paramétrage');
    // }

    public function insertion (Request $request)
    {
        
        $debut = date('Y-m-d', strtotime($request->jour_d));
        $fin = date('Y-m-d', strtotime($request->jour_f));
        $configuration = [$debut, $fin];
        DB::insert('insert into param_days (jour_d, jour_f) value(?,?)', $configuration);

    // $configuration  =  ([
                
            // "debut"        =>     date('Y-m-d', strtotime($request->debut)),
            //  "fin"          =>     date('Y-m-d', strtotime($request->fin)),
        // ]);

        
        // if(!is_null($configuration)) {
        //    return back()->with("success", "date choosed successfully.");
        // }

        // else {
        //     return back()->with("failed", "day configuration not choosed.");
        // }
         
    }

    public function showDate()
    {
        
        // $data = DB::table('param_days')->latest()->orderBy('created_at')->limit('1')->get();
        // return $data;
        // $debut = $data->debut;
        // $fin = $data->fin;
        $startDate = new Carbon('2021-03-15');
        $endDate = new Carbon('2021-03-20');
        $all_dates = array(); 
        while ($startDate->lte($endDate)) {
            $all_dates[] = $startDate->format('j F Y');

            $startDate->addDay();
        }
        return view('paramétrage', ['dates'=>$all_dates]);

    }

}
