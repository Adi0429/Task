<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Exports\EmployeesExport;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class ExportController extends Controller
{
    
    public function exportExcel()
    {
        return Excel::download(new EmployeesExport, 'employees.xlsx');
    }

    
    public function exportPDF()
    {
        $data = DB::table('employees')
            ->select('name', 'department', 'salary')
            ->get();

       
        $fontSize = ($data->isNotEmpty() && count((array)$data[0]) > 5) ? 8 : 12;

        return Pdf::loadView('pdf.employees', compact('data', 'fontSize'))
                  ->download('employees.pdf');
    }
}

