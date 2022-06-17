<?php

namespace App\Http\Controllers\setup;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RentSetupController extends Controller
{
    function index(){

        return view('setup.rentsetup');
    }
}
