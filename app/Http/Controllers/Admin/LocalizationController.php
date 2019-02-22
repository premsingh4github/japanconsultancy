<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use App\Http\Controllers\Controller;

class LocalizationController extends Controller
{
    public function index($locale)
    {
        App::setLocale($locale);
        //store the locale in session so that the middleware can register it
        session()->put('locale', $locale);
        return redirect()->back();
    }
}
