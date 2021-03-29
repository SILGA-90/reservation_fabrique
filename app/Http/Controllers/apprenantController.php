<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class apprenantController extends Controller
{
    
    public function index()
    {
        $users = DB::select('select * from users');
        return view('dashboard', ['users' => $users]);
    }

    public function create()
    {
        //
    }

    public function store()
    {
        //
    }

    
    public function show()
    {

        // $data = DB::table('users')->orderBy('email_verified_at', 'desc')->get();
        // return view('dashboard', ['data' => $data]);
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    
    public function destroy($id)
    {
        DB::delete('delete from users where id = ?', [$id]);
        return redirect()->route('dashboard');
    }

    // public function deleteUser(Request $request){

    //     $data = DB::table('users')->orderBy('email_verified_at', 'desc')->get();   
    //     $user_id = $request->input('id');
    //     DB::Delete('delete FROM users WHERE id=?', [$user_id]);
    //     // DB::update('update reservation_day set approved_at = ?  where reservation_id = ?', [1, $reservation_id]);
    //     return view('dashboard', ['data' => $data]);

    // }
}
