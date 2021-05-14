<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAppointmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('appointments');
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();
            $table->string('advisor');
            $table->string('service');
            $table->smallInteger('status');
            $table->string('firstName');
            $table->string('lastName');
            $table->string('email',100)->unique();
            $table->string('cvLink');
            $table->bigInteger('phoneNumber');
            $table->string('date');
            $table->timestamp('updated_at')->useCurrent();
            $table->timestamp('created_at')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('appointments');
    }
}
