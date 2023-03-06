<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CongTy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('CongTy', function (Blueprint $table) {
            $table->integer('id_congty');
            $table->integer('id_khuvuc')
                ->references('id_khuvuc')
                ->on('KhuVucs')
                ->onDelete('cascade');
            $table->string('ma_cong_ty', 4);
            $table->string('ten_cong_ty', 512);
            $table->smallInteger('hidden');
            $table->timestamps();
            $table->primary('id_congty');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('CongTy');
    }
}
