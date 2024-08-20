<?php

namespace App\Http\Controllers;

use App\Models\IdentityWebsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;

class IdentityWebsiteController extends Controller
{   
    private $linklogo;
    private $linkicon;

    public function __construct()
    {   
        $this->linklogo = 'public/identities/';
        $this->linkicon = 'public/identities/';
        view()->share('identity_website', $identity_website = IdentityWebsite::first());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = IdentityWebsite::first();
        return View('admin.identitywebsite.index', compact('data'));
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
     * @param  \App\Models\IdentityWebsite  $identityWebsite
     * @return \Illuminate\Http\Response
     */
    public function show(IdentityWebsite $identityWebsite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\IdentityWebsite  $identityWebsite
     * @return \Illuminate\Http\Response
     */
    public function edit(IdentityWebsite $identityWebsite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\IdentityWebsite  $identityWebsite
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required'
            ]
        );

        if ($validator->fails()) {
            return redirect('/dashboard/setting')
                ->withErrors($validator)
                ->withInput();
        } else {
            try {
                $identity = IdentityWebsite::find($request->setting);

                $identity->name = $request->name;
                $identity->no_tlp = $request->phone_number;
                $identity->email = $request->email;
                $identity->address = $request->address;
                $identity->maps = $request->maps;
                $identity->content = $request->content;
                if($request->file("logo") != ""){
                    $filename = 'logo'.mt_rand().'.'.$request->logo->extension();
                    Storage::delete($this->linklogo.$identity->logo);
                    Storage::putFileAs($this->linklogo, $request->file("logo"), $filename);
                    $identity->logo = $filename;
                }
                if($request->file("icon") != ""){
                    $filename = 'icon'.mt_rand().'.'.$request->icon->extension();
                    Storage::delete($this->linkicon.$identity->icon);
                    Storage::putFileAs($this->linkicon, $request->file("icon"), $filename);
                    $identity->icon = $filename;
                }
                $identity->save();

                return redirect('dashboard/setting');
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\IdentityWebsite  $identityWebsite
     * @return \Illuminate\Http\Response
     */
    public function destroy(IdentityWebsite $identityWebsite)
    {
        //
    }
}
