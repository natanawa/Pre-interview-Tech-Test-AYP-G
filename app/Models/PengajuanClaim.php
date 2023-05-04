<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PengajuanClaim extends Model
{

    protected $guarded = ['_token'];

    public function pegawai(){
        return $this->belongsTo('App\Models\Pegawai');
    }

    public function jenis_claim(){
        return $this->belongsTo('App\Models\JenisClaim');
    }

    public function status_claim(){
        return $this->belongsTo('App\Models\StatusClaim');
    }
}
