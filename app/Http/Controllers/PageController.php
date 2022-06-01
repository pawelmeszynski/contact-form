<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    /**
     * Display front page
     */
    public function __invoke(): View
    {
        return view('index');
    }
}
