<?php

namespace App\Http\Controllers;

use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Auth;
use App\Models\IdentityWebsite;

class NewsCategoryController extends Controller
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
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = NewsCategory::orderBy('id', 'DESC');
            $model = "Category";
            return DataTables::of($data)
                ->addIndexColumn()

                ->addColumn('status', function ($data) {
                    return view('admin.components.status', compact('data'));
                })
                ->addColumn('action', function ($data) use ($model) {
                    return view('admin.components.action', compact('data', 'model'));
                })
                ->make(true);
        }
        return View('admin.news.category');
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
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required | max:100',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error', 'Failed saved data']);
        } else {
            try {
                $category = new NewsCategory();
                $category->name = $request->name;
                $category->user_id = Auth::user()->id;
                $category->save();
                return response()->json(['success' => "Successfully saved data"]);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function show(NewsCategory $newsCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {

        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($request->category);

                $news_category = NewsCategory::find($id);
                return response()->json($news_category);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'name' => 'required | max:100',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error', 'Failed saved data']);
        } else {
            try {
                $id = Crypt::decrypt($request->category);
                $new_category = NewsCategory::find($id);

                $new_category->name = $request->name;
                $new_category->save();
                return response()->json(['success' => "Successfully edited data"]);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NewsCategory  $newsCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($request->category);
                NewsCategory::destroy($id);
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
                $id = Crypt::decrypt($request->category);
                $new_category = NewsCategory::find($id);

                $new_category->active = $request->status;
                $new_category->save();

                return response()->json(['success' => 'Successfully changed status']);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }
}
