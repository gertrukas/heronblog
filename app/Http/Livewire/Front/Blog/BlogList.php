<?php

namespace App\Http\Livewire\Front\Blog;

use App\Models\Blog;
use Livewire\Component;
use Livewire\WithPagination;

class BlogList extends Component
{
    use WithPagination;

    public function paginationView()
    {
        return 'vendor.livewire.simple-front';
    }
    public function render()
    {
        $blogs =  Blog::where('active', 1)->paginate(10);
        return view('livewire.front.blog.blog-list', compact('blogs'));
    }
}
