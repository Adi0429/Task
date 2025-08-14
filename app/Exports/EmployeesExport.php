<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;
use Illuminate\Support\Collection;


class EmployeesExport implements FromCollection, WithHeadings, WithStyles
{
    public function collection()
    {
       return DB::table('employees')->select('name', 'department', 'salary')->get();

    }

    public function headings(): array
    {
        return ['Name', 'Department', 'Salary'];
    }

    public function styles(Worksheet $sheet)
    {
        foreach (range('A', $sheet->getHighestColumn()) as $col) {
            if ($col === 'C') { // Salary column
                $sheet->getStyle($col)->getAlignment()->setHorizontal('right');
            } else {
                $sheet->getStyle($col)->getAlignment()->setHorizontal('left');
            }
        }
        return [];
    }
}
