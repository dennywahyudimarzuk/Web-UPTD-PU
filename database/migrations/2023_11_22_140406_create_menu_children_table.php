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
        Schema::create('menu_children', function (Blueprint $table) {
            $table->tinyIncrements('id');
            $table->string('name', 100);
            $table->text('url');
            $table->unsignedTinyInteger('order');
            $table->boolean('active')->default(1);
            $table->unsignedTinyInteger('menu_id');
            $table->unsignedTinyInteger('page_id')->nullable();
            $table->unsignedSmallInteger('user_id');
            $table->timestamps();

            $table->foreign("menu_id")->references("id")->on("menus")->onDelete('cascade');
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
        Schema::dropIfExists('menu_children');
    }
};
