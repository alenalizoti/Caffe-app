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
        Schema::table('narudzbinas', function (Blueprint $table) {
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');


            $table
                ->foreign('sto_id')
                ->references('id')
                ->on('stos')
                ->onUpdate('CASCADE')
                ->onDelete('CASCADE');

            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('narudzbinas', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['racun_id']);
            $table->dropForeign(['sto_id']);
        });
    }
};
