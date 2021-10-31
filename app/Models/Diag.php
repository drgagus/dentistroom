<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diag extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'diagnosa',
        'onoff'
    ];

    public function dentalrecords()
    {
        return $this->hasMany('App\Models\Dentalrecord');
    }
}
