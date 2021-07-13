<?php

use App\Models\Bodega;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBodegasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bodegas', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('sede_id')->unsigned();
            $table->bigInteger('ciudad_id')->unsigned();
            $table->bigInteger('usuario_id')->unsigned();
            $table->string('bodenomb');
            $table->string('bodeabrv');
            $table->string('bodedirec');
            $table->string('bodecontact')->nullable();
            $table->string('bodetelcont')->nullable();
            $table->integer('bodeindice')->default('0');
            $table->char('bodecierre')->default(Bodega::BODEGA_ABIERTA);
            $table->char('bodeestado')->default(Bodega::BODEGA_ACTIVO);
            $table->string('bodeuscr');
            $table->timestamps();

            $table->foreign('sede_id')->references('id')->on('sedes')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('ciudad_id')->references('id')->on('ciudades')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('usuario_id')->references('id')->on('usuarios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bodegas');
    }
}
