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
        Schema::table('pelanggaran_siswa', function (Blueprint $table) {
            $table->unsignedBigInteger('pelanggaran_id')->after('siswa_id');

            $table->foreign('pelanggaran_id')
                ->references('id')
                ->on('daftar_pelanggaran')
                ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('pelanggaran_siswa', function (Blueprint $table) {
            $table->dropForeign(['pelanggaran_id']);
            $table->dropColumn('pelanggaran_id');
        });
    }
};
