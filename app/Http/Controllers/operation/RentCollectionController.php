<?php

namespace App\Http\Controllers\operation;

use App\Models\Rentcollection;
use App\Models\Renterinfo;
use App\Models\Flatinfo;
use App\Models\Advance;
use App\Models\Rentprocessor;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Response;


class RentCollectionController extends Controller
{
    function index(){
        $Rentcollections = Rentcollection::orderBy('id', 'desc')->paginate(50);
        
        return view('rentcollection.rentcollection',['rentcollections'=>$Rentcollections]);
    }

    function create(){
        $flatinfos =DB::table('flatinfos')->Where('is_active', 'BOOKED')->get();  // For dropdown flat list from 
        return view('rentcollection.create',['flatinfos'=>$flatinfos]);     
    }

    function store(Request $request){
        
        $rentcollection = New Rentcollection;
        

        $checker = Rentcollection::select('id')
                                ->where('month',date('F' , strtotime($request->input('rent_for_month'))))
                                ->where('year',date('Y' , strtotime($request->input('rent_for_month'))))
                                ->where('flat_id',$request->input('flat_id'))
                                ->where('building_id',$request->input('building_id'))
                                ->where('renter_id',$request->input('renter_id'))
                                ->where('rent_amt',$request->input('rent_amt'))
                                ->doesntExist();
        
        $flag = false;  

        if($checker){


                    $rentcollection->rent_for_month       =  date('Y-m-d' , strtotime($request->input('rent_for_month')));
                    $rentcollection->month                =  date('F' , strtotime($request->input('rent_for_month')));
                    $rentcollection->year                 =  date('Y' , strtotime($request->input('rent_for_month')));      
                    $rentcollection->flat_id              = $request->input('flat_id'); 
                    $rentcollection->building_id          = $request->input('building_id');       
                    $rentcollection->renter_id            = $request->input('renter_id');
                    $rentcollection->rent_amt             = $request->input('rent_amt');
                    $rentcollection->electric_bill        = $request->input('electric_bill');
                    $rentcollection->gas_bill             = $request->input('gas_bill');
                    $rentcollection->others_bill          = $request->input('others_bill');
                    $rentcollection->rent_paid_from       = $request->input('rent_paid_from');
                    $rentcollection->note                 = $request->input('note');   
                    $rentcollection->created_by           = auth()->user()->id; 
            
            
                    
            
                    if($rentcollection->save()){
            
                        if($rentcollection->rent_paid_from == 'ADVANCE'){
                        
                            $advances = New Advance;
                            $rentcollection->name    = $request->input('name');
                            $advances->flat_id       = $rentcollection->flat_id;      
                            $advances->name          = $rentcollection->name;
                            $advances->renter_id     = $rentcollection->renter_id;
                            $advances->debit_amt     = $rentcollection->rent_amt;
                            $advances->note          = $rentcollection->note;   
                            $advances->created_by    = $rentcollection->created_by;  
                            
                            $advances->save();
                        }   
                        
                    }

            
            $flag = true;

        }


        if($flag == true){
            return redirect('rentcollection')->with('status','Inserted Sucessfully');
        }else{
            return redirect('rentcollection')->with('status','Failed No Duplicate entry is not allowed for the same month');
        } 
       
       
        
       
       
    }



    function show($id){     
       
        $rentcollection = Rentcollection::find($id);   

        $flatinfos =DB::table('flatinfos')->Where('is_active', 'BOOKED')->get(); 

        return view('rentcollection.edit', compact('rentcollection','flatinfos'));
    }


    function update(Request $request, $id){     
       
        $rentcollection = Rentcollection::find($id); 

        $existing_value = $rentcollection->rent_paid_from ; 
        $existing_month = $rentcollection->month; 

        $rentcollection->rent_for_month       =  date('Y-m-d' , strtotime($request->input('rent_for_month')));
        $rentcollection->month                =  date('F' , strtotime($request->input('rent_for_month')));
        $rentcollection->year                 =  date('Y' , strtotime($request->input('rent_for_month')));      
        $rentcollection->flat_id              = $request->input('flat_id');  
        $rentcollection->building_id          = $request->input('building_id');     
        $rentcollection->renter_id            = $request->input('renter_id');
        $rentcollection->rent_amt             = $request->input('rent_amt');
        $rentcollection->electric_bill        = $request->input('electric_bill');
        $rentcollection->gas_bill             = $request->input('gas_bill');
        $rentcollection->others_bill          = $request->input('others_bill');
        $rentcollection->rent_paid_from       = $request->input('rent_paid_from');
        $rentcollection->note                 = $request->input('note');   
        $rentcollection->updated_by           = auth()->user()->id;   

        
        
        
        $flag = false;  
        
        
        if( $existing_month == date('F' , strtotime($request->input('rent_for_month')))){

                if($rentcollection->update()){

                    if($rentcollection->rent_paid_from == 'ADVANCE' &&  $existing_value != $rentcollection->rent_paid_from  ){
                    
                        $advances = New Advance;
                        $rentcollection->name    = $request->input('name');
                        $advances->flat_id       = $rentcollection->flat_id;      
                        $advances->name          = $rentcollection->name;
                        $advances->renter_id     = $rentcollection->renter_id;
                        $advances->debit_amt     = $rentcollection->rent_amt; // This will Debit advance amount
                        $advances->note          = $rentcollection->note;   
                        $advances->created_by    = $rentcollection->created_by;  
                        
                        $advances->save();
                    }
        
                    if($rentcollection->rent_paid_from == 'GENERAL' &&  $existing_value != $rentcollection->rent_paid_from  ){
                    
                        $advances = New Advance;
                        $rentcollection->name    = $request->input('name');
                        $advances->flat_id       = $rentcollection->flat_id;      
                        $advances->name          = $rentcollection->name;
                        $advances->renter_id     = $rentcollection->renter_id;
                        $advances->credit_amt     = $rentcollection->rent_amt; // This will credit advance amount
                        $advances->note          = $rentcollection->note;   
                        $advances->created_by    = $rentcollection->created_by;  
                        
                        $advances->save();
                    }              
                
               }

            $flag = true;


        }else{

              
            $checker = Rentcollection::select('id')
                                        ->where('month',date('F' , strtotime($request->input('rent_for_month'))))
                                        ->where('year',date('Y' , strtotime($request->input('rent_for_month'))))
                                        ->where('flat_id',$request->input('flat_id'))
                                        ->where('building_id',$request->input('building_id'))
                                        ->where('renter_id',$request->input('renter_id'))
                                        ->where('rent_amt',$request->input('rent_amt'))                               
                                        ->doesntExist();

            if($checker){

                if($rentcollection->update()){

                    if($rentcollection->rent_paid_from == 'ADVANCE' &&  $existing_value != $rentcollection->rent_paid_from  ){
                    
                        $advances = New Advance;
                        $rentcollection->name    = $request->input('name');
                        $advances->flat_id       = $rentcollection->flat_id;      
                        $advances->name          = $rentcollection->name;
                        $advances->renter_id     = $rentcollection->renter_id;
                        $advances->debit_amt     = $rentcollection->rent_amt; // This will Debit advance amount
                        $advances->note          = $rentcollection->note;   
                        $advances->created_by    = $rentcollection->created_by;  
                        
                        $advances->save();
                    }
        
                    if($rentcollection->rent_paid_from == 'GENERAL' &&  $existing_value != $rentcollection->rent_paid_from  ){
                    
                        $advances = New Advance;
                        $rentcollection->name    = $request->input('name');
                        $advances->flat_id       = $rentcollection->flat_id;      
                        $advances->name          = $rentcollection->name;
                        $advances->renter_id     = $rentcollection->renter_id;
                        $advances->credit_amt     = $rentcollection->rent_amt; // This will credit advance amount
                        $advances->note          = $rentcollection->note;   
                        $advances->created_by    = $rentcollection->created_by;  
                        
                        $advances->save();
                    }              
                
               }



               $flag = true;

            }                            


        }
               
            
         

        if($flag == true){
            return redirect('rentcollection')->with('status','Updated Sucessfully');
        }else{
            return redirect('rentcollection')->with('status','Failed No Duplicate entry is not allowed for the same month');
        } 
       

        
    }


    function delete($id){     
       
        $rentcollection = Rentcollection::find($id);        
        $rentcollection->delete();    
        return redirect('rentcollection')->with('status',' Deleted Succesfully ');
    }



    function renterData($id){
       

        $renterinfos = DB::table('renterinfos')
                    ->join('flatinfos', 'renterinfos.assigned_flat', '=', 'flatinfos.id')
                    ->join('buildings', 'flatinfos.building_id', '=', 'buildings.id')
                    ->Where('assigned_flat', $id)  
                    ->select('renterinfos.id','renterinfos.name', 'buildings.name as bname', 'flatinfos.building_id','flatinfos.rent_amt','flatinfos.renter_category')
                    ->first();        
        
         return Response::json($renterinfos);      
         
        
        
      
    }

   
    function prodata(){

        $Rentprocessor = Rentprocessor::orderBy('id', 'desc')->paginate(50);
        
        return view('rentcollection.processdata',['rentprocessors'=>$Rentprocessor]);      
        
    }

    function processform(){
      
        return view('rentcollection.proform');     
    }

  

    function process(Request $request){     
       
        $Rentprocessor = New Rentprocessor;
       // $total_active_renter = Renterinfo::where('is_active','=','ACTIVE')->count();
        $renterinfos = Renterinfo::join('flatinfos', 'renterinfos.assigned_flat', '=', 'flatinfos.id')  
                    ->where('renterinfos.is_active','=','ACTIVE')                 
                    ->select('renterinfos.id','renterinfos.name','renterinfos.assigned_flat', 'flatinfos.building_id','flatinfos.rent_amt','flatinfos.renter_category')
                    ->get();
                  
                    //dd($renterinfos);

                   //$data = [];

                 // $created_by = auth()->user()->id;
              
                 $flag = false;

                   foreach ($renterinfos as $key=>$renterinfo) {   
                       
                        $checker = Rentprocessor::select('id')
                                                ->where('month',date('F' , strtotime($request->input('rent_for_month'))))
                                                ->where('year',date('Y' , strtotime($request->input('rent_for_month'))))
                                                ->where('flat_id',$renterinfo->assigned_flat)
                                                ->where('building_id',$renterinfo->building_id)
                                                ->where('renter_id',$renterinfo->id)
                                                ->where('rent_amt',$renterinfo->rent_amt)
                                                ->doesntExist();

                        if($checker){

                            Rentprocessor::create([
                                'rent_for_month' => date('Y-m-d' , strtotime($request->input('rent_for_month'))),
                                'month'          => date('F' , strtotime($request->input('rent_for_month'))),
                                'year'           => date('Y' , strtotime($request->input('rent_for_month'))),
                                'flat_id'        => $renterinfo->assigned_flat, 
                                'building_id'    => $renterinfo->building_id, 
                                'renter_id'      => $renterinfo->id, 
                                'rent_amt'       => $renterinfo->rent_amt,
                                'electric_bill'  => "",
                                'gas_bill'       => "",
                                'others_bill'    => "",
                                'rent_paid_from' => "",
                                'note'           => "",
                                'is_paid'        => "",  
                                'created_by'     => "1",
                                'updated_by'     => "",
                            ]); 

                        }else{
                             $flag = true;
                        }        
                      
                    
                } 
             
            if($flag== true){             
                return redirect('dataprocessing')->with('status','failed');
            }else{              
                return redirect('dataprocessing')->with('status','success');
            } 
                
               
                
                
          
    }


}
