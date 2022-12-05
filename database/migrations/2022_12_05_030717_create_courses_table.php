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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('link');
            $table->decimal('price', 17, 2);
            $table->decimal('old_price', 17, 2);
            $table->bigInteger('created_by');
            $table->bigInteger('category_id')->unsigned();
            $table->integer('lessions');
            $table->integer('view_count');
            $table->json('benefits');
            $table->json('fqa');
            $table->tinyInteger('is_feature');
            $table->tinyInteger('is_online');
            $table->text('description');
            $table->longText('content');
            $table->string('meta_title');
            $table->string('meta_desc');
            $table->string('meta_keyword');
            $table->timestamp('created_at');
            $table->timestamp('updated_at');
            $table->foreign('category_id')->references('id')->on('categories');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
