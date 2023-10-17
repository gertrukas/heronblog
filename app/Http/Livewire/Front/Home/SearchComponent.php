<?php

namespace App\Http\Livewire\Front\Home;

use App\Models\Blog;
use Livewire\Component;

class SearchComponent extends Component
{
    public $isSearch = false;
    public $search = '',
        $results = [];

    public function showSearch()
    {
        $this->isSearch = true;
        $this->emitTo('front.home.lasted-post', 'loadSearch', $this->search);
    }

    public function render()
    {
     

        return view('livewire.front.home.search-component');
    }
}
