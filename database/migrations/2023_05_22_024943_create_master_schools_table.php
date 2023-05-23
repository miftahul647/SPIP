<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMasterSchoolsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('master_schools', function (Blueprint $table) {
            $table->char('id', 4)->index();
            $table->char('regency_id', 4);
            $table->string('nama_sekolah', 100);
            $table->char('id_jenjang', 4);

            $table->foreign('regency_id')
                ->references('id')
                ->on('regencies')
                ->onUpdate('cascade')->onDelete('restrict');
                
            $table->foreign('id_jenjang')
                ->references('id')
                ->on('jenjangs');

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
        Schema::dropIfExists('master_schools');
    }
}
