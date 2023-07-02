<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_jkn extends Model
{
    use HasFactory;
    protected $table = 't_jkn';
    protected $guarded = ['id'];

    public function spj()
    {
        return $this->belongsTo(T_spj::class, 't_spj_id');
    }
}
