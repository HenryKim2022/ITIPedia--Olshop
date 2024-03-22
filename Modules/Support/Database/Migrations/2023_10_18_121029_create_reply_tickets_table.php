<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReplyTicketsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reply_tickets', function (Blueprint $table) {
            $table->id();
            $table->integer('ticket_id');
            $table->text('replied')->nullable();
            $table->integer('replied_by')->nullable();
            $table->integer('updated_by')->nullable();
            $table->text('file_path')->nullable();
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
        Schema::dropIfExists('reply_tickets');
    }
}
