<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    use HasFactory;

    protected $fillable = [
        'tindakan'
    ];

    public function dentalrecords()
    {
        return $this->hasMany('App\Models\Dentalrecord');
    }
}
