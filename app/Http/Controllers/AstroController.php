<?php

namespace App\Http\Controllers;

use App\DailyAstro;
use Illuminate\Http\Request;

class AstroController extends Controller
{
    /**
     * show
     *
     * @param \App\DailyAstro $astro
     *
     * @return \Illuminate\Http\Response
     */
    public function show(DailyAstro $astro)
    {
        return view('astro', compact('astro'));
    }
}
