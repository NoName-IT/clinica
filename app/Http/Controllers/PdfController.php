<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Internment\InternmentController;

class PdfController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
	public function invoice() 
    {
		//$data = $this->getData();
        $id = '200';
        $internment = $this->pdfInternment($id);
		
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.clinichistory', compact('internment', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->setPaper('A4');
        $pdf->loadHTML($view);
        return $pdf->stream('pdf.clinichistory');
    }
 
    public function pdfInternment($id){
    	$internment = InternmentController::getInternment($id);
    	//dd($internment);
    	return $internment;
    }

    public function getData() 
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }
}
