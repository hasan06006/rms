<?php

namespace App\Http\Controllers;

use App\Models\Rentcollection;
use App\Models\Renterinfo;
use App\Models\Flatinfo;
use App\Models\Advance;
use App\Models\Rentprocessor;
use App\Models\Expense;
use App\Models\Building;



use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



class ReportController extends Controller
{
   
    function index(){ 
        $buildings = DB::table('buildings')->Where('is_active', 'YES')->get(); // For dropdown flat list from 
        return view('report.collectionparameter',['buildings'=>$buildings]);      
        
      
    
    }


    function show(Request $request){      
            
     
        $rentcollection = New Rentcollection;

        $from  =  date('Y-m-d' , strtotime($request->input('from')));       
        $to    =  date('Y-m-d' , strtotime($request->input('to'))); 

       // $from = Carbon::createFromFormat('Y-m-d', $request->input('from'));
        //$to = Carbon::createFromFormat('Y-m-d', $request->input('to'));
        $building_id    =  $request->input('building_id');  
        $is_active      =  $request->input('is_active');    
           
        
        //->Where('renterinfos.is_active', $is_active)
     //   $rentcollection = Rentcollection::whereBetween('rent_for_month', [$from, $to])->get();
        if ($is_active != 'ALL' && $building_id == 'ALL'){
            
            $rentcollection = Rentcollection::join('renterinfos', 'rentcollections.renter_id', '=', 'renterinfos.id')
                                              ->Where('renterinfos.is_active', $is_active)                                              
                                              ->Wherebetween(DB::raw('DATE(rentcollections.created_at)'), [$from, $to])
                                              ->get(['rentcollections.*', 'renterinfos.is_active']);  
            
         }elseif($is_active == 'ALL' && $building_id != 'ALL'){
            $rentcollection = Rentcollection::join('renterinfos', 'rentcollections.renter_id', '=', 'renterinfos.id')  
                                             ->Where('rentcollections.building_id', $building_id)                                           
                                             ->Wherebetween(DB::raw('DATE(rentcollections.created_at)'), [$from, $to])
                                             ->get(['rentcollections.*', 'renterinfos.is_active']);
      
         }elseif($is_active != 'ALL' && $building_id != 'ALL'){
            $rentcollection = Rentcollection::join('renterinfos', 'rentcollections.renter_id', '=', 'renterinfos.id')  
                                             ->Where('renterinfos.is_active', $is_active)    
                                             ->Where('rentcollections.building_id', $building_id)                                           
                                             ->Wherebetween(DB::raw('DATE(rentcollections.created_at)'), [$from, $to])
                                             ->get(['rentcollections.*', 'renterinfos.is_active']);

         }else{

            $rentcollection = Rentcollection::join('renterinfos', 'rentcollections.renter_id', '=', 'renterinfos.id')                                                       
                                            ->Wherebetween(DB::raw('DATE(rentcollections.created_at)'), [$from, $to])
                                            ->get(['rentcollections.*', 'renterinfos.is_active']);  
         }     
   

        return view('report.rentcollectionreport',['rentcollections'=>$rentcollection,'from'=>$from,'to'=>$to,'building_id'=>$building_id,'is_active'=>$is_active]);
           
       
    }





    function indexdue(){  
        
        $buildings = DB::table('buildings')->Where('is_active', 'YES')->get(); // For dropdown flat list from 
        return view('report.dueparameter',['buildings'=>$buildings]);      
        
     
    
    }


    function showdue(Request $request){      
            
     
        $rentcollection = New Rentcollection;

        $from  =  date('Y-m-d' , strtotime($request->input('from')));       
        $to    =  date('Y-m-d' , strtotime($request->input('to'))); 
        $building_id    =  $request->input('building_id');  
         
           
       
        //->Where('renterinfos.is_active', $is_active)
     //   $rentcollection = Rentcollection::whereBetween('rent_for_month', [$from, $to])->get();
        if ($building_id == 'ALL'){
            
          //  $rentprocessor = Rentprocessor::leftjoin('rentcollections', 'rentprocessors.renter_id', '=', 'rentcollections.renter_id')
           //                                   ->Where('rentcollections.renter_id', NULL)                                              
          //                                    ->Wherebetween('rentprocessors.rent_for_month', [$from, $to])
           //                                   ->get(['rentprocessors.*']);   

            $rentprocessor = Rentprocessor::leftjoin('rentcollections',function($join){
													$join->on('rentprocessors.renter_id', '=', 'rentcollections.renter_id')
														->on('rentprocessors.month', '=', 'rentcollections.month');
												})                                               
                                              ->Where('rentcollections.renter_id', NULL)                                              
                                              ->Wherebetween(DB::raw('DATE(rentprocessors.rent_for_month)'), [$from, $to])                                              
                                              ->get(['rentprocessors.*']);   											  
         }else{

            $rentprocessor = Rentprocessor::leftjoin('rentcollections',function($join){
													$join->on('rentprocessors.renter_id', '=', 'rentcollections.renter_id')
														->on('rentprocessors.month', '=', 'rentcollections.month');
												})  
                                            ->Where('rentcollections.renter_id', NULL) 
                                            ->Where('rentprocessors.building_id', $building_id)                                              
                                            ->Wherebetween(DB::raw('DATE(rentprocessors.rent_for_month)'), [$from, $to])
                                            ->get(['rentprocessors.*']);   
         }     
   

       return view('report.rentduereport',['rentprocessors'=>$rentprocessor,'from'=>$from,'to'=>$to,'building_id'=>$building_id]);
           
       
    }




    function indexexpense(){        
        
        return view('report.expenseparameter');
    
    }

    function showexpense(Request $request){      
            
     
        

        $from  =  date('Y-m-d' , strtotime($request->input('from')));       
        $to    =  date('Y-m-d' , strtotime($request->input('to'))); 
        $expense_type    =  $request->input('expense_type');  
         
           
       
        if ($expense_type == 'ALL'){
            
            $expense = Expense::Wherebetween(DB::raw('DATE(created_at)'), [$from, $to])            
                                ->get();        
         }else{

            $expense = Expense::Wherebetween(DB::raw('DATE(created_at)'), [$from, $to])
                                ->where('expense_type',$expense_type)
                                ->get();    
         }     
   

       return view('report.expensereport',['expenses'=>$expense,'from'=>$from,'to'=>$to,'expense_type'=>$expense_type]);
           
       
    }


    function indexadvance(){        
        
        return view('report.advanceparameter');
    
    }


    function showadvance(Request $request){      
            
     
        

        $from  =  date('Y-m-d' , strtotime($request->input('from')));       
        $to    =  date('Y-m-d' , strtotime($request->input('to'))); 
        $renter_id    =  $request->input('renter_id');  
         
           
       
        if ($renter_id == NULL){            
            $advance = Advance::Wherebetween('created_at', [$from, $to])
                                              ->get();        
         }else{

            $advance = Advance::Wherebetween('created_at', [$from, $to])
                                ->where('renter_id',$renter_id)
                                ->get();    
         }     
   

       return view('report.advancereport',['advances'=>$advance,'from'=>$from,'to'=>$to,'renter_id'=>$renter_id]);
           
       
    }





}
