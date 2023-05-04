<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePengajuanClaimsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajuan_claims', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('pegawai_id');
            $table->unsignedBigInteger('jenis_claim_id');
            $table->date('tanggal');
            $table->decimal('jumlah', $precision = 8, $scale = 2);
            $table->text('keterangan');
            $table->unsignedBigInteger('status_claim_id');
            $table->timestamps();

            $table->foreign('pegawai_id')->references('id')->on('pegawais');
            $table->foreign('jenis_claim_id')->references('id')->on('jenis_claims');
            $table->foreign('status_claim_id')->references('id')->on('status_claims');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajuan_claims');
    }
}
