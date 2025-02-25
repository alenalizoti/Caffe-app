<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('stavka_narudzbines', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kolicina');
            $table->unsignedBigInteger('proizvod_id');
            $table->unsignedBigInteger('narudzbina_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stavka_narudzbines');
    }
};
