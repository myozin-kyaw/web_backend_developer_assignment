<?php

declare(strict_types=1);

namespace App\GraphQL\Mutations;

use App\Imports\EmployeeImport;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

final readonly class ImportEmployeesExcel
{
    /** @param  array{}  $args */
    public function __invoke(null $_, array $args)
    {
        // Handle the file upload
        $file = $args['file'];

        // Store the file in a temporary location
        $path = $file->store('temp_imports', 'public');

        // Import the employees from the Excel file
        Excel::import(new EmployeeImport, storage_path('app/public/' . $path));

        // Optionally, you can delete the file after import
        Storage::disk('public')->delete($path);

        return "Employees imported successfully!";
    }
}
