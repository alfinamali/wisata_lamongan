<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsFavoritColumnToTempatWisatasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tempat_wisatas', function (Blueprint $table) {
            $table->boolean('is_favorit')->default(false);
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
            if (Schema::hasColumn('tempat_wisatas', 'is_favorit')) {
                $table->dropColumn('is_favorit');
            }
        });
    }
}
