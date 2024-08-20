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
        Schema::create('menus', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name', 100);
            $table->text('url')->nullable();
            $table->unsignedTinyInteger('order');
            $table->boolean('active')->default(1);
            $table->unsignedTinyInteger('page_id')->nullable();
            $table->unsignedSmallInteger('user_id');
            $table->timestamps();

            // $table->foreign("page_id")->references("id")->on("pages")->onDelete('cascade');
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
        Schema::dropIfExists('menus');
    }
};
