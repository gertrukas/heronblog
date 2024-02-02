<?php

namespace App\Http\Livewire\Admin\Slider;

use App\Http\Traits\WithMessages;
use App\Models\Slider;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;

class SliderCreate extends Component
{
    use WithMessages, WithFileUploads;

    public $modalId = 'slider-create';
    public $actionModal;
    public $isUploading = false;

    public $slider;

    public $title;
    public $description;
    public $url_image;
    public $link;
    public $status;

    public function edit($id = null)
    {
        if ($id) {
            $this->slider = Slider::where('id', $id)->first();
            $this->title = $this->slider->title;
            $this->description = $this->slider->description;
            $this->link = $this->slider->link;
            $this->status = $this->slider->status;
        } else {
            $this->slider =  new Slider();
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
            'title' => 'required',
            'description' => 'required',
            'link' => 'nullable|url',
        ]);

        if ($this->status == 1) {
            Slider::where('status', 1)->update(['status' => 0]);
        }

        if ($this->url_image) {
            $photo =  $this->url_image->store('sliders', 'public');
            if ($this->slider->url_image) {
                Storage::disk('public')->delete($this->slider->url_image);
            }
            $this->slider->url_image = $photo;
        }

        $this->slider->title = $this->title;
        $this->slider->description = $this->description;
        $this->slider->link = $this->link;
        $this->slider->status = $this->status;

        $this->slider->save();

        $this->isUploading = false;

        $this->reset('title',  'description', 'url_image', 'link', 'status');

        $this->showSuccess('Se actualizó correctamente');

        $this->emitTo('admin.slider.slider-index', 'render');
    }
    public function save()
    {
        $this->validate([
            'title' => 'required',
            'description' => 'required',
            'url_image' => 'required|image',
            'link' => 'nullable|url',
        ]);

        if ($this->status) {
            if ($this->status == 1) {
                Slider::where('status', 1)->update(['status' => 0]);
            }
        }else{
            $this->status = 0;
        }

        if ($this->url_image) {
            $photo =  $this->url_image->store('sliders', 'public');
            $this->slider->url_image = $photo;
        }

        $this->slider->title = $this->title;
        $this->slider->description = $this->description;
        $this->slider->link = $this->link;
        $this->slider->status = $this->status;
        $this->slider->save();

        $this->isUploading = false;

        $this->reset('title',  'description', 'url_image', 'link', 'status');
        $this->showSuccess('Se guardó correctamente');
        $this->emitTo('admin.slider.slider-index', 'render');
    }

    public function render()
    {
        return view('livewire.admin.slider.slider-create');
    }
}
