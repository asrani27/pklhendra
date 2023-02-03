<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class T_spj extends Model
{
    use HasFactory;
    protected $table = 't_spj';
    protected $guarded = ['id'];

    public function detail()
    {
        return $this->hasMany(T_spj_detail::class, 't_spj_id');
    }
    public function penerimaan()
    {
        return $this->hasMany(T_spj_penerimaan::class, 't_spj_id');
    }
}
