<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use phpDocumentor\Reflection\Types\Boolean;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('datphongs', function (Blueprint $table) {
            $table->id();
            $table->date('ngaydat');
            $table->date('ngaytra');
            $table->integer('soluong');
            $table->integer('phongid')->nullable();
            $table->foreign('phongid')->references('so_phong')->on('phongs')->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('khachhangid')->constrained('khachhangs')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('tinhtrangthanhtoan');
            $table->boolean('tinhtrangnhanphong');
            $table->foreignId('datphongid')->nullable()->constrained('datphongs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('datphongs');
    }
};
