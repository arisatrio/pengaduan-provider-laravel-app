<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TComplaint;
use Illuminate\Http\Request;

class ForwardRepliesController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, $id)
    {
        setlocale(LC_ALL, 'IND');
        $complaint = TComplaint::with('kategori', 'replies', 'replies.replyBy')->find($id);

        return view('_admin.transaction.complaint.show-forward', compact('complaint'));
    }
}
