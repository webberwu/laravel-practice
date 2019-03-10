<?php

namespace App\Http\Controllers;

use App\DailyAstro;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();

        return view('home')->with([
            'astros' => DailyAstro::where('day', $today->timestamp)->get(),
            'today' => $today,
        ]);
    }
}
