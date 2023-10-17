<?php

namespace App\Http\Livewire\Admin\Category;

use App\Http\Traits\WithMessages;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class CategoryCreate extends Component
{
    use WithMessages, WithFileUploads;

    public $modalId = 'category-create';
    public $actionModal;
    public $isUploading = false;

    public $category;

    public $name;
    public $slug;
    public $description;
    public $url_image;


    public function mount($modalId)
    {
        $this->modalId  = $modalId;
    }


    public function edit($id = null)
    {
        if ($id) {
            $this->category = Category::where('id', $id)->first();
            $this->name = $this->category->name;
            $this->description = $this->category->description;
        } else {
            $this->category =  new Category();
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
            'description' => 'required',
        ]);


        if ($this->url_image) {
            $photo =  $this->url_image->store('categories', 'public');
            if ($this->category->url_image) {
                Storage::disk('public')->delete($this->category->url_image);
            }
            $this->category->url_image = $photo;
        }


        $this->category->name = $this->name;
        $this->category->description = $this->description;
        $this->category->createSlug($this->category->name);

        $this->category->save();

        $this->isUploading = false;

        $this->reset('name',  'description', 'url_image');

        $this->showSuccess('Se actualizo correctamente');

        $this->emitTo('admin.category.category-index', 'render');
    }
    public function save()
    {

        $this->validate([
            'name' => 'required',
            'description' => 'required',
        ]);



        if ($this->url_image) {
            $photo =  $this->url_image->store('categories', 'public');
            $this->category->url_image = $photo;
        }

        $this->category->name = $this->name;
        $this->category->description = $this->description;

        $this->category->save();

        $this->isUploading = false;

        $this->reset('name',  'description', 'url_image');
        $this->showSuccess('Se guardado correctamente');
        $this->emitTo('admin.category.category-index', 'render');
    }

    public function render()
    {
        return view('livewire.admin.category.category-create');
    }
}
