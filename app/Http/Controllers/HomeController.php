<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\Message;
use Auth;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function message(Request $request)
    {
        $me = 'none';
        event(New Message($request->message, $request->username, $me));
        DB::table('message')->insert(['message' =>$request->message, 'user_id' => Auth::id()]);
        return $request->message;
    }

    public function index()
    {
        return view('home');
    }


    public function home() {
    $name = Auth::user()->name;
    $message = DB::table('message')->get();
    return view('home', compact('name', 'message'));
    }


  public function radio() {
    return view('radio');
     }


  public function breakdown() {
    return view('breakdown');
}


  public function social() {
    return view('social');
}



  public function about() {
    return view('about');
}

}
