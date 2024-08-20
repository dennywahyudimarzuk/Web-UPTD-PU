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
        Schema::create('information', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('path', 100);
            $table->boolean('active')->default(1);
            $table->unsignedTinyInteger('information_category_id');
            $table->unsignedSmallInteger('user_id');
            $table->timestamps();

            $table->foreign("information_category_id")->references("id")->on("information_categories")->onDelete('cascade');
            $table->foreign("user_id")->references("id")->on("users")->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information');
    }
};
