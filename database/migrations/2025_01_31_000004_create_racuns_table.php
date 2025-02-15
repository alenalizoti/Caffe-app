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
        Schema::create('racuns', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('narudzbina_id');
            $table->enum('vrsta_placanja',['kes','kartica']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('racuns');
    }
};
