<?php

namespace App\Http\Controllers\operation;
use App\Models\Expense;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ExpenseController extends Controller
{
    function index(){       
        //$expenses = DB::table('expenses')->orderBy('id', 'desc')->get();
        $expenses = Expense::orderBy('id', 'desc')->paginate(50);
        return view('expense.expense',['expenses'=>$expenses]);
    }

    function create(){
<<<<<<< HEAD

        return view('expense.create');
=======
        $expense_types = DB::table('expense_types')->Where('is_active', 'YES')->get(); // For dropdown flat list from 
        return view('expense.create',['expense_types'=>$expense_types]);     
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d
    }

    function store(Request $request){
        
        $expenses = New Expense;

        $expenses->expense_type  = $request->input('expense_type');      
        $expenses->amount        = $request->input('amount');
        $expenses->note          = $request->input('note');  
        $expenses->created_by      = auth()->user()->id;      
       

        $expenses->save();
        return redirect('expense')->with('status','Succesfully Inserted');
       
       
    }


    
    function show($id){     
       
<<<<<<< HEAD
        $expenses = Expense::find($id);    
        return view('expense.edit', compact('expenses'));
=======
        $expenses = Expense::find($id);   
        $expense_types = DB::table('expense_types')->Where('is_active', 'YES')->get();  
        return view('expense.edit', compact('expenses','expense_types'));
>>>>>>> 0c9b7fcf868cad50011cb798b5a5cd1c997e4f9d
    }


    function update(Request $request, $id){     
       
        $expenses = Expense::find($id); 
        $expenses->expense_type  = $request->input('expense_type');      
        $expenses->amount        = $request->input('amount');
        $expenses->note          = $request->input('note'); 
        $expenses->updated_by    = auth()->user()->id;       
       
        $expenses->update();         
        return redirect('expense')->with('status','Expense Updated Successfully');
    }

    
    function delete($id){     
       
        $expenses = Expense::find($id);        
        $expenses->delete();    
        return redirect('expense')->with('status',' Deleted Succesfully ');
    }



}
