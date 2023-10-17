<?php

namespace App\Http\Livewire\Global\User;

use Livewire\Component;

class UserComponent extends Component
{
    public function getListeners()
    {
        return [
            'render' => 'render',
        ];
    }

    public function render()
    {
        return view('livewire.global.user.user-component');
    }
}
