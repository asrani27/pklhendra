<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_spj_detail extends Model
{
    use HasFactory;
    protected $table = 't_spj_detail';
    protected $guarded = ['id'];
    public $timestamps = false;

    public function spj()
    {
        return $this->belongsTo(T_spj::class, 't_spj_id');
    }
    public function koderek()
    {
        return $this->belongsTo(M_koderek::class, 'm_koderek_id');
    }
}
