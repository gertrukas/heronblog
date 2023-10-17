<?php

namespace App\Http\Traits;

use Livewire\WithPagination;

trait WithPerPage
{
    use WithPagination;

    public $perPage = 50;
    public $indexRowsPage=[];
    public function updatingPerPage()
    {
        $this->resetPage();
    }

    public function applyPagination($query)
    {
        $result = $query->paginate($this->perPage);
        //        $this->indexRowsPage=json_encode([]);
        $this->indexRowsPage = json_encode($result->toArray()['data']);
        return $result;
    }

    public function getRowsProperty()
    {
        return $this->cache(function () {
            return $this->applyPagination($this->rowsQuery);
        });
    }
}
