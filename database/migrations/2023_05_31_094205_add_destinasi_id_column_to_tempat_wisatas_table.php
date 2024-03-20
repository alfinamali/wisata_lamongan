<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddDestinasiIdColumnToTempatWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tempat_wisatas', function (Blueprint $table) {
            $table->unsignedBigInteger('destinasi_id')->after('nama_destinasi');
            $table->foreign('destinasi_id')->references('id')->on('destinasis');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tempat_wisatas', function (Blueprint $table) {
            $table->dropForeign('tempat_wisatas_destinasi_id_foreign');
            $table->dropColumn('destinasi_id');
        });
    }
}
