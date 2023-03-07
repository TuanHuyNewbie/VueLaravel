<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LoCanhTac extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Lo_Canh_Tac', function (Blueprint $table) {
            $table->integer('id_lo_canh_tac')->unsigned();
            $table->integer('id_nong_truong')->unsigned();
            $table->integer('id_hien_trang_vuon_cay')->unsigned();
            $table->integer('id_phan_loai')->unsigned();
            $table->string('ma_lo', 16);
            $table->integer('thu_tu');
            $table->integer('nam_trong');
            $table->string('ten_lo_cu', 512);
            $table->string('ten_lo_moi', 512);
            $table->integer('gia_tri_phan_loai');
            $table->string('hang_dat', 16);
            $table->integer('ct_thap');
            $table->integer('ct_cao');
            $table->string('pp_trong', 16);
            $table->string('khoang_cach_trong', 16);
            $table->string('mat_do_thiet_ke', 16);
            $table->string('giong_cay', 16);
            $table->integer('mat_do_ghep_vuon_tc');
            $table->date('ngay_ket_thuc_trong_vuon_tc');
            $table->timestamps();
        });
        Schema::table('Lo_Canh_Tac', function (Blueprint $table) {
            $table->primary('id_lo_canh_tac');
            $table->foreign('id_nong_truong')
                ->references('id_nong_truong')
                ->on('nongtruong')
                ->onDelete('cascade');
            $table->foreign('id_hien_trang_vuon_cay')
                ->references('id_hien_trang_vuon_cay')
                ->on('hientrangvuoncay')
                ->onDelete('cascade');
            $table->foreign('id_phan_loai')
                ->references('id_phan_loai')
                ->on('phanloai')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Lo_Canh_Tac');
    }
}
