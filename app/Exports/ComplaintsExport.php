<?php

namespace App\Exports;

use App\Models\Complaint;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithMapping;

class ComplaintsExport implements FromCollection, WithHeadings
{
    protected $month;

    public function __construct($month = null)
    {
        $this->month = $month ?: date('Y-m');
    }

    public function collection()
    {
        // Fetch complaints for the specified month
        return Complaint::whereBetween('created_at', [
            $this->month . '-01 00:00:00',
            $this->month . '-31 23:59:59'
        ])->get();
    }

    public function headings(): array
    {
        return [
            'ID',
            'User ID',
            'Home Address',
            'Description',
            'Handling Asset',
            'Complaint Asset',
            'Sparepart',
            'Handling Description',
            'Status',
            'User Handler ID',
            'Created At',
            'Updated At',
        ];
    }
}
