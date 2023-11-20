<?php

namespace App\Http\Livewire\Admin\Blog;

use App\Http\Traits\WithMessages;
use App\Models\Blog;
use App\Models\Category;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class BlogCreate extends Component
{
    use WithMessages, WithFileUploads;


    public $blog, $categories, $action;
    public $tags, $tag;



    public $name;
    public $slug;
    public $intro;
    public $active =  0;
    public $author;
    public $description = '';
    public $image;
    public $post_type = 'post';
    public $category_id;

    public $isUploading = false;
    public $isUploadingTwo = false;

    public function mount($id = null)
    {
        $this->tags = Tag::get()->pluck('name', 'id')->toArray();
        $this->categories = Category::all();


        if ($id) {
            $this->blog  = Blog::where('id', $id)->firstOrFail();
            if ($this->blog) {
                $this->action = 'Actualizar Blog';
                $this->name  =  $this->blog->name;
                $this->slug  =  $this->blog->slug;
                $this->intro  =  $this->blog->intro;
                $this->active  =  $this->blog->active;
                $this->author  =  $this->blog->author;
                $this->description  =  $this->blog->description;
                $this->post_type  =  $this->blog->post_type;
                $this->category_id  =  $this->blog->category_id;



                $this->tag = $this->blog->tags()->pluck('tag_id')->toArray();
            }
        } else {
            $this->blog  = new Blog();
            $this->action = 'Crear Blog';
            $this->description = '';
        }
    }

    public function save()
    {
        if ($this->action == 'Crear Blog') {
            $this->validate([
                'name' => 'required',
                'intro' => 'required',
                'description' => 'required',
                'author' => 'required',
                'image' => 'required',
            ]);
        } else {
            $this->validate([
                'name' => 'required',
                'intro' => 'required',
                'description' => 'required',
                'author' => 'required',
            ]);
        }
        if ($this->action == 'Crear Blog') {
            $this->blog->slug = $this->createUniqueSlug($this->name);
        } else {
            if ($this->blog->name != $this->name) {
                $this->blog->slug = $this->createUniqueSlug($this->name);
            }
        }

        if ($this->image) {
            // Genera un slug para el archivo
            $slug = $this->generateSlug($this->image->getClientOriginalName());

            // Agrega un conjunto aleatorio de 3 números
            $randomNumbers = random_int(0, 99);
            $slugWithRandom = $slug . '-' . $randomNumbers;

            // Almacena la imagen en la carpeta correspondiente
            $this->image->storeAs("", $slugWithRandom . '.' . $this->image->getClientOriginalExtension(), 'image');
            $this->blog->image = $slugWithRandom . '.' . $this->image->getClientOriginalExtension();
        }

        $this->blog->name = $this->name;
        $this->blog->intro = $this->intro;
        $this->blog->active = $this->active;
        $this->blog->category_id = $this->category_id;
        $this->blog->description = $this->description;
        $this->blog->post_type = 'post';
        $this->blog->author = $this->author;

        $this->blog->save();

        $this->blog->tags()->sync($this->tag);

        $this->showSuccess('Se guardo correctamente');

        return redirect()->route('admin.blogs');
    }

    private function generateSlug($originalName)
    {
        // Implementa la lógica para generar un slug único
        // por ejemplo, usando Str::slug() de Laravel
        return \Illuminate\Support\Str::slug(pathinfo($originalName, PATHINFO_FILENAME));
    }


    private function createUniqueSlug($name)
    {
        $slug = Str::slug($name);

        // Verificar si el slug ya existe en la base de datos
        $count = 0;
        while (Blog::where('slug', $slug)->exists()) {
            $count++;
            $slug = Str::slug($name) . '-' . $count;
        }

        return $slug;
    }

    public function render()
    {
        return view('livewire.admin.blog.blog-create');
    }
}
