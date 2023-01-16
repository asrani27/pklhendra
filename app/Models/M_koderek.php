<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class M_koderek extends Model
{
    use HasFactory;
    protected $table = 'm_koderek';
    protected $guarded = ['id'];
    public $timestamps = false;
}
