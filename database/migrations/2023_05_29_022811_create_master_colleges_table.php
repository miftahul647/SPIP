<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_colleges', function (Blueprint $table) {
            $table->id();
            $table->string('nama_perguruan');
            $table->char('regency_id', 4);

            $table->foreign('regency_id')
                ->references('id')
                ->on('regencies');
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
        Schema::dropIfExists('master_colleges');
    }
}
