<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LocalizationController extends Controller
{
    public function index(Request $request)
    {
        Session::put('locale', $request->locale);
        return redirect()->back();
    }
}
