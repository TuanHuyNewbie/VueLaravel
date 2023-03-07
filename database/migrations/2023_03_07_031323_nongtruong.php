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
            $table->integer('id_nong_truong')->unsigned();
            $table->primary('id_nong_truong');
            $table->integer('id_congty')->unsigned();
            $table->string('ma_nong_truong', 9);
            $table->integer('id_cong_ty')->unsigned();
            $table->smallInteger('hidden');
            $table->timestamps();
            $table->foreign('id_congty')
                ->references('id_congty')
                ->on('congty')
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
        Schema::dropIfExists('NongTruong');
    }
}
