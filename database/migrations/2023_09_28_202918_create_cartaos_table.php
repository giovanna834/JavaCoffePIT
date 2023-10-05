<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartaos', function (Blueprint $table) {
            $table->increments("id");

            $table->string("numero");
            $table->string("nome");
            $table->string("Data");
            $table->string("CVV");

            $table->integer("user_id")->unsigned();
            $table->timestamps();
            $table->foreign("user_id")
                ->references("id")->on("users")
                ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cartaos');
    }
}
