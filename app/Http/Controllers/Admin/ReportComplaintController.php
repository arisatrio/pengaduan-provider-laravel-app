<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TComplaint;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class ReportComplaintController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        setlocale(LC_ALL, 'IND');

        if($request->ajax()) {
            $data = TComplaint::with('kategori')->where('status', 'Selesai');

            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('kategori', function ($row) {
                    return $row->kategori->name;
                })
                ->addColumn('date', function ($row) {
                    return $row->created_at->formatLocalized('%A, %d %B %Y').' ('.$row->created_at->diffForHumans().')';
                })
                ->editColumn('status', function ($row) {
                    if($row->status === 'Baru') {
                        return '<span class="badge bg-red">'.$row->status.'</span>';
                    } else if($row->status === 'Proses') {
                        return '<span class="badge bg-yellow">'.$row->status.'</span>';
                    } else {
                        return '<span class="badge bg-green">'.$row->status.'</span>';
                    }
                })
                ->addColumn('action', '_admin.transaction.complaint.action')
                ->rawColumns(['status', 'action'])
                ->make();
        }
        return view('_admin.transaction.report.index');
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
        //
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
        //
    }
}
