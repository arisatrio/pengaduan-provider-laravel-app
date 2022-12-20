<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->ajax()) {
            $data = Category::withTrashed();

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', '_admin.master-data.category.action')
                ->make();
        }
        return view('_admin.master-data.category.index');
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
        $this->validate($request, [
            'name'          => 'required',
            'description'   => 'required',
        ]);

        Category::updateOrCreate(['id' => $request->id], [
            'name'          => $request->name,
            'description'   => $request->description
        ]);


        return response()->json([
            'status'    => true,
            'message'   => 'Data berhasil ditambahkan'
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
        $data = Category::find($id);

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Category::withTrashed()->find($id);
        if($data->deleted_at) {
            $data->restore();
        } else {
            $data->delete();
        }

        return response()->json([
            'status' => true,
            'message'=> 'Data Deleted Successfully'
        ]);
    }
}
