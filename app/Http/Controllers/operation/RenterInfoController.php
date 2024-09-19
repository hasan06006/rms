<?php

namespace App\Http\Controllers\operation;

use App\Models\Renterinfo;
use App\Models\Flatinfo;
use App\Models\Rentcollection;
use App\Models\Advance;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Response;


class RenterInfoController extends Controller
{
    function index(){     
        //$renterinfos = DB::select('select * from renterInfos ');
       // $renterinfos = DB::table('renterinfos')->orderBy('id', 'desc')->get();
        $renterinfos = Renterinfo::orderBy('id', 'desc')->paginate(50);     
        
        return view('renterinfo.renterInfo',['renterinfos'=>$renterinfos]);
    }

    function create(){        
        $flatinfos = DB::table('flatinfos')->Where('is_active', 'AVAILABLE')->get(); // For dropdown flat list from 
        return view('renterinfo.create',['flatinfos'=>$flatinfos]);
    }

    function store(Request $request){
        
        $renterinfos = New Renterinfo;
        $renterinfos->renter_category = $request->input('renter_category');
        $renterinfos->name            = $request->input('name');
        $renterinfos->father_name     = $request->input('father_name');
        $renterinfos->nid             = $request->input('nid');
        $renterinfos->mobile          = $request->input('mobile');
        $renterinfos->Address         = $request->input('address');
        $renterinfos->assigned_flat   = $request->input('assigned_flat');
        $renterinfos->building_id   = $request->input('building_id');
        $renterinfos->renter_category = $request->input('renter_category');       
        $renterinfos->is_active       = $request->input('is_active');
        $renterinfos->created_by      = auth()->user()->id; 

        if($request->hasfile('document')){

            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();     
            $filename = time().'.'.$extension;      
            $file->move(public_path().'/uploads/documents/',$filename);
            $renterinfos->document = $filename;
        }
        
         // Code  for Update flatinfo table to is_active status change
        if($renterinfos->save()){
                DB::table('flatinfos')
                ->where('id', $renterinfos->assigned_flat)
                ->update([ 'is_active' => 'BOOKED']);
        }


        return redirect('renterinfo')->with('status','Renter Information added succesfully');
       
       
    }

    
    function show($id){     
       
        $renterinfos = Renterinfo::find($id);   
        // Code select data for Edit dropdown list assignd_flat        
        $flatinfos = DB::table('flatinfos')
        ->Where('id', $renterinfos->assigned_flat)
        ->orWhere('is_active','AVAILABLE')
        ->get();
        // END    
        return view('renterinfo.edit', compact('renterinfos','flatinfos'));
    }



    function update(Request $request, $id){     
       
        $renterinfos = Renterinfo::find($id); 
        $renterinfos->name = $request->input('name');
        $renterinfos->father_name = $request->input('father_name');
        $renterinfos->nid = $request->input('nid');
        $renterinfos->address = $request->input('address');       
        $renterinfos->renter_category = $request->input('renter_category');
        $renterinfos->is_active = $request->input('is_active');
        $renterinfos->updated_by    = auth()->user()->id; 
        
        $current_flat = $renterinfos->assigned_flat; 
        $renterinfos->assigned_flat = $request->input('assigned_flat');
        $renterinfos->building_id = $request->input('building_id');
             
 
        if($request->hasfile('document')){
            $previous_doc = public_path("uploads/documents/{$renterinfos->document}");
            if(!empty($renterinfos->document)){
                    if (File::exists($previous_doc)) { // unlink or remove previous image from folder
                        unlink($previous_doc);
                    } 
            }
            $file = $request->file('document');
            $extension = $file->getClientOriginalExtension();     
            $filename = time().'.'.$extension;      
            $file->move(public_path().'/uploads/documents/',$filename);
            $renterinfos->document = $filename;
        }           
        
        
        if($renterinfos->is_active =='ACTIVE'){          
           
            if($renterinfos->update()){
                DB::table('flatinfos')
                ->where('id', $renterinfos->assigned_flat)
                ->update([ 'is_active' => 'BOOKED']);  
               
               if($current_flat != $renterinfos->assigned_flat)
                DB::table('flatinfos')   // current flat making available
                ->where('id', $current_flat)
                ->update([ 'is_active' => 'AVAILABLE']);
               
            } 
          
           

              
         }


         if($renterinfos->is_active =='INACTIVE'){
            
            DB::table('flatinfos')
            ->where('id', $renterinfos->assigned_flat)
            ->update([ 'is_active' => 'AVAILABLE']);
            
           // $renterinfos->assigned_flat = $renterinfos->assigned_flat.'-NA';  
            $renterinfos->assigned_flat ;          
            $renterinfos->update();
           
        }

        return redirect('renterinfo')->with('status','Renter Updated Successfully');
    }




    function delete($id){     
       
        $renterinfos = Renterinfo::find($id);

        $checker = Rentcollection::select('id')       
                                   ->where('renter_id',$id)       
                                   ->doesntExist();

        $flag = false;
       
        if($checker){

            $doc_path = public_path("uploads/documents/{$renterinfos->document}");
       
            if(!empty($renterinfos->document)){
                if(File::exists($doc_path)) {
                    unlink($doc_path);        
                }
            } 
    
           

            if($renterinfos->delete()){ 
                 DB::table('flatinfos')
                ->where('id', $renterinfos->assigned_flat)
                ->update([ 'is_active' => 'AVAILABLE']);   
               
               
            }
           
        }else{

            $flag = true;
        }


        if($flag== true){             
            return redirect('renterinfo')->with('status','Failed. You Cannot delete this user');
        }else{              
            return redirect('renterinfo')->with('status','Deleted Successfully');
        } 

           
       
    }




    function profile($id){     
       
        $renterinfos = Renterinfo::find($id);   
        // Code select data for Edit dropdown list assignd_flat     
      
        $rentcollections = Rentcollection::where('renter_id','=',$id)->orderBy('rent_for_month', 'DESC')->paginate(36);
        
        $advances = Advance::where('renter_id','=',$id)->paginate(5);  

        $advancesall = Advance::where('renter_id','=',$id)->get();  ///return all transaction of required id 
          
        return view('renterinfo.profile', compact('renterinfos','rentcollections','advances','advancesall'));
    }



    function renterData($id){
       

        $flatinfos =  DB::table('flatinfos')
                     ->join('buildings', 'flatinfos.building_id', '=', 'buildings.id')
                     ->Where('flatinfos.id', $id) 
                     ->select('flatinfos.building_id','buildings.name')                  
                     ->first();         
        
       // dd($flatinfos);             
         return Response::json($flatinfos);                         
        
      
    }



    
}
