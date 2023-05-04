<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('foreign_schools', function (Blueprint $table) {
            $table->char('id', 4)->index;
            $table->char('country_id', 4);
            $table->string('nama_sekolah', 100);
            $table->foreign('country_id')
                ->references('id')
                ->on('countries')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('foreign_schools');
    }
}
