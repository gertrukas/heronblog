<?php

namespace App\Http\Livewire\Front\Home;

use App\Models\Blog;
use Livewire\Component;

class LastedPost extends Component
{

    public $blogs = [];
    public $showElements = 5;
    public $addElements = 5;
    public $search;
    public $total;
    
    public $mivariable;

    protected  $listeners = ['loadSearch', 'render'];

    public function loadSearch($search = null, $mivariable = 'nada')
    {

        

        $this->showElements = 5;
        
        $this->search = $search;
        
        $this ->mivariable = $mivariable;
        

        $this->blogs =     Blog::where('active', true)
            ->search($this->search)
            ->orderBy('created_at', 'desc')
            ->take($this->showElements)->get();
        //    $this->render();
        $this->total = Blog::where('active', true)->search($this->search)->orderBy('created_at', 'desc')->count();
        
    }

    public function verMas()
    {
        $this->showElements += $this->addElements;
    }

    public function getLastedBooks()
    {
        $this->blogs = Blog::where('active', true)->search($this->search)->orderBy('created_at', 'desc')->take($this->showElements)->get();
        $this->total = Blog::where('active', true)->search($this->search)->orderBy('created_at', 'desc')->count();

        $this->mivariable = $this->mivariable;

    }

    public function render()
    {
        $this->getLastedBooks();
        return view('livewire.front.home.lasted-post');
    }
}
