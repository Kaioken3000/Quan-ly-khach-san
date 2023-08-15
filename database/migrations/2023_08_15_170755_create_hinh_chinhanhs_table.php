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
        Schema::create('hinh_chinhanhs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hinhid')->nullable()->constrained('hinhs')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('chinhanhid')->nullable()->constrained('chinhanhs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('hinh_chinhanhs');
    }
};
