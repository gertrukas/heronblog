<?php

namespace App\Http\Livewire\Admin\Dashboard;

use App\Models\Category;
use App\Models\Product;
use App\Models\Tag;
use App\Models\Viewer;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class DashboardIndex extends Component
{
    public $totalBooks, $totalCategories, $totalViews, $totalTags;
    public $viewers;


    public function mount()
    {
       
    }

    public function render()
    {

        // ->pluck('count','country');
        return view('livewire.admin.dashboard.dashboard-index');
    }
}
