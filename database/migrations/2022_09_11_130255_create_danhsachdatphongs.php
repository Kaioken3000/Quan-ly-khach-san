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
        Schema::create('danhsachdatphongs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datphongid')->constrained('datphongs')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('phongid')->nullable();
            $table->foreign('phongid')->references('so_phong')->on('phongs')->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->date('ngaybatdauo');
            $table->date('ngayketthuco');
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
        Schema::dropIfExists('danhsachdatphongs');
    }
};
