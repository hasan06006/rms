<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFlatinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('flatinfos', function (Blueprint $table) {
            $table->id();
            $table->string('building_id');
            $table->string('name'); 
            $table->string('renter_category');          
            $table->string('rent_amt');           

            $table->string('note');   

            $table->string('note')->nullable();   

            $table->string('is_active');
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();           
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
        Schema::dropIfExists('flatinfos');
    }
}
