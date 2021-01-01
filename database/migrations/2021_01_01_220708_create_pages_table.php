<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pages', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->text('description')->nullable();
            $table->string('short_description')->nullable();

            $table->string('header_1')->nullable();
            $table->string('header_2')->nullable();
            $table->text('content_1')->nullable();
            $table->text('content_2')->nullable();
            $table->text('content_3')->nullable();
            $table->text('content_4')->nullable();
            $table->text('notes')->nullable();

            $table->boolean('online')->default(false);

            $table->unsignedInteger('order')->nullable();

            $table->foreignId('parent_id')->nullable();
            $table->foreign('parent_id')->references('id')->on('pages');

            $table->softDeletes();
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
        Schema::dropIfExists('pages');
    }
}
