<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flatinfo extends Model
{
    use HasFactory;
    protected $table = 'flatinfos';

    protected $fillable = [    
        'building_id',   
        'name',      
        'renter_category',
        'rent_amt',
        'note',        
        'is_active',
    ];

    public function buildinginfo(){
        return $this->belongsTo(Building::class, 'building_id','id');
     
    }

    public function createsby(){
        return $this->belongsTo(User::class, 'created_by','id');
      
    }

    public function updateby(){
        return $this->belongsTo(User::class, 'updated_by','id');
      
    }



}
