<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class reservationController extends Controller
{
    public function index(){
        return view('confirmReserv');
    }

    public function showReserv(){

        $data = DB::table('reservation_day')->get();
        $inf = DB::select('SELECT firstname, lastname, email, choosed_day, reservation_id FROM `reservation_day` INNER JOIN users ON reservation_day.users_id=users.id WHERE approved_at = false');
        // $data = DB::table('reservation_day')
        // ->join('users', 'reservation_day.id', '=', 'contacts.user_id')
        //     ->join('orders', 'users.id', '=', 'orders.user_id')
        //     ->select('users.*', 'contacts.phone', 'orders.price')
        //     ->get();
        // dd($inf);

        return view('confirmReserv', ['data'=>$inf]);
    }

    public function approba(Request $request){
        $reservation_id = $request->input('reservation_id');
        DB::update('update reservation_day set approved_at = ?  where reservation_id = ?', [1,$reservation_id]);
        return redirect()->route('reserve');
    }

    public function rejet(Request $request){
        $reservation_id = $request->input('reservation_id');
    }
}
