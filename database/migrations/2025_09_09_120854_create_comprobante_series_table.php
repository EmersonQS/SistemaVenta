<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('comprobante_series', function (Blueprint $table) {
            $table->id();
            $table->char('comprobante_tipo_codigo', 2); // FK a comprobante_tipos
            $table->string('serie', 4);
            $table->integer('correlativo');
            $table->timestamps();

            // Relación con comprobante_tipos
            $table->foreign('comprobante_tipo_codigo')
                ->references('codigo')
                ->on('comprobante_tipos')
                ->onDelete('cascade');
        });

        DB::table('comprobante_series')->insert([
            ['comprobante_tipo_codigo' => '00', 'serie' => 'X001', 'correlativo' => 1],
            ['comprobante_tipo_codigo' => '01', 'serie' => 'F001', 'correlativo' => 1],
            ['comprobante_tipo_codigo' => '03', 'serie' => 'B001', 'correlativo' => 1],
            ['comprobante_tipo_codigo' => '07', 'serie' => 'NC01', 'correlativo' => 1],
            ['comprobante_tipo_codigo' => '08', 'serie' => 'ND01', 'correlativo' => 1],
            ['comprobante_tipo_codigo' => '09', 'serie' => 'GR01', 'correlativo' => 1],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comprobante_series');
    }
};
