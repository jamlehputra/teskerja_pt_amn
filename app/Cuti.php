<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cuti extends Model
{
    protected $fillable = ['user_id', 'request_date', 'keterangan', 'dari_tanggal', 'sampai_tanggal', 'jenis_cuti'];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function rincian()
    {
        return $this->hasMany('App\Rincian');
    }
}
