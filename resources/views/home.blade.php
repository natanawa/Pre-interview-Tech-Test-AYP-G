@extends('layouts.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <h3>Data Pengajuan Claims</h3>
            <div class="card-body">
                @include('partials._flash_message')
                {{--  Search --}}
                <div class="row">
                    <div class="col-sm-6">
                    </div>
                    <div class="col-sm-6 ">
                        <span class="pull-right">
                            {{ Form::open(['url'=>route('home.search'),'method'=>'get']) }}
                            {{ Form::text('search', $search ?? null, ['placeholder'=>'Search', 'aria-controls'=>"table",'class'=>'form-control input-sm']) }}
                            {{ Form::close() }}
                        </span>
                    </div>
                </div>
                <br/>
                <table class="table table-striped table-hover">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Claim</th>
                        <th>Tanggal</th>
                        <th>Jumlah</th>
                        <th>Keterangan</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($pengajuan_claims as $index => $pengajuan_claim)
                        <tr>
                            <td>{{ $index + $pengajuan_claims->firstItem() }}</td>
                            <td>{{ $pengajuan_claim->pegawai->name }}</td>
                            <td>{{ $pengajuan_claim->jenis_claim->name }}</td>
                            <td>{{ $pengajuan_claim->tanggal }}</td>
                            <td>{{ $pengajuan_claim->jumlah }}</td>
                            <td>{{ $pengajuan_claim->keterangan }}</td>
                            <td>{{ $pengajuan_claim->status_claim->name }}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $pengajuan_claims->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
