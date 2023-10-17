@props([
'collapse' => false,
'rowIndex' => null,
'nivelCollapse'=> null,
'sortableMove'=> false,
'isLast' => false,
'action' => false,
'id' => null,
'model' => null,
'text' => null,
'tabletext' => false,
])
@php($class = $isLast ? 'whitespace-nowrap text-left' : 'border-b whitespace-nowrap text-left')
<td {{ $attributes->merge(compact('class')) }}>
    @if($collapse==true)
    @if($action==true)
    <button class="cursor-pointer"
        x-on:click="openCollapse('{{$nivelCollapse}}-{{$rowIndex}}','{{$model}}');Query({{$id}},'{{$model}}','{{$nivelCollapse}}-{{$rowIndex}}')">
        @else
        <button class="cursor-pointer" x-on:click="openCollapse('{{$nivelCollapse}}-{{$rowIndex}}','{{$model}}')">
            @endif
            <x-fa-chevron-right class="inline-block w-3 h-3"
                x-show="!openedIndex.includes('{{$nivelCollapse}}-{{$rowIndex}}')" />

            <x-fa-chevron-down class="inline-block w-3 h-3"
                x-show="openedIndex.includes('{{$nivelCollapse}}-{{$rowIndex}}')" />
            <span @if($tabletext==true) class="cursor-pointer border-b whitespace-nowrap text-left font-extrabold" @else
                @endif>{{$text}}</span>
        </button>

        @endif
        @if($sortableMove==true)
        <button wire:sortable.handle class="inactivoButton">
            <x-fa-bars class="inline-block w-3 h-3" />
        </button>
        @endif

        {{ $slot }}
</td>
