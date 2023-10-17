<div>

    <x-table.content title="Listado de Blogs">

        <x-slot name="addButton">
            <x-icon-button class="btn btn-dark w-60 mr-2 mb-2 cursor-pointer" id="create" icon-name="plus"
                text="Nuevo Blog" href="{{ route('admin.blogs.create') }}" />

        </x-slot>


        <div class="p-5 mt-5 intro-y box">

            <x-table.buttons :buttons="$buttons">
            </x-table.buttons>
            <div class="mt-4 overflow-x-auto">
                <x-table>

                    <x-slot name="head">

                        <x-table.th class="text-left" wire:click="sortBy('id')" :state="$this->sortingState">
                            Thumbnail
                        </x-table.th>
                        <x-table.th class="text-left" wire:click="sortBy('id')" :state="$this->sortingState">
                            Titulo
                        </x-table.th>




                        <x-table.th class="text-left" wire:click="sortBy('id')" :state="$this->sortingState">
                            Fecha de creación
                        </x-table.th>


                        <x-table.th class="text-left">Acciones</x-table.th>
                    </x-slot>
                    <x-slot name="body">

                        @forelse ($datarows as $row)
                            <x-table.row wire:loading.class.delay="opacity-50" wire:key="row-{{ $row->id }}">

                                <x-table.cell class="text-center">
                                    <img src="{{ asset('uploads/' . $row->image) }}" class="w-10 h-10" alt="">
                                </x-table.cell>
                                <x-table.cell class="text-left">
                                    <a href="{{ route('admin.blogs.create', $row->id) }}">
                                        {{ $row->name }}
                                    </a>

                                </x-table.cell>





                                <x-table.cell class="text-left">
                                    {{ $row->created_at->format('d-M-Y') }}
                                </x-table.cell>


                                <x-table.cell>
                                    <div class="flex items-center justify-start">


                                        @if ($row->active)
                                            <x-icon-button class="flex items-center cursor-pointer mr-6 text-green-500"
                                                icon-name="check"  wire:click="changeStatus({{$row->id}})" />
                                        @else
                                            <x-icon-button class="flex items-center cursor-pointer mr-6 text-red-500"
                                                icon-name="x"  wire:click="changeStatus({{$row->id}})" />
                                        @endif



                                        <x-icon-button class="flex items-center cursor-pointer mr-6 text-yellow-500"
                                            icon-name="edit" href="{{ route('admin.blogs.create', $row->id) }}" />

                                        <x-icon-button class="flex items-center cursor-pointer text-red-500 mr-6"
                                            icon-name="trash" data-tw-toggle="modal"
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
    <x-modal-delete id="delete-modal-category" message="Está acción eliminara un Post" />




</div>
