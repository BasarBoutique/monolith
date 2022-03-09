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
        if(Schema::hasColumn('courses_details', 'cdetail_author')) {
            Schema::table('courses_details', function (Blueprint $table) {
                $table->dropForeign('courses_details_cdetail_author_foreign');
                $table->dropColumn('cdetail_author');
            });
        }

        Schema::table('courses_details', function (Blueprint $table) {
            $table->unsignedBigInteger('cdetail_author')->nullable(true);
            $table->foreign('cdetail_author')->references('user_id')->on('users');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('courses_details', function (Blueprint $table) {
            $table->unsignedBigInteger('cdetail_author');
            $table->foreign('cdetail_author')->references('user_id')->on('users')->onDelete('cascade')->onUpdate('cascade');
        });
    }
};
