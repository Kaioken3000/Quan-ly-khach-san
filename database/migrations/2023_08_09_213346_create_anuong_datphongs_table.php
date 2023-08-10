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
        Schema::create('anuong_datphongs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('datphongid')->nullable()->constrained('datphongs')->onDelete('set null')->onUpdate('set null');
            $table->foreignId('anuongid')->nullable()->constrained('anuongs')->onDelete('set null')->onUpdate('set null');
            $table->integer("soluong");
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
        Schema::dropIfExists('anuong_datphongs');
    }
};
