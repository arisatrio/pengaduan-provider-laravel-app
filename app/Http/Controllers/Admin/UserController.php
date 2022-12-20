<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserAddRequest;
use App\Http\Requests\Admin\UserEditRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = User::all();
            
            return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('role',function($row){
                return $row->roles->first()?->name;
            })
            ->addColumn('action', '_admin.user-management.users.action')
            ->make();
        }
        return view('_admin.user-management.users.index');
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
    public function store(UserAddRequest $request)
    {
        User::Create([
            'id' => $request->id,
            'nip' => $request->nip,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
        ], 
        $request->validated());

        return response()->json([
            'status'    => true,
            'message'   => 'Data Added Successfully'
        ]);
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
    public function edit($id)
    {
        $data = User::find($id);
        
        return response()->json([
            'data'  => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserEditRequest $request, $id)
    {
        $users = User::find($id);
        $users->nip=$request->nip;
        $users->username=$request->username;
        $users->password=$request->password;
        $users->email=$request->email;
        $users->super_user=$request->super_user;
        $users->organization=$request->organization;
        $users->grup=$request->grup;
        $users->position=$request->position;
        $users->name=$request->name;
        $users->contact=$request->contact;
        $users->information=$request->information;
        $users->save();

        return response()->json([
            'status'    => true,
            'message'   => 'Data Added Successfully'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = User::find($id);
        $data->delete();

        return response()->json([
            'status' => true,
            'message'=> 'Data Deleted Successfully'
        ]);
    }
}
