<div>

    <x-table.content title="Listado de Etiquetas">

        <x-slot name="addButton">
            <x-icon-button class="btn btn-dark w-60 mr-2 mb-2 cursor-pointer" id="create" icon-name="plus"
                text="Nueva Etiqueta" @click="$dispatch('action-modal-tag-create', {
                'action': 'Crear',
                'tag': 'null'
            }   )" />

        </x-slot>


        <div class="p-5 mt-5 intro-y box">

            <x-table.buttons :buttons="$buttons">
            </x-table.buttons>
            <div class="mt-4 overflow-x-auto">
                <x-table>

                    <x-slot name="head">

               
                        <x-table.th class="text-letf" wire:click="sortBy('id')" :state="$this->sortingState">
                            Nombre
                        </x-table.th>
                        <x-table.th class="text-letf" wire:click="sortBy('id')" :state="$this->sortingState">
                            Fecha de creación
                        </x-table.th>


                        <x-table.th class="text-letf">Acciones</x-table.th>
                    </x-slot>
                    <x-slot name="body">

                        @forelse ($datarows as $row)
                            <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $row->id }}">

                            
                                <x-table.cell class="text-letf">
                                    {{ $row->name }}
                                </x-table.cell>
                        

                                <x-table.cell class="text-letf">
                                    {{ $row->created_at->format('d-M-Y') }}
                                </x-table.cell>


                                <x-table.cell>
                                    <div class="flex items-letf justify-letf">



                                        <x-icon-button class="flex items-center text-yellow-500  cursor-pointer mr-6" icon-name="edit"
                                         
                                            @click="$dispatch('action-modal-tag-create', {
                                                'action': 'Editar',
                                                'tag': '{{ $row->id }}'
                                            }   )" />

                                        <x-icon-button class="flex items-center text-red-500 cursor-pointer mr-6" icon-name="trash"
                                            data-tw-toggle="modal"
                                            data-tw-target="#delete-modal-tag"
                                            @click="$dispatch('modal-get-delete', {{ $row->id }} ) " />


                                    </div>
                                </x-table.cell>

                            </x-table.row>
                        @empty
                            <x-table.row>
                                <x-table.cell colspan="19">
                                    <x-table.notresult></x-table.notresult>
                                </x-table.cell>
                            </x-table.row>
                        @endforelse
                    </x-slot>
                </x-table>
            </div>
            <x-pagination :collection="$datarows" />
        </div>




    </x-table.content>

    {{-- Modal Delete --}}
    <x-modal-delete id="delete-modal-tag" message="Está acción eliminara una Categoria" />
    
    <x-modal.basic id="{{ $modalId }}">
        <livewire:admin.tag.tag-create  :modalId="$modalId" :wire:key="'tag-modal'.$modalId" />
    </x-modal.basic>



</div>
