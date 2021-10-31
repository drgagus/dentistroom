<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDentalrecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dentalrecords', function (Blueprint $table) {
            $table->id();
            $table->date('tanggalkunjungan');
            $table->string('norm', 10)->nullable();
            $table->string('nama', 50);
            $table->string('jeniskelamin', 20);
            $table->date('tanggallahir');
            $table->integer('umurtahun');
            $table->integer('umurbulan');
            $table->integer('umurhari');
            $table->integer('village_id');
            $table->integer('school_id')->nullable();
            $table->integer('diag_id');
            $table->integer('treatment_id');
            $table->string('obat', 255)->nullable();
            $table->string('image', 100)->nullable();
            $table->string('catatan', 255)->nullable();
            $table->integer('user_id');
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
        Schema::dropIfExists('dentalrecords');
    }
}
