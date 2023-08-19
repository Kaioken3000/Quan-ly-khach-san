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
        Schema::create('virtualtour_phongs', function (Blueprint $table) {
            $table->id();
            $table->integer('phongid')->nullable();
            $table->foreign('phongid')->references('so_phong')->on('phongs')->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('virtualtourid')->nullable()->constrained('virtualtours')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('virtual_tour_phongs');
    }
};
