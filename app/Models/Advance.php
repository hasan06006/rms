<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advance extends Model
{
    use HasFactory;
    protected $table = 'advances';

    protected $fillable = [
        'flat_id',
        'building_id',
        'name',      
        'renter_id',       
        'credit_amt',
                
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

    public function createsby(){
        return $this->belongsTo(User::class, 'created_by','id');
      
    }

    public function updateby(){
        return $this->belongsTo(User::class, 'updated_by','id');
      
    }
    
}

