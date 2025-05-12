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
    Schema::create('pagos', function (Blueprint $table) {
    $table->id();
    $table->unsignedBigInteger('suscripcion_id');
    $table->decimal('monto', 10, 2);
    $table->date('fecha_pago');
    $table->string('metodo_pago')->nullable();
    $table->timestamps();

    $table->foreign('suscripcion_id')->references('id')->on('suscripciones')->onDelete('cascade');
});

}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pagos');
    }
};
