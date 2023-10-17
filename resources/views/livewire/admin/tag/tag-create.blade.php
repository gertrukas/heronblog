<div x-data="{
    modalId: @entangle('modalId').defer,
    actionModal: @entangle('actionModal').defer,
    titleM: 'Crear Etiqueta',
    buttonM: 'Guardar Etiqueta',
    setActionModal(data) {
        this.actionModal = data.action
        {{-- this.resetData();
        this.actionModal = data.action; --}}
        dispatchEvent(new CustomEvent(`set-show-modal-${this.modalId}`));


        if (this.actionModal == 'Crear') {
            this.titleM = 'Crear Etiqueta';
            this.buttonM = 'Guardar Etiqueta';
            @this.edit();

        } else {
            this.titleM = 'Editar Etiqueta';
            this.buttonM = 'Actualizar Etiqueta';
            @this.edit(data.tag);
        }
    },
    resetData() {},
}" @action-modal-tag-create.window="setActionModal($event.detail)">


    <div class="modal-content">
        <div class="modal-header">
            <h2 class="mr-auto text-base font-medium" x-text="titleM"> </h2>
        </div>


        <div class="modal-body">
            <div class="grid grid-cols-2 gap-4 gap-y-3">

                <div class="col-span-2">
                    <label class="form-label">Nombre</label>
                    <input type="text" class="form-control" placeholder="Nombre" wire:model.defer="name">
                    <x-error property="name" />

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
</div>
