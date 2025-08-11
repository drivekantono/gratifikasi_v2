<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStrukturOrganisasi2sTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('struktur_organisasi2s', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('nama');
            $table->string('parent_id')->nullable();
            $table->string('images')->nullable();
            $table->string('no_urut')->nullable();
            $table->string('is_heading')->nullable();
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
        Schema::dropIfExists('struktur_organisasi2s');
    }
}
