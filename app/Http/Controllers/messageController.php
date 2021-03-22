<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class messageController extends Controller
{
    public function showMess()
    {
        $data = DB::table('email_configurations')->latest()->orderBy('created_at')->limit('5')->get();
        return view('devPage', ['data' => $data]);
    }
}
