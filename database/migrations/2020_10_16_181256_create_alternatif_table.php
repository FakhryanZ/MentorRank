<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlternatifTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('alternatif', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama', 30);
            $table->string('pendidikan_terakhir', 5);
            $table->enum('jenis_kelamin', ['Laki-laki','Perempuan'])->default('Laki-laki');
            $table->string('tempat_tinggal', 10);
            $table->string('no_telp',13);
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
        //
        Schema::drop('alternatif');
    }
}
