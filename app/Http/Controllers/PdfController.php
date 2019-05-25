<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use PDF;

class PdfController extends Controller
{
	public function index()
	{
    $data = ['name'=>'Jaga'];
		// Send data to the view using loadView function of PDF facade
    $pdf = PDF::loadView('pdf.test', $data);
    // If you want to store the generated pdf to the server then you can use the store function
    // $pdf->save(storage_path().'_pdf_jaga.pdf');
    // Finally, you can download the file using download function
    // return $pdf->download('customer1s.pdf');

    return $pdf->stream('customer1s.pdf');
	}

}
