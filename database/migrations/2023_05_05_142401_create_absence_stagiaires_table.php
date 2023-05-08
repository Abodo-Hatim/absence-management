<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('absence_stagiaires', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('absence_id');
            $table->foreign('absence_id')->references('id')->on('absences')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('stagiaire_id');
<<<<<<< HEAD
            $table->foreign('stagiaire_id')->references('id')->on('stagiaires');
            $table->text('preuve')->nullable()->default(null);
=======
            $table->foreign('stagiaire_id')->references('id')->on('stagiaires')->onDelete('cascade')->onUpdate('cascade');
            $table->text('preuve');
>>>>>>> 8da740064fe186cc9ef5e81f6fcd136d14de7f9d
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('absence_stagiaires');
    }
};
