@php($id = $id ?? strtolower(str_replace('.', '', $model ?? $modelStart)))
<div
    @isset ($model)
        x-data="{ 
            start: $wire.entangle('{{ $model }}')@isset($defer).defer @endisset, 
            id: '{{ $id }}',
            updatedDates($event) {
                if ($event.detail.id === this.id) {
                    @isset($manualUpdate)
                    Livewire.emit('updatedDatePicker', $event.detail);
                    @else
                    this.start = $event.detail.start.date;
                    @endisset
                }
            }
        }"
        x-on:date-input-changed.window="updatedDates($event)"
    @else
        x-data="{ 
            start: $wire.entangle('{{ $modelStart }}')@isset($defer).defer @endisset,
            finish: $wire.entangle('{{ $modelFinish }}')@isset($defer).defer @endisset,
            id: '{{ $id }}',
            updatedDates($event) {
                if ($event.detail.id === this.id) {
                    @isset($manualUpdate)
                    Livewire.emit('updatedDatePicker', $event.detail);
                    @else
                    this.start = $event.detail.start.date;
                    this.finish = $event.detail.finish.date;
                    @endisset
                }
            }
        }" 
        x-on:date-input-changed.window="updatedDates($event)"
    @endisset
    {{-- @if (isset($initialize) && $initialize === true)
        x-init="() => { initializeDatepicker() }"
    @endif --}}
>
        
    <div class="absolute rounded-l w-10 h-full flex items-center justify-center bg-gray-100 border text-gray-600 dark:bg-dark-1 dark:border-dark-4
    @isset($model)
        @error($model) border-theme-6 @enderror
    @else
        @error($modelStart) border-theme-6 @enderror
        @error($modelFinish) border-theme-6 @enderror
    @endisset
    ">
        <x-feather-calendar class="w-4 h-4" />
    </div>

    <input 
        {{-- disabled --}}
        {{-- readonly --}}
        id="{{ $id }}"
        startProperty="{{ $model ?? $modelStart }}" 
        finishProperty="{{ $modelFinish ?? false }}" 
        type="text" 
        data-init="{{ $value ?? '' }}" 
        data-start="start"
        class="datepicker form-control pl-12
        @isset ($model)
            @error($model) border-theme-6 @enderror
            " data-single-mode="{{ !!$model }}">
        @else
        @error($modelStart) border-theme-6 "@enderror
        @error($modelFinish) border-theme-6 "@enderror
        @endisset
        
        <input x-model="start" type="hidden">
        @if (!isset($model)) 
        <input x-model="finish" type="hidden"> 
        @endif
</div>
