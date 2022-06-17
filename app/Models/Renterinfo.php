<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renterinfo extends Model
{
    use HasFactory;
    protected $table = 'renterinfos';

    protected $fillable = [
        'name',
        'father_name',
        'nid',
        'mobile',
        'address',
        'assigned_flat',
        'building_id',
        'renter_category',
        'document',
        'is_active',
    ];

    public function flatinfo(){
        return $this->belongsTo(Flatinfo::class, 'assigned_flat','id');
     
    }
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
