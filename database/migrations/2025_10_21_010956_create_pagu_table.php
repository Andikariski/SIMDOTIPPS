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
        Schema::create('tbl_pagu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('fkid_opd');
            $table->integer('pagu_SG')->default(0);
            $table->integer('pagu_BG')->default(0);
            $table->integer('pagu_DTI')->default(0);
            $table->year('tahun_pagu');
            $table->timestamps();

            $table->foreign('fkid_opd')->references('id')->on('tbl_opd')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pagu');
    }
};
