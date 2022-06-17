<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Renterinfo;
use App\Models\Flatinfo;

class DashboardController extends Controller
{

    
   
   
    function index(){

        $total_flat = Flatinfo::count();
        $total_booked_flat = Flatinfo::where('is_active','=','BOOKED')->count();
        $total_available_flat = Flatinfo::where('is_active','=','AVAILABLE')->count();
        $total_positioned = Flatinfo::where('renter_category','=','POSITIONED')->count();
        $total_general = Flatinfo::where('renter_category','=','GENERAL')->count();
        
        return view('frontend.dashboard',['total_flat'=>$total_flat,'total_booked_flat'=>$total_booked_flat,'total_available_flat'=>$total_available_flat,'total_positioned'=>$total_positioned,'total_general'=>$total_general]);
    }
}
