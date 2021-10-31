<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentalrecord extends Model
{
    use HasFactory;

    protected $fillable = [
        'tanggalkunjungan',
        'norm',
        'nama',
        'jeniskelamin',
        'tanggallahir',
        'village_id',
        'school_id',
        'diag_id',
        'treatment_id',
        'obat',
        'image',
        'catatan',
        'umurtahun',
        'umurbulan',
        'umurhari',
        'user_id'
    ];

    public function village()
    {
        return $this->belongsTo('App\Models\Village');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    public function school()
    {
        return $this->belongsTo('App\Models\School');
    }
    
    public function diag()
    {
        return $this->belongsTo('App\Models\Diag');
    }
    
    public function treatment()
    {
        return $this->belongsTo('App\Models\Treatment');
    }
}
