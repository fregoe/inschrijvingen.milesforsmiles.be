<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeelnemersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deelnemers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('naam',255);
            $table->string('voornaam',255);
            $table->string('email',255);
            $table->integer('team_id')->nullable();
            $table->string('referentienr',10)->nullable();
            $table->integer('betaal_id')->nullable();
            $table->integer('voucher_id')->nullable();
            $table->integer('user_id')->nullable();
            $table->string('order_uuid')->nullable();
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
        Schema::dropIfExists('deelnemers');
    }
}
