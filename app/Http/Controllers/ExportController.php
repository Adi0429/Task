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
        $data = DB::table('employees')->select('name', 'department', 'salary')->get();
        $columnCount = count((array)$data[0]);

        $fontSize = $columnCount > 5 ? 8 : 12; // Auto adjust size
        $pdf = Pdf::loadView('pdf.employees', [
            'data' => $data,
            'fontSize' => $fontSize
        ]);
        return $pdf->download('employees.pdf');
    }
}

