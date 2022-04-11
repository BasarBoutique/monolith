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
        if(Schema::hasTable('lesson')) {
            $this->down();
        }

        Schema::create('lesson', function (Blueprint $table) {
            $table->id('lesson_id');
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('ld_id');
            $table->string('is_enabled')->default(true);
            $table->foreign('course_id')->references('course_id')->on('courses')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('ld_id')->references('ld_id')->on('lesson_detail')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('lesson');
    }
};
