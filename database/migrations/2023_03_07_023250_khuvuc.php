<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Khuvuc extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KhuVuc', function (Blueprint $table) {
            $table->integer('id_khuvuc')->unsigned();
            $table->primary('id_khuvuc');
            $table->string('ten_khu_vuc', 512);
            $table->smallInteger('hidden');
            $table->timestamps();
        });
        // Schema::table('khuvuc', function (Blueprint $table) {
        //     $table->primary('id_khuvuc');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('KhuVuc');
    }
}
