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
        Schema::create('lics', function (Blueprint $table) {
            $table->id();
            $table->integer('nu_fase');
            $table->char('nu_edital', 80);
            $table->char('modalidade', 255);
            $table->timestamp('data_abertura');
            $table->char('nome_licitador', 512)->nullable();
            $table->char('cnpj_licitador', 25)->nullable();
            $table->smallInteger('prioridade');
            $table->text('objeto');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lics');
    }
};
