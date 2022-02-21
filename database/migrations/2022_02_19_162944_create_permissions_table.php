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
        Schema::create('permissions', function (Blueprint $table) {
            $table->unsignedBigInteger('permission_level');
            $table->unsignedBigInteger('pd_id');
            $table->timestamp('registered_at')->default(Carbon::now());

            $table->foreign('permission_level')->references('permission_level')->on('permission_hierarchies')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('pd_id')->references('pd_id')->on('permission_details')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions');
    }
};
