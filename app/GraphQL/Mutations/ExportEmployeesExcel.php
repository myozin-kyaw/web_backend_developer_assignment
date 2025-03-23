<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Exports\EmployeesExport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

final readonly class ExportEmployeesExcel
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        $fileName = 'employees_' . now()->timestamp . '.xlsx';
        $path = 'exports/' . $fileName;

        // Store the file in storage/app/public/exports
        Excel::store(new EmployeesExport, $path, 'public',  \Maatwebsite\Excel\Excel::XLSX);

        // Return the file download URL
        return Storage::disk('public')->url($path);
    }
}
