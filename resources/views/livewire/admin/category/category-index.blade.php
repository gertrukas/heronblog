<div>

    <x-table.content title="Listado de Categorias">

        <x-slot name="addButton">
            <x-icon-button class="btn btn-dark w-60 mr-2 mb-2 cursor-pointer" id="create" icon-name="plus"
                text="Nueva Categoria" @click="$dispatch('action-modal-category-create', {
                'action': 'Crear',
                'category': 'null'
            }   )" />

        </x-slot>


        <div class="p-5 mt-5 intro-y box">

            <x-table.buttons :buttons="$buttons">
            </x-table.buttons>
            <div class="mt-4 overflow-x-auto">
                <x-table>

                    <x-slot name="head">

                    
                        <x-table.th class="text-left" wire:click="sortBy('id')" :state="$this->sortingState">
                            Nombre
                        </x-table.th>
                        <x-table.th class="text-left" wire:click="sortBy('id')" :state="$this->sortingState">
                            Descripción
                        </x-table.th>
                        <x-table.th class="text-left" wire:click="sortBy('id')" :state="$this->sortingState">
                            Banner
                        </x-table.th>
                        <x-table.th class="text-left" wire:click="sortBy('id')" :state="$this->sortingState">
                            Slug
                        </x-table.th>
                     
                        <x-table.th class="text-left" wire:click="sortBy('id')" :state="$this->sortingState">
                            Fecha de creación
                        </x-table.th>


                        <x-table.th class="text-left">Acciones</x-table.th>
                    </x-slot>
                    <x-slot name="body">

                        @forelse ($datarows as $row)
                            <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $row->id }}">

                             
                                <x-table.cell class="text-left">
                                    {{ $row->name }}
                                </x-table.cell>
                                <x-table.cell class="text-left">
                                    {{ $row->description }}
                                </x-table.cell>
                                <x-table.cell class="text-left">
                                    <div class="flex justify-letext-left">

                                        @if ($row->url_image)
                                            <img src="{{ asset('storage/' . $row->url_image) }}"
                                                class="h-16 w-40 rounded-md" class="">
                                        @endif
                                    </div>
                                </x-table.cell>
                                <x-table.cell class="text-left">
                                    <span class=" border rounded-md border-gray-500 px-2 py-1 text-xs">
                                        {{ $row->slug }}</span>
                                </x-table.cell>

                            


                                <x-table.cell class="text-left">
                                    {{ $row->created_at->format('d-M-Y') }}
                                </x-table.cell>


                                <x-table.cell>
                                    <div class="flex items-center justify-start">



                                        <x-icon-button class="flex items-center cursor-pointer mr-6 text-yellow-500 " icon-name="edit"
                                          
                                            @click="$dispatch('action-modal-category-create', {
                                                'action': 'Editar',
                                                'category': '{{ $row->id }}'
                                            }   )" />

                                        <x-icon-button class="flex items-center text-red-500  cursor-pointer mr-6" icon-name="trash"
                                             data-tw-toggle="modal"
                                            data-tw-target="#delete-modal-category"
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
    <x-modal-delete id="delete-modal-category" message="Está acción eliminara una Categoria" />
    
    <x-modal.basic id="{{ $modalId }}">
        <livewire:admin.category.category-create  :modalId="$modalId" :wire:key="'category-modal'.$modalId" />
    </x-modal.basic>



</div>
