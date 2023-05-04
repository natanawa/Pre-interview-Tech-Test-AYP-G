<?php

namespace App\Http\Controllers;

use App\Models\JenisClaim;
use App\Models\Pegawai;
use App\Models\PengajuanClaim;
use App\Models\StatusClaim;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class PengajuanClaimController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Factory|View
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
        return view('pengajuan_claim.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Factory|View
     */
    public function create()
    {
        $data['pegawai']    = Pegawai::pluck('name', 'pegawais.id')->prepend('Silahkan Pilih Pegawai',0);
        $data['jenis_claim'] = JenisClaim::pluck('name', 'id')->prepend('Silahkan Pilih Jenis Claim',0);
        $data['status_claim']= StatusClaim::pluck('name', 'id')->prepend('Silahkan Pilih Status Claim',0);
        return view('pengajuan_claim.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse|Redirector
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $pengajuan_claim = new PengajuanClaim();
            $pengajuan_claim->create($request->all());
            DB::commit();
            return redirect('/pengajuan-claim')->with('message', 'Add pengajuan Claim success');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect('/pengajuan-claim/create')
                ->with('error_message', 'Add pengajuan Claim error : ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param PengajuanClaim $PengajuanClaim
     * @return Response
     */
    public function show(PengajuanClaim $PengajuanClaim)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param PengajuanClaim $PengajuanClaim
     * @return Factory|View
     */
    public function edit(PengajuanClaim $PengajuanClaim)
    {
        $data['pegawai']    = Pegawai::pluck('name', 'id')->prepend('Silahkan Pilih Pegawai',0);
        $data['jenis_claim'] = JenisClaim::pluck('name', 'id')->prepend('Silahkan Pilih Jenis Claim',0);
        $data['status_claim']= StatusClaim::pluck('name', 'id')->prepend('Silahkan Pilih Status Claim',0);
        $data['pengajuan_claim'] = $PengajuanClaim;
        return view('pengajuan_claim.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param PengajuanClaim $PengajuanClaim
     * @return RedirectResponse|Redirector
     */
    public function update(Request $request, PengajuanClaim $PengajuanClaim)
    {
        DB::beginTransaction();
        try {
            $PengajuanClaim->update($request->all());
            DB::commit();
            return redirect('/pengajuan-claim')->with('message', 'Update pengajuan Claim success');
        }catch (\Exception $e) {
            DB::rollBack();
            return redirect('/pengajuan-claim/update')
                ->with('error_message', 'Update pengajuan Claim error : ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param PengajuanClaim $PengajuanClaim
     * @return RedirectResponse
     * @throws \Exception
     */
    public function destroy(PengajuanClaim $PengajuanClaim)
    {
        $PengajuanClaim->delete();
        return back()->with('message', 'Delete pengajuan Claim success');
    }
}
