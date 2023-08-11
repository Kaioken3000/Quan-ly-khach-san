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
        Schema::create('thietbis', function (Blueprint $table) {
            $table->id();
            $table->string("ten");
            $table->string("hinh");
            $table->double("gia");
            $table->string("mieuTa");
            $table->integer('phongid')->nullable();
            $table->foreign('phongid')->references('so_phong')->on('phongs')->constrained()->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('thietbis');
    }
};
