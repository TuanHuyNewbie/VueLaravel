<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PhanLoai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('PhanLoai', function (Blueprint $table) {
            $table->integer('id_phan_loai');
            $table->integer('id_hien_trang_vuon_cay')
                ->references('id_hien_trang_vuon_cay')
                ->on('HienTrangVuonCay')
                ->onDelete('cascade');
            $table->integer('id_muc_dich_su_dung_dat')
                ->references('id_muc_dich_su_dung_dat')
                ->on('MucDichSuDungDat')
                ->onDelete('cascade');
            $table->string('ky_hieu_phan_loai', 16);
            $table->string('dien_giai', 1024);
            $table->timestamps();
            $table->primary('id_phan_loai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('PhanLoai');
    }
}
