<?php

namespace App\Http\Traits;

use App\Imports\TableCollection;
use App\Imports\TableImport;

use Excel;

trait WithImports
{
    use WithMessages;

    public $importModalId = 'import-data-modal';
    public $nameTable;
    public $columnas = [];
    public $excel;
    public $emailUser = '';


    public $rulesUpload = [
        'upload' => 'required|mimes:xls,xlsx|max:51200',
    ];

    public function errorUpload($actions)
    {
        if ($actions == false) {
            $this->showError("Seleccione el Archivo a Cargar");
        } else {
            $this->showError("Error verifique la extension del archivo.");
        }
        $this->dispatchBrowserEvent('set-show-modal-' . $this->importModalId);
    }

    public function updatedUpload()
    {
        $this->validate($this->rulesUpload);
    }

    public function importActionExcel()
    {
        Excel::import(new TableImport($this->nameTable, $this->columnas), $this->excel);
    }

    public function importCustomDataExcel()
    {
        $import = new TableCollection;
        Excel::import($import, $this->excel);
        return $import->data;
    }

    public function importAction()
    {
        $this->validate($this->rulesUpload);
        $this->excel = $this->upload;
        if (isset($this->buttons['import']['action'])) {
            if ($this->buttons['import']['action'] === 'simple') {
                $this->simpleImportData();
            } else {
                # $data =
                $this->customImportData($this->importCustomDataExcel());
            }
        } else {
            // simple import
            $this->simpleImportData();
        }
    }

    public function simpleImportData()
    {
        $this->importActionExcel();
        $this->emit('refresh');
        $this->upload = null;
        $this->showExportModal = false;
        $this->showSuccess('Datos importados correctamente');
    }

    public function customImportData($data)
    {
        //$data=$this->importCustomDataExcel();
        # Code in background
    }

    public function downloadFormat()
    {
    }

    public function finalCustomImport($params = [
        'rows' => [
            [
                'index' => '',
                'status' => '', // 'error' | 'success'
                'message' => ''
            ]
        ]
    ])
    {
        # Sen email
    }
}
