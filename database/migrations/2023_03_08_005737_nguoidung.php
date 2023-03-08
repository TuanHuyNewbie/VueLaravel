<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nguoidung extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Nguoi_Dung', function (Blueprint $table) {
            $table->id('id_nguoi_dung')->unsigned();
            $table->string('ten_dang_nhap', 16);
            $table->string('mat_khau', 512);
            $table->string('ho_ten', 64);
            $table->date('ngay_sinh');
            $table->string('gioi_tinh', 10);
            $table->string('hinh_anh', 512);
            $table->string('chuc_vu', 64);
            $table->string('trang_thai', 16);
            $table->timestamp('created_at')->nullable();
        });
        // Schema::table('Nguoi_Dung', function (Blueprint $table) {
        //     $table->primary('id_nguoi_dung');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Nguoi_Dung');
    }
}
