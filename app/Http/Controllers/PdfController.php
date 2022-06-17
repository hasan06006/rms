<?php

namespace App\Http\Controllers;

use App\Models\Rentcollection;

use Illuminate\Http\Request;
use PDF;


class PdfController extends Controller
{
    //
    function pdfgenerator($id){   

       
        $rentcollection = Rentcollection::find($id);   

        $data = [
            'title' => 'Rent Invoice',
            'date' => date('d/m/Y')
        ];
        $file_nm = $id.time().'.pdf';
        //return view('rentcollection.edit', compact('rentcollection'));
        
        $pdf = PDF::loadView('rentcollection.rentinvoice',['rentcollection'=>$rentcollection,'data'=>$data] );
    
        return $pdf->download( $file_nm);
        
       
    
    }

    function show($id){

        $rentcollection = Rentcollection::find($id);
        $data = [
            'title' => 'Rent Invoice',
            'date' => date('d/m/Y')
        ];
        
        return view('rentcollection.rentinvoice',['rentcollection'=>$rentcollection,'data'=>$data]);
    }


}
