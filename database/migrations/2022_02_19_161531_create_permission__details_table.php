<?php

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
        Schema::create('permission_details', function (Blueprint $table) {
            $table->id('pd_uuid');
            $table->unsignedBigInteger('permission_id');
            $table->string('pd_label');
            $table->string('pd_description');
            $table->timestamps();

            $table->foreign('permission_id')->references('permission_id')->on('permissions')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_details');
    }
};
