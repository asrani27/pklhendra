<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_bku_rekening_detail extends Model
{
    use HasFactory;
    protected $table = 't_bku_rekening_detail';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function rekening()
    {
        return $this->belongsTo(T_bku_rekening::class, 't_bku_rekening_id');
    }
}
