<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function dashboard(): View
    {
        $setting = Setting::where('slug', 'base')->firstOrFail();

        return view('dashboard', [
            'setting' => $setting,
        ]);
    }
}
