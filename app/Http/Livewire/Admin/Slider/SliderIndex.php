<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Models\Slider;
use Livewire\Component;
use App\Http\Traits\WithTable;
use Illuminate\Support\Facades\Storage;

class SliderIndex extends Component
{
    use WithTable;

    public $type;
    public $modalId = "slider-create";

    public $showFilters = false;
    public $searchFilters = false;


    public $filters = [
        'search' => '',
        'id' => '',
        'created_at' => '',
        'title' => '',
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

    public function getListeners()
    {
        return [
            'refresh' => '$refresh',
            'render' => 'render',
        ];
    }

    public function getRowsQueryProperty()
    {

        $query = Slider::search(
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

    public function changeStatus($id)
    {

        $slider = Slider::where('id', $id)->first();
        $slider->status = !$slider->status;
        $slider->save();
        $slider->refresh();
        if ($slider->status == 1) {
            Slider::where('id', '!=' , $id)->update(['status' => 0]);
        }

        $this->showSuccess('Se ha cambiado el estado con exito');
    }

    public function delete(Slider $slider)
    {
        if ($slider->url_image) {
            Storage::disk('public')->delete($slider->url_image);
        }
        $slider->delete();
        $this->showSuccess('Se elimino correctamente');
    }

    public function search()
    {
        $this->searchFilters = true;
        $this->showFilters = false;
    }

    public function render()
    {
        $rows = clone $this->rows;
        return view('livewire.admin.slider.slider-index', [
            'datarows' => $rows
        ]);
    }
}
