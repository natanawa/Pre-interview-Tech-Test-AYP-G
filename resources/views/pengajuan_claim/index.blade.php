@extends('layouts.template')

@section('content')
<div class="row justify-content-center">
    <div class="col-lg-12">
        <div class="card">
            <h3>Data Pengajuan Claim</h3>
            <div class="card-body">
                @include('partials._flash_message')
                {{--  Search --}}
                <div class="row">
                    <div class="col-sm-6">
                        <a href="{{ route('pengajuan-claim.create') }}" type="button" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus"></i> Tambah Pengajuan claim</a>
                    </div>
                    <div class="col-sm-6 ">
                        <span class="pull-right">
                            {{ Form::open(['url'=>route('pengajuan-claim.search'),'method'=>'get']) }}
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
                        <th colspan="2">Action</th>
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
                            <td>
                                {{ link_to(route('pengajuan-claim.edit', ['id'=>$pengajuan_claim->id]), 'Edit', ['class'=>'btn btn-primary']) }} &nbsp;
                                @component('partials.delete_form')
                                    @slot('route')
                                        {{ route('pengajuan-claim.destroy', ['id'=>$pengajuan_claim->id]) }}
                                    @endslot
                                    @slot('id')
                                        Hapus-{{ $pengajuan_claim->id }}
                                    @endslot
                                @endcomponent
                            </td>
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
