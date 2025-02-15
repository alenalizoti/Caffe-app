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
        Schema::table('racuns', function (Blueprint $table) {
            $table
                ->foreign('narudzbina_id')
                ->references('id')
                ->on('narudzbinas')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('racuns', function (Blueprint $table) {
            $table->dropForeign(['narudzbina_id']);
        });
    }
};
