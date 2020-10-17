<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rincian extends Model
{
    protected $fillable =['cuti_id','dari_tanggal', 'sampai_tanggal', 'jenis_cuti'];
    public function cuti()
    {
        return $this->belongsTo('App\Cuti');
    }
}
