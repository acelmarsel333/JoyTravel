<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('paket_gambar', function (Blueprint $table) {
            $table->text('map_embed')->nullable();
        });
    }

    public function down()
    {
        Schema::table('paket_gambar', function (Blueprint $table) {
            $table->dropColumn('map_embed');
        });
    }
};
