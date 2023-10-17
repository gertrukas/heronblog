<div id="{{$this->modalIdEditMassiveUnit}}"
     class="modal"
     tabindex="-1"
     aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-body p-0">
                <div class="p-5 text-center">
                    <i data-feather="tool" class="w-16 h-16 text-theme-1 mx-auto mt-3"></i>
                    <div class="text-xl mt-5">Modificar Unidad</div>
                    <div class="text-gray-600 mt-2 mb-2 flex justify-center">
                        Se modificará la unidad de
                        @isset ($useSupply)
                            <span class="text-theme-1 mr-2 ml-2"
                              x-text="`${selected.length} Insumo${selected.length > 1 ? 's' : ''}`">
                            </span>
                        @else
                            <span class="text-theme-1 mr-2 ml-2"
                                  x-text="`${selected.length} Análisis`">
                            </span>
                        @endisset
                        <div x-text="`seleccionado${selected.length > 1 ? 's' : ''}`">
                        </div>
                    </div>
                    <x-select id="edit-unit-concept"
                              openDown
                              search
                              wire:model.defer="unitIdSelected"
                              :model="$this->unitIdSelected"
                              :options="$this->unities_query"
                              placeholder="Selecciona una Unidad"
                    >
                    </x-select>
                </div>
                <div class="modal-footer text-center">
                    <button type="button" data-dismiss="modal" class="btn btn-outline-secondary w-48 mr-1">Cancelar</button>
                    {{--<button type="button" class="btn btn-primary w-48">Modificar Unidad</button>--}}
                    <x-button
                            wire:click="massiveAction('{{ config('globals.actions.unique-concepts.' . (isset ($useSupply) ? 'UPDATE_UNIT_UNIQUE_SUPPLY' : 'UPDATE_UNIT_UNIQUE_ANALYSIS')) }}')"
                            text="Modificar Unidad"
                            class="btn btn-primary w-48"/>
                </div>
            </div>
        </div>
    </div>
</div>