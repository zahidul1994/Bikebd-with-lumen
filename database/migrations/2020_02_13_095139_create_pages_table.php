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
            $table->bigIncrements('id');
            $table->string('slug')->unique();
            $table->string('language')->default('en');
            $table->integer('clickview')->default(0);
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->bigInteger('superadmin_id')->unsigned()->nullable();
            $table->foreign('superadmin_id')->references('id')->on('superadmins')->onDelete('cascade');   
            $table->bigInteger('parentpage_id')->unsigned()->nullable();
            $table->foreign('parentpage_id')->references('id')->on('parentpages')->onDelete('cascade');   
            $table->string('pagetitle',500);
            $table->string('pagename')->unique();
            $table->string('pageurl')->nullable();
            $table->string('pagemetadescription',500)->nullable();
            $table->text('pageimage')->nullable();
            $table->text('pagekeyword')->nullable();
            $table->tinyInteger('status')->default(2);
            $table->longText('description');
            $table->timestamps();
            $table->softDeletes();
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
