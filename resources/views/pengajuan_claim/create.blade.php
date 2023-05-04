@extends('layouts.template')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Form Pengajuan Claim</h3>
            </div>
            <div class="card-body">
                {{ Form::open(['url' => route('pengajuan-claim.store'),'class'=>'form-horizontal']) }}
                @include('validation_error')
                @include('pengajuan_claim.form')
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
