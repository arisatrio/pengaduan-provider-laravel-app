<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TComplaint;
use App\Models\TComplaintReply;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReplyComplaintController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            $complaint = TComplaint::find($id);
            $complaint->update([
                'status'    => 'Proses'
            ]);
            TComplaintReply::create([
                't_complain_id' => $id,
                'reply'         => $request->reply,
                'reply_by'      => auth()->user()->id
            ]);

            DB::commit();
    
            return redirect()->back()->with('success', 'Balasan berhasil dikirim');
        } catch (\Exception $e) {
            DB::rollBack();

            return redirect()->back()->with('error', 'Balasan gagal dikirim');
        }
    }
}
