<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('operations', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('dateDebut');
            $table->date('dateFin');
            $table->string('sujet');
            $table->text('description');
            $table->string('pieces');
            $table->text('notes');
            $table->string('vehicule_id');
            $table->string('status');
            $table->string('image');
            $table->timestamps();
            
            //foreign key of vehicule
            $table->index('vehicule_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('operations');
    }
}
