<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocalSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('local_schools', function (Blueprint $table) {
            $table->id();
            $table->string('jenjang_pendidikan');
            $table->integer('province_id');
            $table->integer('regency_id');
            $table->string('satuan_pendidikan');
            $table->integer('npsn')->nullable();
            $table->string('nama_pic');
            $table->string('jabatan_pic');
            $table->bigInteger('no_pic', 50);
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
        Schema::dropIfExists('local_schools');
    }
}
