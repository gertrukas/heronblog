<?php

namespace App\Http\Traits;

trait WithSearch {

    public $search = '';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->reset([
            'filters',
//            'searchFilters',
            'showFilters']);
        $this->emitSelf('refresh');
    }

    public function toggleShowFilters()
    {
        $this->useCachedRows();
        $this->showFilters = !$this->showFilters;
    }

    public function search()
    {
//        $this->searchFilters = true;
        $this->showFilters = false;
    }

}
