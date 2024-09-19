<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;
    protected $table = 'expenses';

    protected $fillable = [
        'expense_type',      
        'amount',       
        'note',     
    ];



    public function expensetypeinfo(){
        return $this->belongsTo(Expense_type::class, 'expense_type','id');
     
    }


    public function createsby(){
        return $this->belongsTo(User::class, 'created_by','id');
      
    }

    public function updateby(){
        return $this->belongsTo(User::class, 'updated_by','id');
      
    }
}
