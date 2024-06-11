<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * INSERT INTO `trains` (`id`, `azienda`, `codice_treno`, `stazione_di_partenza`, `stazione_di_arrivo`, `orario_di_partenza`, `orario_di_arrivo`, `numero_carrozze`, `in_orario`, `cancellato`, `created_at`, `updated_at`) VALUES ('1', 'trenitalia', '002', 'vasto', 'pescara', '2024-06-11 16:35:13.000000', '2024-06-27 18:35:13', '7', '1', '0', NULL, NULL), ('2', 'trens', '002', 'vasto', 'pescara', '2024-06-11 16:35:13.000000', '2024-06-17 18:35:13', '7', '1', '0', NULL, NULL);
     */
    public function up(): void
    {
        Schema::create('trains', function (Blueprint $table) {
            $table->id();
            $table->string('azienda');
            $table->string('codice_treno')->uniqid();
            $table->string('stazione_di_partenza');
            $table->string('stazione_di_arrivo');
            $table->dateTimeTz('orario_di_partenza', precision: 0);
            $table->dateTimeTz('orario_di_arrivo', precision: 0)->nullable();
            $table->integer('numero_carrozze');
            $table->boolean('in_orario')->default(true);
            $table->boolean('cancellato')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trains');
    }
};
