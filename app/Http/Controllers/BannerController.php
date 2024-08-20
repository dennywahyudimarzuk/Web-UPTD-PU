<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\IdentityWebsite;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    public function __construct()
    {
        $this->link = 'public/banners/';
        $this->linkimage = asset('storage/banners/');
        view()->share('identity_website', $identity_website = IdentityWebsite::first());
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = "Banner";
            $banner = Banner::orderBy('id', 'DESC');
            
            return DataTables::of($banner)
                ->addIndexColumn()


                ->editColumn('image', function ($row) {
                    $foto = '<img src="' . $this->linkimage.'/'.$row->image . '" width="100px" height="100px"/>';
                    return $foto;
                })
                ->addColumn('active', function ($data) {
                    return view('admin.components.status', compact('data'));
                })

                ->addColumn('action', function ($data) use ($model) {
                    return view('admin.components.action', compact('data', 'model'));
                })
                ->rawColumns(['active', 'image', 'action'])
                ->make(true);

        }
        $data = [
            'title' => 'Banner',

        ];
        return view('admin.banner.index')->with($data);
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
    public function store(Request $request, Banner $banner)
    {
        if ($request->ajax()) {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'foto' => 'required|mimes:jpg,bmp,png'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error', 'Failed saved data', 'errors' => $validator->errors()]);
            } else {
                $filename = mt_rand().'.'.$request->foto->extension();
                Storage::putFileAs($this->link, $request->file("foto"), $filename);
                $banner->name = $request->name;
                $banner->image = $filename;
                $banner->user_id = auth()->user()->id;
                $banner->save();

                return response()->json(['success' => 'Successfully save data']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($request->banner);
                $banner = Banner::find($id);
                return response()->json($banner);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error', 'Failed saved data', 'errors' => $validator->errors()]);
            } else {
                try {
                    $id = Crypt::decrypt($request->banner);
                    $banner = Banner::find($id);
                    
                    $banner->name = $request->name;
                    if($request->file("foto") != ""){
                        $filename = mt_rand().'.'.$request->foto->extension();
                        Storage::delete($this->link.$banner->image);
                        Storage::putFileAs($this->link, $request->file("foto"), $filename);
                        $banner->image = $filename;
                    }
                    $banner->save();

                    return response()->json(['success' => 'Successfully updated data']);
                } catch (DecryptException $e) {
                    return redirect()->back();
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($request->banner);
                $banner = Banner::find($id);

                Storage::delete($this->link.$banner->image);
                Banner::destroy($id);
                
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
                $id = Crypt::decrypt($request->banner);
                $banner = Banner::find($id);

                $banner->active = $request->status;
                $banner->save();

                return response()->json(['success' => 'Successfully changed status']);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }
}
