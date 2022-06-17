<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRenterinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('renterinfos', function (Blueprint $table) {
            $table->id();
            $table->string('name'); 
            $table->string('father_name');          
            $table->string('nid');           
            $table->string('mobile');   
            $table->string('address'); 
            $table->string('assigned_flat'); 
            $table->string('building_id');
            $table->string('renter_category');           
            $table->string('document');
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
        Schema::dropIfExists('renterinfos');
    }
}
