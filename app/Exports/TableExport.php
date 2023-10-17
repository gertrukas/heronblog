<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class TableExport implements FromArray, ShouldAutoSize, WithStyles
{
    protected $data;

    public function __construct(array $data, bool $hasFooter = false)
    {
        $this->data = $data;
        $this->hasFooter = $hasFooter;
    }

    public function styles(Worksheet $sheet)
    {
        $sheet->getStyle(1)->getFont()->setBold(true);

        if ($this->hasFooter)
            $sheet->getStyle(count($this->data))->getFont()->setBold(true);
    }

    public function array(): array
    {
        return $this->data;
    }
}
