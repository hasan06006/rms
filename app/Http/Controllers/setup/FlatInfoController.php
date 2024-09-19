<?php

namespace App\Http\Controllers\setup;
use App\Models\Flatinfo;
use App\Models\Rentcollection;
use App\Models\Renterinfo;
use App\Models\Building;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class FlatInfoController extends Controller
{
    function index(){

        //$flatinfos = DB::table('flatinfos')->orderBy('id', 'desc')->get();
        $flatinfos = Flatinfo::orderBy('id', 'desc')->paginate(50);
        return view('flatinfo.flatinfo',['flatinfos'=>$flatinfos]);
        
    }

    function create(){

        $buildings = DB::table('buildings')->Where('is_active', 'YES')->get(); // For dropdown flat list from 
        return view('flatinfo.create',['buildings'=>$buildings]);       
    }

    function store(Request $request){
        
        $flatinfos = New Flatinfo;
        $flatinfos->building_id            = $request->input('building_id');
        $flatinfos->name            = $request->input('name');
        $flatinfos->renter_category = $request->input('renter_category');
        $flatinfos->rent_amt        = $request->input('rent_amt');
        $flatinfos->note            = $request->input('note');
        $flatinfos->is_active       = $request->input('is_active');
        $flatinfos->created_by           = auth()->user()->id; 
       

        $flatinfos->save();
        return redirect('flatinfo')->with('status','Flat Information added succesfully');
       
       
    }


    function show($id){     
       
        $flatinfos = Flatinfo::find($id);  
        $buildings = DB::table('buildings')->Where('is_active', 'YES')->get();  
        return view('flatinfo.edit', compact('flatinfos','buildings'));
    }

    function update(Request $request, $id){     
       
        $flatinfos = Flatinfo::find($id); 
        $flatinfos->building_id     = $request->input('building_id');
        $flatinfos->name            = $request->input('name');
        $flatinfos->renter_category = $request->input('renter_category');
        $flatinfos->rent_amt        = $request->input('rent_amt');
        $flatinfos->note            = $request->input('note');
        $flatinfos->is_active       = $request->input('is_active');
        $flatinfos->updated_by           = auth()->user()->id; 
       
        $flatinfos->update();         
        return redirect('flatinfo')->with('status','Flat Updated Successfully');
    }

    
    function delete($id){     
       
        $flatinfos = Flatinfo::find($id);      
        
        $checker = Rentcollection::select('id')       
                                   ->where('flat_id',$id)       
                                   ->doesntExist();
        
        $checker2 = Renterinfo::select('id')       
                                   ->where('assigned_flat',$id)       
                                   ->doesntExist();                           

         $flag = false;

         if($checker && $checker2 && $flatinfos->is_active =='AVAILABLE'){ 
            $flatinfos->delete();  
         }else{
            $flag = true;
         }   
        
        if($flag== true){             
            return redirect('flatinfo')->with('status','Failed. You Cannot delete this flat.');
        }else{              
            return redirect('flatinfo')->with('status','Deleted Succesfully ');
        } 
          
    }


}

