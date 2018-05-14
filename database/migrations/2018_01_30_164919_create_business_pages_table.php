<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBusinessPagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_pages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('slug')->unique();
            $table->integer('owner_id')->unsigned();
            $table->string('country')->default('Bangladesh');
            $table->string('business_name');
            $table->string('category');
            $table->string('address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('thana');
            $table->string('district');
            $table->string('division');
            $table->string('phone');
            $table->string('email');
            $table->string('website');
            $table->string('logo')->nullable();
            $table->string('banner')->nullable();
            $table->integer('review_count')->unsigned()->default(0);
            $table->smallInteger('rating')->nullable();
            $table->tinyInteger('claimed')->default(0);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();

            $table->foreign('owner_id')
                  ->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('business_pages');
    }
}
