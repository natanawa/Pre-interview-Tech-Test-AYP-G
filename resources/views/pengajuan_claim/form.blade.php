<div class="form-group">
    {{ Form::label('pegawai', 'Pegawai &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::select('pegawai_id', $pegawai, $pengajuan_claim->pegawai_id ?? old('pegawai_id'), ['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('jenis_claim_id', 'Jenis Claim &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::select('jenis_claim_id', $jenis_claim, $pengajuan_claim->jenis_claim_id ?? old('jenis_claim'), ['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('tanggal', 'Tanggal &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::text('tanggal', $pengajuan_claim->tanggal ?? now(), ['placeholder'=>now(),'class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('jumlah', 'Jumlah &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {!! Form::number('jumlah', $pengajuan_claim->jumlah ?? null, ['class' => 'form-control','step' => '10000']) !!}
    </div>
</div>
<div class="form-group">
    {{ Form::label('keterangan', 'Keterangan &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::text('keterangan', $pengajuan_claim->keterangan ?? null, ['placeholder'=>'Kebutuhan Mendesak','class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    {{ Form::label('status', 'Status Claim &nbsp;', ['class'=>'control-label col-md-2']) }}
    <div class="col-md-4">
        {{ Form::select('status_claim_id', $status_claim, $pengajuan_claim->status_claim_id ?? old('departemen_id'), ['class'=>'form-control']) }}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
        {{ Form::submit('Save Data',['class'=>'btn btn-success']) }}
    </div>
</div>
