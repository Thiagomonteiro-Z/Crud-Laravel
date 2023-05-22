<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->string('letra_numero');
            $table->string('nome');
            $table->unsignedBigInteger('tipos_id'); // Coluna da chave estrangeira
            $table->float('preco_compra');
            $table->float('preco_venda');
            $table->integer('estoque');
            $table->timestamps();
        
            $table->foreign('tipos_id')->references('id')->on('tipos');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function(Blueprint $table) {
        $table->dropForeign('tipos_id'); //
        });
        Schema::dropIfExists('produtos');
    }
};