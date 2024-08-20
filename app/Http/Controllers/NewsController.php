<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\NewsDetailImages;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Models\IdentityWebsite;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function __construct()
    {
        $this->link = 'public/news/';
        $this->linknews = asset('storage/news/');
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
            $data = News::orderBy('id', 'DESC');
            $model = "News";
            return DataTables::of($data)
                ->addIndexColumn()

                ->editColumn('news_categories_id', function ($data) {
                    return $data->kategori->name;
                })
                ->addColumn('action', function ($data) {
                    $btn = '';
                    $btn = $btn . '<a href="' . route('dashboard.news.edit', Crypt::encrypt($data->id)) . '"  class="btn btn-warning btn-icon btn-sm edit"
                    title="Edit"><i class="fa fa-edit"></i></a>';
                    $btn = $btn . '<button type="button" data-id="' . Crypt::encrypt($data->id) . '" class="btn btn-danger btn-icon btn-sm delete"
                    title="Delete"><i class="fa fa-trash"></i></button>';
                    return $btn;

                })
                ->make(true);
        }
        return View('admin.news.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = NewsCategory::where('active', '1')->get();

        return view('admin.news.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required',
                'tanggal' => 'required',
                'kategori' => 'required',
                'isi' => 'required'
            ]
        );

        if ($validator->fails()) {
            // return response()->json(['success' => false, 'error' => $validator->errors()->all()], 401);
            return redirect('/dashboard/news/create')
                ->withErrors($validator)
                ->withInput();
        } else {
            try {
                $news_id = $request->news_id;
                $data = [
                    'title' => $request->judul,
                    'slug' => Str::slug($request->judul),
                    'publish_date' => $request->tanggal,
                    'content' => $request->isi,
                    'tags' => $request->tag,
                    'news_categories_id' => $request->kategori,
                    'user_id' => auth()->user()->id
                ];
                $berita = News::updateOrCreate(['id' => $news_id], $data)->id;

                $files = $request->file('gambar');

                if ($request->hasFile('gambar')) {
                    //cek gambarlama;     
                    $beritagambar = NewsDetailImages::where('news_id', $berita);
                    foreach ($beritagambar->get() as $gambarlama) {
                        // $filename = str_replace('/storage/berita/', '', $gambarlama->image);
                        // remove berkas file
                        if ($gambarlama->image <> '') {
                            Storage::delete($this->link.$gambarlama->image);
                            // @unlink(storage_path('app/public/berita/' . $filename));
                        }
                    }
                    $beritagambar->delete();
                    //gambarbaru
                    foreach ($files as $key=>$file) {
                        $filename = $key.mt_rand().'.'.$file->extension();
                        Storage::putFileAs($this->link, $file, $filename);
                        
                        // $extension = $file->getClientOriginalExtension();
                        // $file_name = \Str::slug($request->judul) . mt_rand() . "." . $extension;

                        // $path = $file->storeAs('berita', $file_name, 'public');
                        //   $path = $file->store('public/berita/');
                        // $filenya = "/storage/{$path}";

                        $gambarberita = ['news_id' => $berita, 'image' => $filename];
                        $imageberita = NewsDetailImages::create($gambarberita);

                    }
                }
                return redirect('dashboard/news');
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function show(News $news)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try {
            $id = Crypt::decrypt($id);
            $berita = News::find($id);

            $kategori = NewsCategory::get();

            return view('admin.news.create', compact('berita', 'kategori'));

        } catch (DecryptException $e) {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, News $news)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\News  $news
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($id);
                $newsimage = NewsDetailImages::where('news_id', $id)->get();
                foreach ($newsimage as $gambar) {
                    $filename = str_replace('/storage/berita/', '', $gambar->image);
                    @unlink(storage_path('app/public/berita/' . $filename));
                    $newsimage->each->delete();

                }

                News::destroy($id);
                return response()->json(['success' => 'Successfully deleted data']);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }
}
