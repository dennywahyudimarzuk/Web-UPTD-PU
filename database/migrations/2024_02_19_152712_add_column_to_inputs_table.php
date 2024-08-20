<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inputs', function (Blueprint $table) {
            $table->string('name', 100)->after('id');
            $table->string('nohp', 15)->after('name');
            $table->string('email', 100)->after('nohp');
            $table->string('perihal', 100)->after('email');
            $table->string('keterangan')->after('perihal');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inputs', function (Blueprint $table) {
            $table->dropColumn('name');
            $table->dropColumn('nohp');
            $table->dropColumn('email');
            $table->dropColumn('perihal');
            $table->dropColumn('keterangan');
        });
    }
};
