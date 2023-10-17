<div>



    <x-table.content title="Listado de Paises">




        <div class="p-5 mt-5 intro-y box">

            <x-table.buttons :buttons="$buttons">
            </x-table.buttons>

            <div class="mt-4 overflow-x-auto">
                <x-table>

                    <x-slot name="head">

                        <x-table.th class="text-center" wire:click="sortBy('country')" :state="$this->sortingState">
                            Paises
                        </x-table.th>

                        <x-table.th class="text-center" wire:click="sortBy('count')" :state="$this->sortingState">
                            Visitas
                        </x-table.th>

                        <x-table.th class="text-center" wire:click="sortBy('interactions')" :state="$this->sortingState">
                            Interacciónes
                        </x-table.th>



                    </x-slot>

                    <x-slot name="body">


                        @if (count($datarows) == 1)
                            @forelse ($datarows as $row)
                                <tr>
                                    <td class="text-center">
                                        {{ $row->country }}
                                    </td>
                                    <td class="text-center">
                                        {{ $row->count }}
                                    </td>
                                    <td class="text-center">
                                        {{ $row->interactions }}
                                    </td>
                                </tr>


                            @empty
                                <x-table.row>
                                    <x-table.cell colspan="19">
                                        <x-table.notresult></x-table.notresult>
                                    </x-table.cell>
                                </x-table.row>
                            @endforelse
                        @else
                            @forelse ($datarows as $row)
                                <tr>
                                    <td class="text-center">
                                        {{ $row->country }}
                                    </td>
                                    <td class="text-center">
                                        {{ $row->count }}
                                    </td>
                                    <td class="text-center">
                                        {{ $row->interactions }}
                                    </td>
                                </tr>

                            @empty
                                <x-table.row>
                                    <x-table.cell colspan="19">
                                        <x-table.notresult></x-table.notresult>
                                    </x-table.cell>
                                </x-table.row>
                            @endforelse
                        @endif


                        {{-- @json( $datarows) --}}



                    </x-slot>
                </x-table>
            </div>
            <x-pagination :collection="$datarows" />
        </div>




    </x-table.content>




</div>
