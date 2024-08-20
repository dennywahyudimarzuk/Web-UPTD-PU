<?php

namespace App\Http\Controllers;

use App\Models\Information;
use Illuminate\Http\Request;
use App\Models\IdentityWebsite;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class InformationController extends Controller
{
    private $linkfile;
    public function __construct(Request $request)
    {
        view()->share('identity_website', $identity_website = IdentityWebsite::first());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $page = $request->pg;
        if ($request->ajax()) {
            $model = "Information";
            if($page == "performance_agreement"){
                $information = Information::where('information_category_id', 8)->latest();
                $this->linkfile = asset('storage/information/agreements/');
            }elseif($page == "key_performance_indicators"){
                $information = Information::where('information_category_id', 7)->latest();
                $this->linkfile = asset('storage/information/keys/');
            }elseif($page == "annual_performance_plan"){
                $information = Information::where('information_category_id', 6)->latest();
                $this->linkfile = asset('storage/information/annuals/');
            }elseif($page == "strategic_plan"){
                $information = Information::where('information_category_id', 5)->latest();   
                $this->linkfile = asset('storage/information/strategies/'); 
            }elseif($page == "sakip"){
                $information = Information::where('information_category_id', 4)->latest();   
                $this->linkfile = asset('storage/information/sakips/');
            }elseif($page == "all_times"){
                $information = Information::where('information_category_id', 3)->latest();
                $this->linkfile = asset('storage/information/all_times/');
            }elseif($page == "periodically"){
                $information = Information::where('information_category_id', 2)->latest();
                $this->linkfile = asset('storage/information/periodicallies/');
            }elseif($page == "necessarily"){
                $information = Information::where('information_category_id', 1)->latest();
                $this->linkfile = asset('storage/information/necessarilies/');
            }

            return DataTables::of($information)
                ->addIndexColumn()

                ->editColumn('path', function ($row) {
                    $link = $this->linkfile.'/'.$row->path;
                    return view('admin.components.ahref', compact('row', 'link'));
                })
                ->addColumn('active', function ($data) {
                    return view('admin.components.status', compact('data'));
                })

                ->addColumn('action', function ($data) use ($model) {
                    return view('admin.components.action', compact('data', 'model'));
                })
                ->rawColumns(['active', 'path', 'action'])
                ->make(true);

        }
        $data = [
            'title' => 'Informasi',

        ];
        return View('admin.information.index', compact('page'));
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
    public function store(Request $request, Information $information)
    {
        if ($request->ajax()) {
            $page = $request->pg;
            $linkpath = '';
            if($page == "performance_agreement"){
                $linkpath = 'public/information/agreements/'; 
                $categoryInformation = 8;  
            }elseif($page == "key_performance_indicators"){
                $linkpath = 'public/information/keys/';
                $categoryInformation = 7;
            }elseif($page == "annual_performance_plan"){
                $linkpath = 'public/information/annuals/';
                $categoryInformation = 6;
            }elseif($page == "strategic_plan"){
                $linkpath = 'public/information/strategies/';
                $categoryInformation = 5;
            }elseif($page == "sakip"){
                $linkpath = 'public/information/sakips/'; 
                $categoryInformation = 4;  
            }elseif($page == "all_times"){
                $linkpath = 'public/information/all_times/';
                $categoryInformation = 3;
            }elseif($page == "periodically"){
                $linkpath = 'public/information/periodicallies/';
                $categoryInformation = 2;
            }elseif($page == "necessarily"){
                $linkpath = 'public/information/necessarilies/';
                $categoryInformation = 1;
            }
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'file' => 'required|mimes:pdf'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error', 'Failed saved data', 'errors' => $validator->errors()]);
            } else {
                $filename = $request->name.mt_rand().'.'.$request->file->extension();
                Storage::putFileAs($linkpath, $request->file("file"), $filename);
                $information->name = $request->name;
                $information->path = $filename;
                $information->information_category_id = $categoryInformation;
                $information->user_id = auth()->user()->id;
                $information->save();

                return response()->json(['success' => 'Successfully save data']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($request->information);
                $data = Information::find($id);
                return response()->json($data);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $page = $request->pg;
            $linkpath = '';
            if($page == "performance_agreement"){
                $linkpath = 'public/information/agreements/'; 
                $categoryInformation = 8;
            }elseif($page == "key_performance_indicators"){
                $linkpath = 'public/information/keys/';
                $categoryInformation = 7;
            }elseif($page == "annual_performance_plan"){
                $linkpath = 'public/information/annuals/';
                $categoryInformation = 6;
            }elseif($page == "strategic_plan"){
                $linkpath = 'public/information/strategies/';
                $categoryInformation = 5;
            }elseif($page == "sakip"){
                $linkpath = 'public/information/sakips/';
                $categoryInformation = 4;
            }elseif($page == "all_times"){
                $linkpath = 'public/information/all_times/';
            }elseif($page == "periodically"){
                $linkpath = 'public/information/periodicallies/';
            }elseif($page == "necessarily"){
                $linkpath = 'public/information/necessarilies/';
            }
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error', 'Failed saved data', 'errors' => $validator->errors()]);
            } else {
                $id = Crypt::decrypt($request->information);
                $information = Information::find($id);
                 
                $information->name = $request->name;
                if($request->file("file") != ""){
                    $filename = $request->name.mt_rand().'.'.$request->file->extension();
                    Storage::delete($linkpath.$information->path);
                    Storage::putFileAs($linkpath, $request->file("file"), $filename);
                    $information->path = $filename;
                }
                $information->save();

                return response()->json(['success' => 'Successfully save data']);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            $page = $request->pg;
            $linkpath = '';
            if($page == "performance_agreement"){
                $linkpath = 'public/information/agreements/';
            }elseif($page == "key_performance_indicators"){
                $linkpath = 'public/information/keys/';
            }elseif($page == "annual_performance_plan"){
                $linkpath = 'public/information/annuals/';
            }elseif($page == "strategic_plan"){
                $linkpath = 'public/information/strategies/';
            }elseif($page == "sakip"){
                $linkpath = 'public/information/sakips/';
            }elseif($page == "all_times"){
                $linkpath = 'public/information/all_times/';
            }elseif($page == "periodically"){
                $linkpath = 'public/information/periodicallies/';
            }elseif($page == "necessarily"){
                $linkpath = 'public/information/necessarilies/';
            }
            try {
                $id = Crypt::decrypt($request->information);
                $information = Information::find($id);

                Storage::delete($linkpath.$information->path);
                Information::destroy($id);
                
                return response()->json(['success' => 'Successfully deleted data']);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    public function changed(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($request->information);
                $information = Information::find($id);

                $information->active = $request->status;
                $information->save();

                return response()->json(['success' => 'Successfully changed status']);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }
}
