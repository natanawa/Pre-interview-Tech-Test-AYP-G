<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function jabatan(){
        return $this->belongsTo('App\Models\Jabatan');
    }

    public function departemen(){
        return $this->belongsTo('App\Models\Departemen');
    }
}
