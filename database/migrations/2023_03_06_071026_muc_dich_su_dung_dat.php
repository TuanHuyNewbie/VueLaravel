<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MucDichSuDungDat extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('MucDichSuDungDat', function (Blueprint $table) {
            $table->integer('id_muc_dich_su_dung_dat');
            $table->string('ky_hieu', 16);
            $table->string('hien_trang', 512);
            $table->string('dien_giai', 1024);
            $table->timestamps();
            $table->primary('id_muc_dich_su_dung_dat');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('MucDichSuDungDat');
    }
}
