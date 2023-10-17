<?php

namespace App\Http\Traits;

use App\Exports\TableExport;
use App\Exports\DatabaseTablesExport;
use Illuminate\Support\Facades\Storage;

trait WithExports
{
    public $exportsFileName;

    public function getListeners()
    {
        return array_merge(['deleteFile'], $this->listeners);
    }

    public function exportExcel()
    {
        return $this->exportData('excel');
    }

    public function exportPdf()
    {
        return $this->exportData();
    }

    public function exportHtml()
    {
        return $this->exportData('html');
    }

    public function getHtml(array $data)
    {
        $rows =  [];

        foreach ($data['rows'] as $key => $row) {
            $newData = [];
            foreach ($row as $item) {
                if (strpos($item, '$') === 0)
                    $value = floatval(str_replace(["$", ","], ["", ""], $item));
                else
                    $value = $item;

                $newData[] = $value;
            }
            $rows[$key] = $newData;
        }

        $logo = public_path('images/logo.png');

        $html = view('pdf.table', [
            'header' => $data['header'],
            'rows' => $rows,
            'footer' => $data['footer'] ?? null,
            'info' => $data['info'] ?? null,
            'title' => $data['title'] ?? null,
            'logo' =>  $logo
        ])->render();

        return $this->dispatchBrowserEvent('htmlPrint', ['html' => $html]);
    }
    public function getPDF(array $data, $fileName, $orientation = false)
    {

        $rows =  [];

        foreach ($data['rows'] as $key => $row) {
            $newData = [];
            foreach ($row as $item) {
                // if (strpos($item, '$') === 0)
                //     $value = floatval(str_replace(["$", ","], ["", ""], $item));
                // else
                    $value = $item;

                $newData[] = $value;
            }
            $rows[$key] = $newData;
        }

        $logo = public_path('images/logo.png');

        $pdf = \PDF::loadView('pdf.table', [
            'header' => $data['header'],
            'rows' => $rows,
            'perpage' => $data['perpage'] ?? 30,
            'footer' => $data['footer'] ?? null,
            'info' => $data['info'] ?? null,
            'title' => $data['title'] ?? null,
            'logo' => $logo
        ]);

        if (count($data['header']) >= 7 || $orientation) {
            $pdf->setPaper('letter', 'landscape');
            //            $pdf->setOrientation('landscape');
        }

        return response()->streamDownload(fn () => print $pdf->output(), $fileName . '.pdf');
    }

    public function getExcel(array $data, string $fileName)
    {
        $rows =  [];
        foreach ($data['rows'] as $key => $row) {
            $newData = [];
            foreach ($row as $item) {
                if (strpos($item, '$') === 0)
                    $value = floatval(str_replace(["$", ","], ["", ""], $item));
                else
                    $value = $item;

                $newData[] = $value;
            }
            $rows[$key] = $newData;
        }

        $exportData = [$data['header'], ...$rows];

        if (isset($data['footer'])) {

            $footer =  [];
            foreach ($data['footer'] as $key => $item) {
                if (strpos($item, '$') === 0)
                    $value = floatval(str_replace(["$", ","], ["", ""], $item));
                else
                    $value = $item;

                $footer[$key] = $value;
            }

            $exportData[] = $footer;
        }

        $export = new TableExport($exportData, isset($data['footer']));

        return \Excel::download($export, $fileName . '.xlsx');
    }

    public function downloadPDF()
    {
        $pdf = $this->getPDF($this->table_data, $this->exportsFileName);

        return response()->streamDownload(fn () => print $pdf->output(), $this->exportsFileName . '.pdf');
    }

    public function downloadExcel()
    {
        return $this->getExcel($this->table_data, $this->exportsFileName);
    }

    public function printPDF()
    {
        $pdf = $this->getPDF($this->table_data);

        $fileName = 'storage/pdf-tmp/' . uniqid() . '.pdf';

        $pdf->save($fileName);

        $this->emit('printTable', global_asset($fileName));
    }

    public function deleteFile($fileName)
    {
        unlink(base_path("public/storage/pdf-tmp/$fileName"));
    }

    // Used for development only
    public function downloadDatabaseTables()
    {
        if (config('app.env') == 'production') {
            return null;
        }

        return (new DatabaseTablesExport())->download('database_tables.xlsx');
    }
}
