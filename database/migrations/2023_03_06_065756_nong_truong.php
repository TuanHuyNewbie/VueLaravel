<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class NongTruong extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('NongTruong', function (Blueprint $table) {
            $table->integer('id_nong_truong');
            $table->integer('id_congty')
                ->references('id_cong_ty')
                ->on('CongTy')
                ->onDelete('cascade');
            $table->string('ma_nong_truong', 9);
            $table->integer('id_cong_ty');
            $table->smallInteger('hidden');
            $table->timestamps();
            $table->primary('id_nong_truong');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('NongTruong');
    }
}
