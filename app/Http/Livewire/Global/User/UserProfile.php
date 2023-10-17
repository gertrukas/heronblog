<?php

namespace App\Http\Livewire\Global\User;

use App\Http\Traits\WithMessages;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class UserProfile extends Component
{
    use WithMessages, WithFileUploads;

    public $user;
    public $isUploading = false;
    public $name;
    public $phone;
    public $photo;
    public $password;


    public function mount()
    {
        $this->user = User::where('id', auth()->user()->id)->first();

        $this->name = $this->user->name;
        $this->phone = $this->user->phone;
    }

    public function update()
    {

        $this->validate([
            'name' => 'required',
        ]);


        if ($this->photo) {
            $photo =  $this->photo->store('profile', 'public');
            if ($this->user->photo) {
                Storage::delete($this->user->photo);
            }
            $this->user->photo = $photo;
        }
        if ($this->password) {
            $password =  Hash::make($this->password);
            $this->user->password = $password;
        }

        $this->user->name = $this->name;
        $this->user->phone = $this->phone;
        $this->user->save();

        $this->showSuccess('Se actualizo correctamente');
        $this->emitTo('admin.global.user.user-component', 'render');
    }

    public function render()
    {
        return view('livewire.global.user.user-profile');
    }
}
