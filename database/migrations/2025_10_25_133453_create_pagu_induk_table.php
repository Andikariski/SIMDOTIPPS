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
        Schema::create('tbl_pagu_induk', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('pagu_SG')->default(0);
            $table->bigInteger('pagu_BG')->default(0);
            $table->bigInteger('pagu_DTI')->default(0);
            $table->year('tahun_pagu');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_pagu_induk');
    }
};
