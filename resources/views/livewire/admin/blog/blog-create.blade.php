<div>

    <div class="intro-y flex items-center h-10">
        <h2 class="text-lg font-medium truncate mr-5">
            Blog / {{$action}}
        </h2>
      
    </div>
    <div class="p-5 mt-5 intro-y box">

        <h1 class="text-center font-semibold my-4 text-2xl"></h1>

        <div class="grid grid-cols-1 gap-4 gap-y-3 ">


            <div class="mt-4">
                <label for="url_amazon" class="font-bold mb-1 text-gray-700 block">
                    ¿Activo?
                </label>
                <div class="form-check form-switch w-full mb-4">
                    <label class="form-check-label ml-0" for="show-example-1">No</label>
                    <input id="show-example-1" wire:model.defer="active" data-target="#basic-button"
                        class="show-code form-check-input mr-0 ml-3" type="checkbox" value="{{$active}}">
                    <label class="form-check-label ml-2" for="show-example-1">Si</label>
                </div>

            </div>
            {{-- Titulo --}}
            <div class="">




                <label for="title" class="font-bold mb-1 text-gray-700 block">
                    Titulo
                </label>
                <input type="text" id="title" name="title" wire:model.defer="name" class="form-control"
                    placeholder="Titulo...">

                @error('title')
                    <p class="mt-2 text-red-500"> {{ $message }}</p>
                @enderror

            </div>

            @if ($this->blog->id != null && $this->blog->image != null)
                <div class="flex justify-center my-4">
                    <img src="{{ asset('uploads/' . $this->blog->image) }}" class="h-40 w-56 rounded-md" alt="">
                </div>
            @endif
            {{-- Imagen Banner  --}}
            <div>
                <div>
                    <div class="mb-1" x-data="{ isUploadingTwo: @entangle('isUploadingTwo'), progress: 0 }" x-on:livewire-upload-start="isUploadingTwo = true"
                        x-on:livewire-upload-finish="isUploadingTwo = true"
                        x-on:livewire-upload-error="isUploadingTwo = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">


                        <label for="url_banner" class="font-bold mb-1 text-gray-700 block">
                            Banner
                        </label>
                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">


                            <div class="px-4 pb-4 flex items-center cursor-pointer relative dark:text-gray-500">
                                <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                    class=" dark:text-gray-300 mr-1">Adjunta
                                    un imagen</span>
                                <input type="file" wire:model="image" accept="images/*"
                                    class="w-full h-full top-0 left-0 absolute opacity-0 ">

                            </div>
                        </div>
                        <x-error property="image" />
                        <!-- Progress Bar -->
                        <div x-show="isUploadingTwo" class="bg-gray-200 h-[20px] w-ful  mt-3 rounded-md"
                            style="display: none">
                            <div class="bg-red-600 h-[20px] text-center  text-white rounded-md"
                                style="transition: width 2s" :style="`width: ${progress}%`" x-show="isUploadingTwo"
                                x-text="`${progress} %`">
                            </div>

                        </div>

                    </div>

                </div>
            </div>

            {{-- Autor --}}
            <div class="">
                <label for="autor" class="font-bold mb-1 text-gray-700 block">
                    Intruducción
                </label>
                <input type="text" id="intro" name="intro" wire:model.defer="intro" class="form-control"
                    placeholder="Introducción">

                @error('intro')
                    <p class="mt-2 text-red-500"> {{ $message }}</p>
                @enderror

            </div>

            {{-- Descripción --}}
            <div class="">
                <label for="title" class="font-bold mb-1 text-gray-700 block">
                    Descripción
                </label>
                <div wire:ignore>
                    <textarea wire:model="description" id="editor" name="description" class="form-control " cols="30" rows="10"
                        data="@this"></textarea>
                </div>

                @error('description')
                    <p class="mt-2 text-red-500"> {{ $message }}</p>
                @enderror

                <input type="hidden" class="uploadUrl">
            </div>
            {{-- Autor --}}
            <div class="">
                <label for="autor" class="font-bold mb-1 text-gray-700 block">
                    Autor
                </label>

                <input type="text" id="autor" name="autor" wire:model.defer="author" class="form-control"
                    placeholder="Nombre del autor...">

                @error('author')
                    <p class="mt-2 text-red-500"> {{ $message }}</p>
                @enderror

            </div>

            <div class="mt-4">
                <label for="url_amazon" class="font-bold mb-1 text-gray-700 block">
                    Etiquetas
                </label>
                <x-select-search :data="$tags" wire:model="tag"
                    placeholder="Selecciona las etiquetas correspondientes" multiple />
            </div>







        </div>

        <div class="mt-4 flex justify-end gap-2">

            <button type="button" class="btn btn-primary w-48" wire:click="save">Guardar</button>
        </div>
        @section('script')
            <script src="{{ asset('js/ckfile.js') }}"></script>
            {{-- @include('ckfinder::setup') --}}
            {{-- <script src="https://cdn.ckeditor.com/ckeditor5/34.2.0/super-build/ckeditor.js"></script> --}}
        @stop
    </div>

</div>
