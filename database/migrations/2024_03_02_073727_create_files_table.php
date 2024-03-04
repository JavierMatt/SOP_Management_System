<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id('fileID');
            $table->unsignedBigInteger('catid');
            $table->unsignedBigInteger('userid');
            $table->string('filename');
            $table->unsignedBigInteger('version');
            $table->string('path');
            $table->unsignedBigInteger('size');
            $table->date('date');
            $table->timestamps();

            $table->foreign('userid')->references('userid')->on('users');
            $table->foreign('catid')->references('catid')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};