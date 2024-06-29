<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rentprocessor extends Model
{
    use HasFactory;

    protected $table = 'rentprocessors';

    protected $fillable = [
        'rent_for_month',
        'month',
        'year',
        'flat_id',
        'building_id',      
        'renter_id',       
        'rent_amt',
        'electric_bill',
        'gas_bill',
        'others_bill',
        'rent_paid_from',
        'note',
        'is_paid',  
        'created_by',
        'updated_by', 

    ];



   
    public function flatinfo(){
        return $this->belongsTo(Flatinfo::class, 'flat_id','id');
     
    }

    public function buildinginfo(){
        return $this->belongsTo(Building::class, 'building_id','id');
     
    }

    public function renterinfo(){
        return $this->belongsTo(Renterinfo::class, 'renter_id','id');
      
    }




}
