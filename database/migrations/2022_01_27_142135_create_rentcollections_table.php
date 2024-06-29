<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentcollectionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rentcollections', function (Blueprint $table) {
            $table->id();
            $table->date('rent_for_month');
            $table->string('month');
            $table->string('year');
            $table->string('flat_id');   
            $table->string('building_id');         
            $table->string('renter_id');                    
            $table->string('rent_amt');          
            $table->string('electric_bill')->nullable(); 
            $table->string('gas_bill')->nullable(); 
            $table->string('others_bill')->nullable(); 
            $table->string('rent_paid_from')->nullable();            
            $table->string('note')->nullable(); 
            $table->string('is_paid')->nullable();  
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
        Schema::dropIfExists('rentcollections');
    }
}
