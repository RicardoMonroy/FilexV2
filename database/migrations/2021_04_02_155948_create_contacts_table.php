<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();

            $table->string('paragraph')->nullable();
            $table->string('address')->nullable();
            $table->string('addressPhone')->nullable();
            $table->string('addressMovil')->nullable();
            $table->string('emailSupport')->nullable();
            $table->string('emailSales')->nullable();
            $table->string('emailContact')->nullable();

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
        Schema::dropIfExists('contacts');
    }
}
