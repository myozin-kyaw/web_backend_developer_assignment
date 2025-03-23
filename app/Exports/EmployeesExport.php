<?php

namespace App\Exports;

use App\Models\Employee;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class EmployeesExport implements FromCollection, WithHeadings
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Employee::query()
            ->select('id', 'first_name', 'last_name', 'email', 'phone', 'address', 'salary')
            ->get();
    }

    public function headings(): array
    {
        return [
            'No.',
            'First Name',
            'Last Name',
            'Email',
            'Phone',
            'Address',
            'Salary'
        ];
    }
}
