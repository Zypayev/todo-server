<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class MainController extends Controller
{
    //
    public function home()
    {
        return Inertia::render('Main/Main');
    }
}
