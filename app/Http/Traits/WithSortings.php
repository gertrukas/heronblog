<?php
namespace App\Http\Traits; 

trait WithSortings
{
    public $sortsa = [];

    public function sortsBy($field)
    {
       if (! isset($this->sortsa[$field])) return $this->sortsa[$field] = 'asc';

       if ($this->sortsa[$field] === 'asc') return $this->sortsa[$field] = 'desc';

        unset($this->sortsa[$field]);
    }

    public function applySortings($query)
    {
        foreach ($this->sortsa as $field => $direction) {
            $query->orderBy($field, $direction);
        }

        return $query;
    }
}
