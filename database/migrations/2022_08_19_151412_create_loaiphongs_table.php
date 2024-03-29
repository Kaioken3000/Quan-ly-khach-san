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
        Schema::create('loaiphongs', function (Blueprint $table) {
            $table->string('ma')->primary();
            $table->string('ten');
            $table->double('gia');
            $table->string('hinh');
            $table->integer('soluong');
            $table->string('mieuTa');
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
        Schema::dropIfExists('loaiphongs');
    }
};
