<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_sub_kegiatan', function (Blueprint $table) {
            $table->id();
            $table->string('kewenangan');
            $table->string('kode_klasifikasi');
            $table->string('sub_kegiatan');
            $table->string('kinerja');
            $table->string('indikator');
            $table->string('satuan');
            $table->string('klasifikasi_belanja');
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_sub_kegiatan');
    }
};
