<?php

namespace App\Http\Controllers\Pdf;

use App\Http\Controllers\Controller;
use App\Models\ProcessInvestment;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function view()
    {
        $pdf = Pdf::setOptions(['defaultFont' => 'Montserrat', "enable_remote" => true,])
            ->loadView('pdf.application2');

        return $pdf->stream();
    }
    public function application(ProcessInvestment $processInvestment)
    {
        $pdf = Pdf::setOptions(['defaultFont' => 'Montserrat', "enable_remote" => true,])
            ->loadView('pdf.application', compact('processInvestment'));

        return $pdf->stream();
    }

    public function precontract(ProcessInvestment $processInvestment)
    {

        $pre =  true;
        // return view('pdf.contract', compact('processInvestment', 'pre'));
        $pdf = Pdf::setOptions(["enable_remote" => true,"enable_php" => true,"enable_javascript" => true, "default_font" => "Montserrat"])
            ->loadView('pdf.contract', compact('processInvestment', 'pre'));
        return $pdf->stream();
    }

    public function contract(ProcessInvestment $processInvestment)
    {
        $pre =  false;
        $pdf = Pdf::setOptions(["enable_remote" => true,"enable_php" => true,"enable_javascript" => true, "default_font" => "Montserrat",])
            ->loadView('pdf.contract', compact('processInvestment', 'pre'));
        return $pdf->stream();
    }
}
