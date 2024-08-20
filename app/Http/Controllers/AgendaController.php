<?php

namespace App\Http\Controllers;

use App\Models\Agenda;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use App\Models\IdentityWebsite;

class AgendaController extends Controller
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
            $model = "Agenda";
            $agenda = Agenda::orderBy('id', 'DESC');
            return DataTables::of($agenda)
                ->addIndexColumn()
                ->addColumn('active', function ($data) {
                    return view('admin.components.status', compact('data'));
                })

                ->addColumn('action', function ($data) use ($model) {
                    return view('admin.components.action', compact('data', 'model'));
                })
                ->rawColumns(['active', 'action'])
                ->make(true);

        }
        $data = [
            'title' => 'Agenda',

        ];
        return view('admin.agenda.index')->with($data);


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
    public function store(Request $request, Agenda $agenda)
    {
        if ($request->ajax()) {
            $validator = Validator::make(
                $request->all(),
                [
                    'time' => 'required',
                    'title' => 'required',

                ]
            );

            if ($validator->fails()) {
                return response()->json(['error', 'Failed saved data', 'errors' => $validator->errors()]);

            } else {
                $agenda->activity_time = $request->time;
                $agenda->title = $request->title;
                $agenda->user_id = auth()->user()->id;
                $agenda->save();
                
                return response()->json(['success' => 'Successfully save data']);
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function show(Agenda $agenda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($request->agenda);
                $agenda = Agenda::find($id);
                return response()->json($agenda);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make(
                $request->all(),
                [
                    'time' => 'required',
                    'title' => 'required',

                ]
            );

            if ($validator->fails()) {
                return response()->json(['error', 'Failed saved data', 'errors' => $validator->errors()]);

            } else {
                try {
                    $id = Crypt::decrypt($request->agenda);
                    $agenda = Agenda::find($id);
                    
                    $agenda->activity_time = $request->time;
                    $agenda->title = $request->title;
                    $agenda->save();
                    
                    return response()->json(['success' => 'Successfully save data']);
                } catch (DecryptException $e) {
                    return redirect()->back();
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agenda  $agenda
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($request->agenda);

                Agenda::destroy($id);
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
                $id = Crypt::decrypt($request->agenda);
                $agenda = Agenda::find($id);

                $agenda->active = $request->status;
                $agenda->save();

                return response()->json(['success' => 'Successfully changed status']);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

}
