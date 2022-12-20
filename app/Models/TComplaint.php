<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TComplaint extends Model
{
    use HasFactory;

    protected $table = 't_complains';
    protected $fillable = [
        'kode_booking',
        'kategori_id',
        'name',
        'phone',
        'deskripsi',
        'status'
    ];

    public function kategori()
    {
        return $this->belongsTo(Category::class, 'kategori_id');
    }

    public function replies()
    {
        return $this->hasMany(TComplaintReply::class, 't_complain_id');
    }
}
