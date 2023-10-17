<div>
    <div class="intro-y flex items-center mt-8">
        <h2 class="text-lg font-medium mr-auto">
            Mi Perfil
        </h2>
    </div>
    <div class="intro-y box px-5 pt-5 mt-5">
        <div class="flex flex-col lg:flex-row border-b border-slate-200/60 dark:border-darkmode-400 pb-5 -mx-5">
            <div class="flex flex-1 px-5 items-center justify-center lg:justify-start">
                <div class="w-20 h-20 sm:w-24 sm:h-24 flex-none lg:w-32 lg:h-32 image-fit relative">

                    @if ($user->photo)
                        <img class="rounded-full" src="{{ asset('storage/' . $user->photo) }}">
                    @else
                        <img class="rounded-full" src="{{ asset('images/user.png') }}">
                    @endif


                    <div
                        class="absolute mb-1 mr-1 flex items-center justify-center bottom-0 right-0 bg-primary rounded-full p-2">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" icon-name="camera" class="lucide lucide-camera w-4 h-4 text-white"
                            data-lucide="camera">
                            <path
                                d="M14.5 4h-5L7 7H4a2 2 0 00-2 2v9a2 2 0 002 2h16a2 2 0 002-2V9a2 2 0 00-2-2h-3l-2.5-3z">
                            </path>
                            <circle cx="12" cy="13" r="3"></circle>
                        </svg>
                    </div>
                </div>
                <div class="ml-5">
                    <div class="w-24 sm:w-40 truncate sm:whitespace-normal font-medium text-lg"> {{ $user->name }}
                    </div>
                    <div class="text-slate-500">

                        @foreach ($user->roles as $role)
                            {{ $role->name }} <br>
                        @endforeach
                    </div>
                </div>
            </div>
            <div
                class="mt-6 lg:mt-0 flex-1 px-5 border-l border-r border-slate-200/60 dark:border-darkmode-400 border-t lg:border-t-0 pt-5 lg:pt-0">
                <div class="font-medium text-center lg:text-left lg:mt-3">Sistema de Jmliteratour</div>
                <div class="flex flex-col justify-center items-center lg:items-start mt-4">
                </div>
            </div>
        </div>
    </div>

    <div class="intro-y box px-5 py-5 my-5">
        <h2 class="text-lg font-medium mr-auto">Actualizar mi perfil</h2>
        <div class="grid grid-cols-2 gap-4 gap-y-3">
            <div>
                <div>
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre" wire:model.defer="name">
                    <x-error property="name" />

                </div>

                <div>
                    <label class="form-label">Contraseña</label>
                    <input type="tel" class="form-control" placeholder="Contraseña" wire:model.defer="password">
                    <x-error property="password" />

                </div>
                <div>
                    <label class="form-label">Telefono</label>
                    <input type="tel" class="form-control" placeholder="Telefono" wire:model.defer="phone">
                    <x-error property="phone" />

                </div>


            </div>
            <div>
                <div class="mb-1" x-data="{ isUploading: @entangle('isUploading'), progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                    x-on:livewire-upload-finish="isUploading = true" x-on:livewire-upload-error="isUploading = false"
                    x-on:livewire-upload-progress="progress = $event.detail.progress">


                    <label class="form-label">Foto de Perfil</label>
                    <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">


                        <div class="px-4 pb-4 flex items-center cursor-pointer relative dark:text-gray-500">
                            <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                class=" dark:text-gray-300 mr-1">Adjunta
                                un imagen</span>
                            <input type="file" wire:model="photo" accept="images/*"
                                class="w-full h-full top-0 left-0 absolute opacity-0 ">

                        </div>
                    </div>
                    <x-error property="photo" />
                    <!-- Progress Bar -->
                    <div x-show="isUploading" class="bg-gray-200 h-[20px] w-ful  mt-3 rounded-md" style="display: none">
                        <div class="bg-red-600 h-[20px] text-center  text-white rounded-md" style="transition: width 2s"
                            :style="`width: ${progress}%`" x-show="isUploading" x-text="`${progress} %`">
                        </div>

                    </div>

                </div>

            </div>



        </div>

        <div class="flex  justify-end gap-4 my-5">
            

            <button type="button" wire:click="update" class="btn btn-primary w-48" >Guardar</button>

        </div>
    </div>
</div>
