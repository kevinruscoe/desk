<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->increments('id');

            $table->text('title');
            $table->longtext('body')->nullable();

            $table->integer('agent_id')->unsigned()->nullable();
            $table->foreign('agent_id')->references('id')->on('users');

            $table->integer('customer_id')->unsigned();
            $table->foreign('customer_id')->references('id')->on('users');

            $table->integer('ticket_status_id')->unsigned()->nullable();
            $table->foreign('ticket_status_id')->references('id')->on('ticket_statuses');

            $table->datetime('read_at')->default(null)->nullable();
            $table->datetime('deadline_at')->default(null)->nullable();
            $table->datetime('completed_at')->default(null)->nullable();

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
        Schema::dropIfExists('tickets');
    }
}
