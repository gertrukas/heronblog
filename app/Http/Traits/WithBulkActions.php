<?php

namespace App\Http\Traits;
trait WithBulkActions
{
    public $selectPage = false;
    public $selectAll = false;
    public $selected = [];
    public $unitIdSelected;
    public $typeIdSelected;
    public $modalIdEditMassiveUnit = 'edit-massive-unit-concepts';
    public $modalIdEditMassiveTypeApplication = 'edit-massive-type-application-concepts';

    public function renderingWithBulkActions()
    {
        if ($this->selectAll) $this->selectPageRows();
    }

    public function updatedSelected()
    {
        $this->selectAll = false;
        $this->selectPage = false;
    }

    public function updatedSelectPage($value)
    {
        if ($value) return $this->selectPageRows();

        $this->selectAll = false;
        $this->selected = [];
    }

    public function selectPageRows()
    {
        $this->selected = $this->rows->pluck('id')->map(fn($id) => (string) $id);
    }

    public function selectAll()
    {
        $this->selectAll = true;
    }

    public function getSelectedRowsQueryProperty()
    {
        return (clone $this->rowsQuery)
            ->unless($this->selectAll, fn($query) => $query->whereKey($this->selected));
    }

}
