<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function dashboard(): View
    {
        return view('dashboard');
    }
}
