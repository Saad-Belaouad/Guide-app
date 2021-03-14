<?php

namespace App\Http\Controllers;

use App\Seance;
use App\User;
use PDF;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Writer\Pdf as WriterPdf;

class ExportpdfController extends Controller
{
    public function pdf()
	{
        $user=User::getuser();
		$data =Seance::getseances();
		$pdf = PDF::loadView('teacherspace.pdf.seancesdocument',compact('data','user'));
		return $pdf->stream('seancesdocument.pdf');
	}
}
