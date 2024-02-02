<?php

namespace App\Http\Livewire\Global\Home;

use App\Models\Investment;
use App\Models\ProcessInvestment;
use Livewire\Component;

class Index extends Component
{
    public $countPreInvestment;
    public $countInvestment;

    public function render()
    {

        return view('livewire.global.home.index');
    }
}
