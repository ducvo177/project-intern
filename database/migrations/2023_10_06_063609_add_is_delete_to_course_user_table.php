<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsDeleteToCourseUserTable extends Migration
{
    public function up()
    {
        Schema::table('course_user', function (Blueprint $table) {
            $table->boolean('is_delete')->default(false);
        });
    }

    public function down()
    {
        Schema::table('course_user', function (Blueprint $table) {
            $table->dropColumn('is_delete');
        });
    }
}

