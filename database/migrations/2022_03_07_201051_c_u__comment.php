<?php

use Carbon\Carbon;
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
        Schema::create('cu_comment', function(Blueprint $table){
            $table->id('cuc_id');
            $table->unsignedBigInteger('comment_id');
            $table->unsignedBigInteger('cu_id');
            $table->foreign('comment_id')->references('comment_id')->on('comment')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('cu_id')->references('cu_id')->on('courses_users')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamp('registered_at')->default(Carbon::now());
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cu_comment'); 
    }
};
