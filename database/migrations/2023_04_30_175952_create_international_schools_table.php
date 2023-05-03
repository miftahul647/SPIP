<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInternationalSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('international_schools', function (Blueprint $table) {
            $table->id();
            $table->string('jenjang_pendidikan');
            $table->string('negara');
            $table->string('satuan_pendidikan');
            $table->string('npsn', 50)->nullable();
            $table->string('nama_pic');
            $table->string('jabatan_pic');
            $table->bigInteger('no_pic');
            $table->string('document');

            $table->softDeletes();
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
        Schema::dropIfExists('international_schools');
    }
}
