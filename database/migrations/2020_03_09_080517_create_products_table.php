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
            $table->bigInteger('brand_id')->unsigned()->nullable();
            $table->foreign('brand_id')->references('id')->on('companies')->onDelete('cascade'); 
            $table->bigInteger('brandcategory_id')->unsigned()->nullable();
            $table->foreign('brandcategory_id')->references('id')->on('brandcategories')->onDelete('cascade');  
            $table->integer('clickview')->default(0);
            $table->string('title',280);
            $table->string('slug')->unique();
            $table->string('cc');
            $table->string('producttype')->default('new');
            $table->string('marketstatus')->default(1);
            $table->string('keyword');
            $table->float('regularprice',8,2);
            $table->float('offerprice',8,2)->nullable();
            $table->string('offerurl')->nullable();
            $table->float('displacement',8,2)->nullable();
            $table->float('mileage', 8);
            $table->float('rm', 8);
            $table->float('rpm', 8);
            $table->float('torquenm', 8);
            $table->float('torquerpm', 8);
            $table->string('engine')->nullable();
            $table->string('enginemaximumpower')->nullable();
            $table->string('enginemaximumtorque')->nullable();
            $table->string('bore')->nullable();
            $table->string('stroke')->nullable();
            $table->string('compressionratio')->nullable();
            $table->string('cylinder')->nullable();
            $table->integer('gears')->nullable();
            $table->string('clutch')->nullable();
            $table->string('transmission')->nullable();
            $table->string('chassis')->nullable();
            $table->string('frontsuspension')->nullable();
            $table->string('rearsuspension')->nullable();
            $table->string('frontbrake')->nullable();
            $table->string('rearbrake')->nullable();
            $table->string('frontbrakediameter')->nullable();
            $table->string('rearbrakediameter')->nullable(); 
            $table->string('abs')->nullable();
            $table->string('ftyre')->nullable();
            $table->string('rtyre')->nullable();
            $table->string('tubeless')->nullable();
            $table->string('overalllength')->nullable();
            $table->string('overallwidth')->nullable();
            $table->string('groundclearness')->nullable();
            $table->string('weight')->nullable();
            $table->string('ftcapacity')->nullable();
            $table->string('wheelbase')->nullable();
            $table->string('battery')->nullable();
            $table->string('bvoltage')->nullable();
            $table->string('headlight')->nullable();
            $table->string('taillight')->nullable();
            $table->string('indicators')->nullable();
            $table->string('speedometer')->nullable();
            $table->string('odometer')->nullable();
            $table->string('rpmmeter')->nullable();
            $table->string('handle')->nullable();
            $table->string('seattype')->nullable();
            $table->string('passenger')->nullable();
            $table->string('engineks')->nullable();
            $table->string('featureimage')->nullable();
            $table->string('shortdescription')->nullable();
            $table->string('embedurl')->nullable();
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
