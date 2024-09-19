<?php

namespace App\Http\Controllers\operation;

use App\Models\Renterinfo;
use App\Models\Flatinfo;
use App\Models\Advance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;
use Auth;

class AdvanceController extends Controller
{
    function index(){      

       // $advances = DB::table('advances')->orderBy('id', 'desc')->get();  
        $advances = Advance::orderBy('id', 'desc')->paginate(50);
          
        return view('advance.advance',['advances'=>$advances]);
    }

    function create(){

        $flatinfos =DB::table('flatinfos')->Where('is_active', 'BOOKED')->get();  // For dropdown flat list from 
        return view('advance.create',['flatinfos'=>$flatinfos]);
       
    }


    function store(Request $request){
        
        $advances = New Advance;

        $advances->flat_id       = $request->input('flat_id');
        $advances->building_id   = $request->input('building_id');      
        $advances->name          = $request->input('name');
        $advances->renter_id     = $request->input('renter_id');
        $advances->credit_amt    = $request->input('credit_amt');
        $advances->note          = $request->input('note');   
        $advances->created_by    = auth()->user()->id; 

   
        $advances->save();
        return redirect('advance')->with('status','Succesfully Inserted');
       
       
    }

    function show($id){     
       
        $advances = Advance::find($id);   

        $flatinfos = DB::table('flatinfos')
        ->Where('is_active','BOOKED')
        ->get();

        return view('advance.edit', compact('advances','flatinfos'));
    }


    function update(Request $request, $id){     
       
        $advances = Advance::find($id); 
        $advances->flat_id       = $request->input('flat_id');
        $advances->building_id   = $request->input('building_id');       
        $advances->name          = $request->input('name');
        $advances->renter_id     = $request->input('renter_id');
        $advances->credit_amt      = $request->input('credit_amt');
        $advances->note          = $request->input('note');   
        $advances->updated_by    = auth()->user()->id;      
       
        $advances->update();         
        return redirect('advance')->with('status',' Updated Successfully');
    }


    function delete($id){     
       
        $advances = Advance::find($id);        
        $advances->delete();    
        return redirect('advance')->with('status',' Deleted Succesfully ');
    }



    function renterData($id){
       

        $renterinfos =  DB::table('renterinfos')
                     ->Where('assigned_flat', $id)                   
                     ->first();         
        
         return Response::json($renterinfos);                         
        
      
    }
}
