<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Http\Traits\WithTable;
use App\Models\Viewer;
use Livewire\Component;

class ReportForCountry extends Component
{

    use WithTable;


    public $type;
    public $modalId = "category-create";


    public $showFilters = false;
    public $searchFilters = false;


    public $filters = [
        'search' => '',
        'id' => '',
        'created_at' => '',
        'amount' => '',
        'title' => '',
        'type_product' => '',
        'conekta_id' => '',
        'status' => '',
    ];

    public $buttons = [
        'search' => true,
        'filter' => false,
        'duplicate' => false,
        'modify_application' => false,
        'edit' => false,
        'remove' => false,
        'export' => [
            'print' => true,
            'excel' => true,
            'pdf' => true,
        ],
    ];

    // -----------------------------------------------------------------------------------------------------------------
    // @ Rules
    // -----------------------------------------------------------------------------------------------------------------

    // -----------------------------------------------------------------------------------------------------------------
    // @ Listeners
    // -----------------------------------------------------------------------------------------------------------------

    public function getListeners()
    {
        return [
            'refresh' => '$refresh',
            'render' => 'render',
        ];
    }
    // -----------------------------------------------------------------------------------------------------------------
    // @ Lifecycle Hooks
    // -----------------------------------------------------------------------------------------------------------------

    public function mount()
    {
    }

    // -----------------------------------------------------------------------------------------------------------------
    // @ Computed Properties
    // -----------------------------------------------------------------------------------------------------------------

    public function getRowsQueryProperty()
    {
        $search = $this->filters['search'];
        $query = Viewer::search(
            $this->filters,
            $this->sortByAttribute,
            $this->sortDirection,
            $this->sortByStatus
        );
        return $query;
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }

    // -----------------------------------------------------------------------------------------------------------------
    // @ Public Functions
    // -----------------------------------------------------------------------------------------------------------------





    public function search()
    {
        $this->searchFilters = true;
        $this->showFilters = false;
    }


    // @Exports Functions
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


    // -----------------------------------------------------------------------------------------------------------------
    // @ Private Functions
    // -----------------------------------------------------------------------------------------------------------------

    private function exportData($exportType = 'pdf')
    {
        $countries = $this->rowsQuery;

        $data = [
            'header' => [
                'Pais',
                'Visitas',
                'Interacciónes',
            ],
            'rows' => [],
            'footer' => []
        ];

        foreach ($countries->get() as $country) {


            $data['rows'][] = [
                $country->country,
                $country->count,
                $country->interactions,

            ];
        }

        $this->showSuccess('Se ha exportado correctamente');

        if ($exportType === 'pdf') {
            return $this->getPDF($data, 'Visitas');
        }
        if ($exportType === 'html') {
            return $this->getHtml($data);
        }
        return $this->getExcel($data, 'Visitas');
    }

    public function render()
    {

        $rows = clone $this->rows;
        // $this->render();
        return view('livewire.admin.dashboard.report-for-country', [
            'datarows' => $rows
        ]);
    }
}
