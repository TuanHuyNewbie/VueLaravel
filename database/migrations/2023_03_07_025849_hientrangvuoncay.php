<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HienTrangVuonCay extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('HienTrangVuonCay', function (Blueprint $table) {
            $table->integer('id_hien_trang_vuon_cay')->unsigned();
            $table->primary('id_hien_trang_vuon_cay');
            $table->string('ky_hieu', 16);
            $table->string('dien_giai', 512);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('HienTrangVuonCay');
    }
}
