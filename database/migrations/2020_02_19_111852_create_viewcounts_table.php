<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViewcountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viewcounts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger("post_id");//note that the Laravel way of defining foreign keys is "table-singular-name_id", so it's preferable to use that
            $table->string("titleslug");
            $table->string("url");
            $table->string("session_id");
            $table->unsignedInteger('user_id')->nullable();//here note to make it nullable if your page is accessible publically as well not only by logged in users. Also its more appropriate to have "unsignedInteger" type instead of "string" type as mentioned in Jean Marcos' answer because user_id will save same data as id field of users table which in most cases will be an auto incremented id.
            $table->string("ip");
            $table->string("agent");
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
        Schema::dropIfExists('viewcounts');
    }
}
