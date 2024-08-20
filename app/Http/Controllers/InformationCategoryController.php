<?php

namespace App\Http\Controllers;

use App\Models\InformationCategory;
use Illuminate\Http\Request;
use App\Models\IdentityWebsite;

class InformationCategoryController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\InformationCategory  $informationCategory
     * @return \Illuminate\Http\Response
     */
    public function show(InformationCategory $informationCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\InformationCategory  $informationCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(InformationCategory $informationCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\InformationCategory  $informationCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, InformationCategory $informationCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\InformationCategory  $informationCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(InformationCategory $informationCategory)
    {
        //
    }
}
