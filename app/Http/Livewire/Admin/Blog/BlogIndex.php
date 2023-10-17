<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Http\Traits\WithTable;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class BlogIndex extends Component
{
    use WithTable;


    public $type;
    public $modalId = "category-create";

    public $imagesOld;
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
        'export' => false
    ];

    // -----------------------------------------------------------------------------------------------------------------
    // @ Rules
    // -----------------------------------------------------------------------------------------------------------------

    public function changeStatus($id)
    {

        $blog = Blog::where('id', $id)->first();
        $blog->active = !$blog->active;
        $blog->save();

        $this->showSuccess('Se ha cambiado el estado con exito');
    }
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

        $query = Blog::search(
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

    public function delete(Blog $blog)
    {
        if ($blog->image) {

            Storage::disk('image')->delete($blog->image);
        }

        $blog->delete();
        $this->showSuccess('Se elimino correctamente');
    }



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
        $categories = $this->rowsQuery;

        $data = [
            'header' => [
                'Nombre',
                'Tipo',
                'Estatus',
                'Fecha de Creación',
            ],
            'rows' => [],
            'footer' => []
        ];

        foreach ($categories->get() as $category) {


            $data['rows'][] = [
                $category->name,
                $category->type,
                $category->status ? 'Activado' : 'Desactivado',
                $category->created_at,

            ];
        }

        $this->showSuccess('Se ha exportado correctamente');

        if ($exportType === 'pdf') {
            return $this->getPDF($data, 'categorias');
        }
        if ($exportType === 'html') {
            return $this->getHtml($data);
        }
        return $this->getExcel($data, 'categorias');
    }

    public function render()
    {
        $rows = clone $this->rows;
        return view('livewire.admin.blog.blog-index', [
            'datarows' => $rows
        ]);
    }
}
