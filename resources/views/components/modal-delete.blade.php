<div {{ $attributes }} class="modal" tabindex="-1" aria-hidden="true" x-data="{
    idDelete: '',
    deleteModel() {
     
        @this.delete(this.idDelete)
    }


}"
    @modal-get-delete.window="idDelete = $event.detail">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body p-0">

                <div class="p-5 text-center"> <i data-lucide="x-circle" class="w-16 h-16 text-danger mx-auto mt-3"></i>
                    <div class="text-3xl mt-5">¿Estas Seguro?</div>
                    <div class="text-slate-500 mt-2">{{ $message }}</div>
                </div>
                <div class="px-5 pb-8 text-center">
                    <button type="button" data-tw-dismiss="modal" class="btn btn-outline-secondary w-24 mr-1">
                        Cancelar
                    </button>
                    <button class="btn btn-danger w-24" x-on:click="deleteModel()">
                        Eliminar
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
