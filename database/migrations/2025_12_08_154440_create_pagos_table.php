<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->string('metodo', 50)->comment("Ej: 'BioPagoBDV', 'Transferencia'");
            $table->string('operacion', 50)->comment("Ej: 'Operacion/Referencia'");
            $table->string('cellphonecode', 50)->comment("")->nullable();
            $table->string('cellphone', 50)->comment("")->nullable();
            $table->string('bancoOrigen', 50)->comment("")->nullable();
            $table->decimal('bs', 10, 2)->default(0)->nullable();
            $table->decimal('usd', 10, 2)->default(0)->nullable();
            $table->string('status', 50)->comment("");
            $table->date('fecha');    
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
