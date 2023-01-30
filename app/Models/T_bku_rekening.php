<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_bku_rekening extends Model
{
    use HasFactory;
    protected $table = 't_bku_rekening';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function koderek()
    {
        return $this->belongsTo(M_koderek::class, 'm_koderek_id');
    }
}
