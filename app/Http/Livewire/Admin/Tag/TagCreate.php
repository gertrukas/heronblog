<?php

namespace App\Http\Livewire\Admin\Tag;

use App\Http\Traits\WithMessages;
use App\Models\Tag;
use Livewire\Component;

class TagCreate extends Component
{
    use WithMessages;

    public $modalId = 'tag-create';
    public $actionModal;
    public $isUploading = false;

    public $tag;

    public $name;


    public function mount($modalId)
    {
        $this->modalId  = $modalId;
    }


    public function edit($id = null)
    {
        if ($id) {
            $this->tag = Tag::where('id', $id)->first();
            $this->name = $this->tag->name;
        } else {
            $this->tag =  new Tag();
        }
    }


    public function saveOrUpdate()
    {
        if ($this->actionModal == 'Crear') {
            $this->save();
        } else {
            $this->update();
        }
    }

    public function update()
    {

        $this->validate([
            'name' => 'required',
        ]);


    

        $this->tag->name = $this->name;

        $this->tag->save();

        $this->isUploading = false;

        $this->reset('name');

        $this->showSuccess('Se actualizo correctamente');

        $this->emitTo('admin.tag.tag-index', 'render');
    }
    public function save()
    {

        $this->validate([
            'name' => 'required',
        ]);


    

        $this->tag->name = $this->name;

        $this->tag->save();

        $this->isUploading = false;

        $this->reset('name');

        $this->showSuccess('Se guardo correctamente');

        $this->emitTo('admin.tag.tag-index', 'render');
    }

    public function render()
    {
        return view('livewire.admin.tag.tag-create');
    }
}
