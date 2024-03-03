<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Bill;
use My_func;
use DateTime;
use DateInterval;

class PdfController extends Controller
{
    public function pdf_download()
    {

        $date = new DateTime();
        $date->sub(new DateInterval('P1M'));
        $dateYm = $date->format('Y-m');
        $year = $date->format('Y');
        $lastMonth = $date->format('n');

        $bills = Bill::orderby('issue_date', 'ASC')
                    ->where('issuer', '!=', '1')
                    ->whereYear('issue_date', $year)
                    ->whereMonth('issue_date', $date->format('m'))
                    ->get();

        foreach($bills as $bill){
            $dueDateWareki = My_func::wareki(substr($bill->due_date, 0, 4));
            $dueDateWareki = preg_replace('/[^0-9]/', '', $dueDateWareki);
            $bill->due_date_wareki = $dueDateWareki;
        }

        $paybills = Bill::orderby('issue_date', 'ASC')
                    ->where('issuer', '=', '1')
                    ->whereYear('issue_date', $year)
                    ->whereMonth('issue_date', $date->format('m'))
                    ->get();

        foreach($paybills as $bill){
            $dueDateWareki = My_func::wareki(substr($bill->due_date, 0, 4));
            $dueDateWareki = preg_replace('/[^0-9]/', '', $dueDateWareki);
            $bill->due_date_wareki = $dueDateWareki;
        }

        $wareki = My_func::wareki($year);

        $mpdf = PDF::loadView('pdf.pdf', compact(['bills', 'wareki', 'lastMonth', 'year', 'paybills', 'dateYm']))
                    ->setOption('isPhpEnabled', true)
                    ->setPaper('a4', 'landscape');

        return $mpdf->download($dateYm.'受取・支払手形.pdf');
    }
}
