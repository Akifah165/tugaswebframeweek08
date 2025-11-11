<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('mata_kuliahs', function (Blueprint $table) {
        $table->id();
        $table->string('kode_mk', 10)->unique();
        $table->string('nama_mk');
        $table->integer('sks');
        $table->unsignedBigInteger('dosen_id')->nullable();
        $table->foreign('dosen_id')->references('id')->on('dosens');
        $table->softDeletes();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mata_kuliahs');
    }
};
