<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TComplaintReply extends Model
{
    use HasFactory;

    protected $table = 't_complain_replies';
    protected $fillable = [
        't_complain_id',
        'reply',
        'reply_by',
    ];

    public function complain()
    {
        return $this->belongsTo(TComplaint::class, 't_complain_id');
    }

    public function replyBy()
    {
        return $this->belongsTo(User::class, 'reply_by');
    }

}
