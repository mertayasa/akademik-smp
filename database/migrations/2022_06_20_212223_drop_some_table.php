<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropSomeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('nilai_ekskul');
        Schema::dropIfExists('nilai_kesehatan');
        Schema::dropIfExists('nilai_proporsi');
        Schema::dropIfExists('prestasi');
        Schema::dropIfExists('saran');
        Schema::dropIfExists('ekskul');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
