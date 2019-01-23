<?php

namespace App\Exports;

use App\Models\Result;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ResultExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Result::all();
    }

    public function headings(): array
    {
        return [
            'Case #',
            'Value question 1',
            'Value question 2',
            'Value question 3',
            'Value question 4',
            'Value question 5',
            'Feedback',
            'Created At',
        ];
    }
}
