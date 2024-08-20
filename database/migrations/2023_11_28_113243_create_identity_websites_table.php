<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('identity_websites', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name', 100);
            $table->string('icon', 100)->nullable();
            $table->string('logo', 100)->nullable();
            $table->text('content')->nullable();
            $table->text('address')->nullable();
            $table->text('maps')->nullable();
            $table->string('no_tlp', 15)->nullable();
            $table->string('email', 150)->nullable();
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
        Schema::dropIfExists('identity_websites');
    }
};
