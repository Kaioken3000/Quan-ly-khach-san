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
        Schema::create('catruc_nhanviens', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catrucid')->nullable()->constrained('catrucs')->onDelete('set null')->onUpdate('set null');
            $table->string('nhanvienid')->nullable();
            $table->foreign('nhanvienid')->references('ma')->on('nhanviens')->constrained()->onDelete('set null')->onUpdate('cascade');
            $table->date('ngaybatdau')->nullable();
            $table->date('ngayketthuc')->nullable();
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
        Schema::dropIfExists('catruc_nhanviens');
    }
};
