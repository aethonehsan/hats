<?php

namespace App\Http\Controllers;
use PDF;
use Illuminate\Http\Request;

class PDFController extends Controller
{
    public function generatePDF()
    {
        $data = ['title' => 'domPDF in Laravel 10'];
        $pdf = PDF::loadView('app.PDF.document', $data);
        return $pdf->download('document.pdf');
    }
}
