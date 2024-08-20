<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\IdentityWebsite;

class GalleryVideoController extends Controller
{
    private $link;
    private $linkvideo;

    public function __construct()
    {
        $this->link = 'public/gallery/videos/';
        $this->linkvideo = asset('storage/gallery/videos/');
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
            $model = "Videos";
            $galeri = Gallery::where('category','video')->orderBy('id','DESC');

            return DataTables::of($galeri)
                ->addIndexColumn()

                ->editColumn('video', function ($row) {
                    $link = $this->linkvideo.'/'.$row->image;
                    return view('admin.components.video', compact('row', 'link'));
                })
                ->addColumn('active', function ($data) {
                    return view('admin.components.status', compact('data'));
                })

                ->addColumn('action', function ($data) use ($model) {
                    return view('admin.components.action', compact('data', 'model'));
                })
                ->rawColumns(['active', 'video', 'action'])
                ->make(true);

        }
        $data = [
            'title' => 'Galeri Video',

        ];
        return view('admin.gallery.video.index')->with($data);
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
    public function store(Request $request, Gallery $gallery)
    {
        if ($request->ajax()) {
            $validator = Validator::make(
                $request->all(),
                [
                    'name' => 'required',
                    'videofile' => 'required|mimes:mp4'
                ]
            );

            if ($validator->fails()) {
                return response()->json(['error', 'Failed saved data', 'errors' => $validator->errors()]);
            } else {
                $filename = mt_rand().'.'.$request->videofile->extension();
                Storage::putFileAs($this->link, $request->file("videofile"), $filename);
                $gallery->name = $request->name;
                $gallery->image = $filename;
                $gallery->category = 'video';
                $gallery->user_id = auth()->user()->id;
                $gallery->save();

                return response()->json(['success' => 'Successfully save data']);
            }
        }
}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function show(Gallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($request->video);
                $galeri = Gallery::find($id);
                return response()->json($galeri);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gallery  $gallery
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
                    $id = Crypt::decrypt($request->video);
                    $galeri = Gallery::find($id);
                    
                    $galeri->name = $request->name;
                    $galeri->category = 'video';
                    if($request->file("videofile") != ""){
                        $filename = mt_rand().'.'.$request->videofile->extension();
                        Storage::delete($this->link.$galeri->image);
                        Storage::putFileAs($this->link, $request->file("videofile"), $filename);
                        $galeri->image = $filename;
                    }
                    $galeri->save();

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
     * @param  \App\Models\Gallery  $gallery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($request->video);
                $galeri = Gallery::find($id);

                Storage::delete($this->link.$galeri->image);
                Gallery::destroy($id);

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
                $id = Crypt::decrypt($request->video);
                $galeri = Gallery::find($id); 
                
                $galeri->active = $request->status;
                $galeri->save();

                return response()->json(['success' => 'Successfully changed status']);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }
}
