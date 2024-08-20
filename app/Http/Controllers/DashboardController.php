<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdentityWebsite;

class DashboardController extends Controller
{
    public function __construct()
    {
        view()->share('identity_website', $identity_website = IdentityWebsite::first());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.dashboard');
    }
}
