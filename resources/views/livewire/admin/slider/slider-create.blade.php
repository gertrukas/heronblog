<div x-data="{
    modalId: @entangle('modalId').defer,
    actionModal: @entangle('actionModal').defer,
    titleM: 'Crear Slider',
    buttonM: 'Guardar Slider',
    setActionModal(data) {
        this.actionModal = data.action
        {{-- this.resetData();
        this.actionModal = data.action; --}}
        dispatchEvent(new CustomEvent(`set-show-modal-${this.modalId}`));


        if (this.actionModal == 'Crear') {
            this.titleM = 'Crear Slider';
            this.buttonM = 'Guardar Slider';
            @this.edit();

        } else {
            this.titleM = 'Editar Slider';
            this.buttonM = 'Actualizar Slider';
            @this.edit(data.slider);
        }
    },
    resetData() {},
}" @action-modal-slider-create.window="setActionModal($event.detail)">



    <div class="modal-content">
        <div class="modal-header">
            <h2 class="mr-auto text-base font-medium" x-text="titleM"> </h2>
        </div>

        <div class="modal-body">
            <div class="grid grid-cols-2 gap-4 gap-y-3">
                <div>
                    <div>
                        <label class="form-label">Titulo</label>
                        <input type="text" class="form-control" placeholder="Titulo" wire:model.defer="title">
                        <x-error property="title" />

                    </div>

                    <div>
                        <label class="form-label">Descripción</label>
                        <input type="text" class="form-control" placeholder="Descripción breve" wire:model.defer="description">
                        <x-error property="description" />
                    </div>

                    <div>
                        <label class="form-label mt-1">Link</label>
                        <input class="form-check-input" type="checkbox" value="1" id="sliderCheckLink">
                        <input type="text" class="form-control" placeholder="Link" wire:model.defer="link" id="sliderLinkInput" style="display: none">
                        <x-error property="link" />
                    </div>
                </div>
                <div>
                    <div>
                        <label class="form-label">Activo</label>
                        <input class="form-check-input" type="checkbox" value="1" wire:model.defer="status">
                        <x-error property="status" />
                    </div>
                    <div class="mb-1" x-data="{ isUploading: @entangle('isUploading'), progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = true"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">

                        <label class="form-label">Imagen</label>
                        <div class="border-2 border-dashed dark:border-dark-5 rounded-md pt-4">
                            <div class="px-4 pb-4 flex items-center cursor-pointer relative dark:text-gray-500">
                                <i data-feather="image" class="w-4 h-4 mr-2"></i> <span
                                    class=" dark:text-gray-300 mr-1">Adjunta
                                    un imagen</span>
                                <input type="file" wire:model="url_image" accept="images/*"
                                    class="w-full h-full top-0 left-0 absolute opacity-0 ">
                            </div>
                        </div>
                        <x-error property="url_image" />
                        <!-- Progress Bar -->
                        <div x-show="isUploading" class="bg-gray-200 h-[20px] w-ful  mt-3 rounded-md"
                            style="display: none">
                            <div class="bg-red-600 h-[20px] text-center  text-white rounded-md"
                                style="transition: width 2s" :style="`width: ${progress}%`" x-show="isUploading"
                                x-text="`${progress} %`">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center modal-footer">
            <button type="button" @click="$dispatch('set-dismiss-modal-{{ $modalId }}')"
                class="w-48 mr-1 btn btn-outline-secondary">
                Cancelar
            </button>

            <button type="button" wire:click="saveOrUpdate" class="btn btn-primary w-48" x-text="buttonM"></button>
        </div>
    </div>

    @section('script')
        <script>
            // Obtén referencias a los elementos del DOM
            const checkbox = document.getElementById('sliderCheckLink');
            const input = document.getElementById('sliderLinkInput');

            // Agrega un escuchador de eventos al checkbox
            checkbox.addEventListener('change', function() {
                // Si el checkbox está marcado, muestra el input; de lo contrario, ocúltalo
                input.style.display = this.checked ? 'block' : 'none';
            });
        </script>
    @stop
</div>
