<?php

namespace App\Http\Controllers;

use Illuminate\Database\Console\DumpCommand;
use Illuminate\Http\Request;
use Inertia\Inertia;

class PageController extends Controller
{
    public function dashboard()
    {
        return Inertia::render('Dashboard');
    }
}
