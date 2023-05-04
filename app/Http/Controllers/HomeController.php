<?php

namespace App\Http\Controllers;

use App\Models\PengajuanClaim;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $PengajuanClaim = PengajuanClaim::with('pegawai.user', 'jenis_claim', 'status_claim');
        if (Auth::user()->role == 2) {
            $PengajuanClaim = $PengajuanClaim->whereHas('pegawai.user', function ($query) {
                $query->where('id', Auth::user()->id);
            });
        }
        $data['pengajuan_claims'] = $PengajuanClaim->paginate(10);
        if (!is_null($request->search)) {
            $data['pengajuan_claims'] = $PengajuanClaim->whereHas('pegawai', function ($query) use ($request) {
                $query->where('name','like', "%$request->search%");
            })->paginate(10)->appends($request->all());
            $data['search']   = $request->search;
        }
        return view('home', $data);
    }
}
