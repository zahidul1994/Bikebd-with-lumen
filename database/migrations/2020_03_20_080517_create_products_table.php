<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('superadmin_id')->unsigned()->nullable();
            $table->foreign('superadmin_id')->references('id')->on('superadmins')->onDelete('cascade');   
            $table->bigInteger('admin_id')->unsigned()->nullable();
            $table->foreign('admin_id')->references('id')->on('admins')->onDelete('cascade');
            $table->string('slug')->unique();
            $table->string('productname',280);
            $table->integer('clickview')->default(0);
            $table->string('producttype')->default('new');
            $table->bigInteger('company_id')->unsigned()->nullable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');  
            $table->bigInteger('brandcategory_id')->unsigned()->nullable();
            $table->foreign('brandcategory_id')->references('id')->on('brandcategories')->onDelete('cascade');   
            $table->string('marketstatus')->default(1);
            $table->float('regularprice',8,2);
            $table->float('offerprice',8,2)->nullable();
            $table->float('displacement',8,2)->nullable();
            $table->float('mileage', 8);
            $table->float('rm', 8);
            $table->float('rpm', 8);
            $table->float('torquenm', 8);
            $table->float('torquerpm', 8);
            $table->string('enginemaximumpower')->nullable();
            $table->string('enginemaximumtorque')->nullable();
            $table->string('stroke')->nullable();
            $table->string('compressionratio')->nullable();
            $table->integer('cylinders')->nullable();
            $table->string('transmission')->nullable();
            $table->integer('gears')->nullable();
            $table->string('clutch')->nullable();
            $table->string('chassis')->nullable();
            $table->string('frontsuspension')->nullable();
            $table->string('rearsuspension')->nullable();
            $table->string('frontbrake')->nullable();
            $table->string('rearbrake')->nullable();
            $table->string('frontbrakediameter')->nullable();
            $table->string('rearbrakediameter')->nullable();
            $table->string('videoourl')->nullable();
            $table->string('abs')->nullable();
            $table->string('fronttire')->nullable();
            $table->string('reartire')->nullable();
            $table->string('tubelesstires')->nullable();
            $table->string('overalllength')->nullable();
            $table->string('overallwidth')->nullable();
            $table->string('weight')->nullable();
            $table->string('fueltankcapacity')->nullable();
            $table->string('wheelbase')->nullable();
            $table->string('voltage')->nullable();
            $table->string('battery')->nullable();
            $table->string('headlight')->nullable();
           $table->string('taillight')->nullable();
           $table->string('indicators')->nullable();
           $table->string('speedometer')->nullable();
           $table->string('odometer')->nullable();
           $table->string('rpmmeter')->nullable();
           $table->string('handle')->nullable();
           $table->string('passenger')->nullable();
           $table->string('engine')->nullable();
           $table->tinyInteger('status')->default(2);
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
        Schema::dropIfExists('products');
    }
}
