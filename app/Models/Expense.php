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

<<<<<<< HEAD
=======
    public function expensetypeinfo(){
        return $this->belongsTo(Expense_type::class, 'expense_type','id');
     
    }
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d

    public function createsby(){
        return $this->belongsTo(User::class, 'created_by','id');
      
    }

    public function updateby(){
        return $this->belongsTo(User::class, 'updated_by','id');
      
    }
}
