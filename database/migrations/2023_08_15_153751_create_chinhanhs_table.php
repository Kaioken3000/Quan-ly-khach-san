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
        Schema::create('chinhanhs', function (Blueprint $table) {
            $table->id();
            $table->string("ten");
            $table->integer("soluong");
            $table->string("thanhpho");
            $table->string("quan");
            $table->string("sdt");
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
        Schema::dropIfExists('chinhanhs');
    }
};
