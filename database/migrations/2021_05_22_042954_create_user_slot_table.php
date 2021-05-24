<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserSlotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_slot', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');           
            $table->bigInteger('slot_id')->unsigned();
            $table->foreign('slot_id')->references('id')->on('slots')->onDelete('cascade');
            $table->date('book_date')->nullable()->default(null);;
            $table->timestamp('start')->nullable()->default(null);;
            $table->timestamp('end')->nullable()->default(null);;
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
        Schema::dropIfExists('user_slot');
    }
}
