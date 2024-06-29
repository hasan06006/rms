<?php

namespace App\Http\Controllers\setup;
use App\Models\Building;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    //
    function index(){

        //$flatinfos = DB::table('flatinfos')->orderBy('id', 'desc')->get();
        $buildings = Building::orderBy('id', 'desc')->paginate(50);
       return view('building.building',['buildings'=>$buildings]);
  
        
    }

    function create(){
          
       // return ("hello");
       return view('building.create');
    }

    function store(Request $request){
        
        $buildings = New Building;
     
        $buildings->name            = $request->input('name');
        $buildings->description     = $request->input('description');      
        $buildings->is_active       = $request->input('is_active');
        $buildings->created_by      = auth()->user()->id; 
       

        $buildings->save();
        return redirect('building')->with('status','Building Information added succesfully');
       
       
    }


    function show($id){     
       
        $buildings = Building::find($id);    
        return view('building.edit', compact('buildings'));
    }

    function update(Request $request, $id){     
       
        $buildings = Building::find($id);      
     
        $buildings->name            = $request->input('name');
        $buildings->description     = $request->input('description');      
        $buildings->is_active       = $request->input('is_active');
        $buildings->updated_by      = auth()->user()->id; 
       
       
        $buildings->update();         
        return redirect('building')->with('status','Building Info Updated Successfully');
    }

    
    function delete($id){     
       
        $buildings = Building::find($id);      
        
     
            $buildings->delete();  
        
        
                  
            return redirect('building')->with('status','Deleted Succesfully ');
      
          
    }

}
