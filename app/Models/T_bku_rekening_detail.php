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
}
