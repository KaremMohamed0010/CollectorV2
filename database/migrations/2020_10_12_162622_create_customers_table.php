<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name', 100);
            $table->string('trademark', 100);
            $table->string('district', 100);
            $table->string('address', 200);
            $table->integer('national_id')->unsigned()->nullable();
            $table->string('mobile_one', 200);
            $table->string('mobile_two', 200);
            $table->integer('target')->unsigned();
            $table->integer('collector_id')->unsigned();
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
        Schema::dropIfExists('customers');
    }
}
