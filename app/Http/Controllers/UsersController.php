<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IdentityWebsite;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Contracts\Encryption\DecryptException;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
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
        if($request->ajax()){
            $data = User::select('id', 'name', 'email', 'active')->where('id', '<>', Auth::user()->id)->orderBy('created_at', 'desc');
            $model = 'User';
            return DataTables::of($data)
                ->addIndexColumn()
                // ->addColumn('role',function($data){
                //     return $data->getRoleNames()[0];
                // })
                // ->addColumn('image', function($data) use ($model){
                //     return view('admin.pages.component.image', compact('data', 'model'));
                // })
                ->addColumn('status', function($data){
                    return view('admin.components.status', compact('data'));
                })
                ->addColumn('action', function($data) use ($model){
                    return view('admin.components.action', compact('data', 'model'));
                })
                ->make(true);
        }
        return View('admin.users.index');
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
                'email' => 'required | max:150 | email',
                'password' => 'required | max:16',
            ]
        );

        if ($validator->fails()) {
            return response()->json(['error', 'Failed saved data']);
        } else {
            try {
                $user = new User(); 
                
                $user->name = $request->name;
                $user->email = $request->email;
                $user->password = Hash::make($request->password);
                $user->admin_id = Auth::user()->id;
                $user->save();
                return response()->json(['success' => "Successfully saved data"]);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($request->user);
                $user = User::find($id); 
                return response()->json($user);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), 
            [
                'name' => 'required | max:100',
                'email' => 'required | max:150 | email'
            ]
        );

        if($validator->fails()){
            return response()->json(['error', 'Failed saved data']);
        } else{
            try {
                $id = Crypt::decrypt($request->user);
                $user = User::find($id); 
                
                $user->name = $request->name;
                $user->email = $request->email;
                $user->save();
                return response()->json(['success' => "Successfully edited data"]);
            }catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($request->user);
                User::destroy($id);
                return response()->json(['success' => 'Successfully deleted data']);
            }catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    public function changed(Request $request)
    {
        if ($request->ajax()) {
            try {
                $id = Crypt::decrypt($request->user);
                $user = User::find($id); 
                
                $user->active = $request->status;
                $user->save();

                return response()->json(['success' => 'Successfully changed status']);
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }

    public function changedPassword(Request $request)
    {
        if ($request->ajax()) {
            try {
                $validator = Validator::make($request->all(), 
                    [
                        'new_password' => 'required | max:16 | confirmed',
                        'new_password_confirmation' => 'required | max:16',
                    ],
                );
    
                if($validator->fails()){
                    return response()->json(['error' => "Failed to change password", 'errors' => $validator->errors()]);
                } else{
                    $id = Crypt::decrypt($request->user);
                    $user = User::find($id); 
                    
                    $user->password = Hash::make($request->new_password_confirmation);
                    $user->save();

                    return response()->json(['success' => 'Successfully changed password']);
                }
            } catch (DecryptException $e) {
                return redirect()->back();
            }
        }
    }
}
