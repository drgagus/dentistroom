<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'sekolah'
    ];

    public function dentalrecords()
    {
        return $this->hasMany('App\Models\Dentalrecord');
    }

}
