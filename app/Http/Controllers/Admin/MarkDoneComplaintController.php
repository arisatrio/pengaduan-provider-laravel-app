<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TComplaint;
use Illuminate\Http\Request;

class MarkDoneComplaintController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        $complaint = TComplaint::find($id);
        $complaint->update([
            'status'    => 'Selesai'
        ]);

        return redirect()->route('new-complain.index')->with('success', 'Data Pengaduan berhasil di update');
    }
}
