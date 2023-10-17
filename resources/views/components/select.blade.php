@php
    $id = $id ?? strtolower(str_replace('_', '-', str_replace('.','',$xModel ?? $attributes->wire('model')->value())));
    $xModel = $xModel ?? null;
    $varName = $xModel ?? 'selected';
    $reversed = $reversed ?? null;
@endphp
<div
        @if (!isset($xModel))
            x-data="{
                selected: @entangle($attributes->wire('model'))@if($defer ?? $attributes->wire('model')->hasModifier('defer')).defer @endif,
                updatedSelect(value) {
                    @isset($manualUpdate)
                        Livewire.emit('updatedTailSelect', {
                            propertyName: '{{ isset($propertyName) ? $propertyName: $attributes->wire('model')->value() }}',
                            value
                        });
                    @else
                        this.{{ $varName }} = value;
                    @endisset
                }
            }"
            @isset($multiple)
                @tail-select-{{ $id }}.window="updatedSelect([...{{ $varName }}, $event.detail])"
                @tail-unselect-{{ $id }}.window="updatedSelect({{ $varName }}.filter(option => option != $event.detail))"
            @else
                @tail-select-{{ $id }}.window="updatedSelect($event.detail)"
            @endisset
        @else

            @isset($multiple)
                @tail-select-{{ $id }}.window="{{ $varName }} = [...{{ $varName }}, $event.detail]"
                @tail-unselect-{{ $id }}.window="{{ $varName }} = {{ $varName }}.filter(option => option != $event.detail)"
            @else
                @tail-select-{{ $id }}.window="{{ $varName }} = $event.detail"
            @endisset
        @endif

        @isset($xShow)
            x-show="{{ $xShow }}"
        @endisset

        @isset($tooltip)
            @if ($tooltip != true)
                tooltip="{{ $tooltip }}"
                class="tooltip"
            @else
                @if (!isset($xModel))
                    @error($attributes->wire('model')->value()) class="tooltip" tooltip="{{ $message }}" @enderror
                @endif
                @if (isset($errorProperty) || isset($errorBorder))
                    @error($errorProperty ?? $errorBorder) class="tooltip" tooltip="{{ $message }}" @enderror
                @endif
            @endif
        @endisset

    wire:loading.class="pointer-events-none"
    >
    <select
            id="{{ $id }}"
            @isset($disabled) disabled @endisset
            @change="$dispatch('item-selected-{{ $id }}', $event.target.value)"
            class="w-full tail-select {{ $class ?? '' }}
            @if (!isset($xShowErrorProperty))
                @if (!isset($xModel))
                        @error($attributes->wire('model')->value()) border-theme-6 dark:border-theme-6 border rounded-md @enderror
                @endif
                @if (isset($errorProperty) || isset($errorBorder))
                        @error($errorProperty ?? $errorBorder) border-theme-6 dark:border-theme-6 border rounded-md @enderror
                @endif
            @else

            @endif

            @isset($openDown) open-down @endisset
                    "
            @isset($xShowErrorProperty)
                :class="{{ $xShowErrorProperty }} && '@if (!isset($xModel)) @error($attributes->wire('model')->value()) border-theme-6 dark:border-theme-6 border rounded-md @enderror @endif @if (isset($errorProperty) || isset($errorBorder)) @error($errorProperty ?? $errorBorder) border-theme-6 dark:border-theme-6 border rounded-md @enderror @endif'"
            @endisset

            @isset($placeholder) data-placeholder="{{ $placeholder }}" @endisset
            @isset($search) data-search="true" @endisset
            @isset($multiple) multiple @endisset
    >
    

        @if (!isset($multiple) && isset($placeholder))
            <option value="" @if(empty($model)) selected
                    @endif @if(!isset($enabledPlaceholder)) disabled @endif>{{ $placeholder ?? __('Select an option') }}</option>
            {{-- <option value="" @if(empty($model ?? $xModel)) selected @endif disabled>{{ $placeholder }}</option> --}}
        @endif
        {{-- Agregar un nuevo valor --}}



        {{ $slot }}

        @isset($optgroups)
            @foreach ($optgroups as $group => $optionsGrp)
                {{-- <option value="">{{ $placeholder ?? __('Select an option') }}</option> --}}
                <optgroup label="{{ $group }}">
                    @foreach ($optionsGrp as $key => $option)
                        @php($value = isset($useText) ? $option : $key)
                        <option value="{{ $value }}" @if(collect($model ?? $xModel)->contains($value)) selected @endif>
                            {{ __(is_array($option) ? $option['text'] : $option) }}
                        </option>
                    @endforeach
                </optgroup>
            @endforeach
        @else
            @if(isset($options[0]) && is_array($options[0]))
                @php($options = collect($options)->pluck('text', 'value')->toArray())
            @endif


            @foreach (

            (
                isset($noSort)
                ? collect($options)
                : (collect($options)->has('text')
                    ? ($reversed ? collect($options)->sortBy('text')->reverse() : collect($options)->sortBy('text'))
                    : ($reversed ? collect($options)->sort()->reverse() : collect($options)->sort()))
            ) as $key => $option)
                @php($value = isset($useText) ? $option : $key)
                {{-- Obtener el name --}}
                @php($getName = isset($name) ? true : false)   
                {{-- Validación del option --}}
                @php($opt =  is_array($option) ? $option['text'] : $option)
                {{-- Obtener el value por name, solo si especificas el name en el llamado al componente ejemplo :name="true" --}}
                <option value="{{  $getName ? $opt : $value }}"
                        @if (isset($xModel))
                        :selected="{{ $varName }} == '{{ $getName ? $opt : $value }}'"
                        @else
                            @if(collect($model ?? $xModel)->contains($getName ? $opt : $value)) selected @endif
                        @endisset
                        >
                    {{ $opt }}
                </option>


            @endforeach
        @endisset
    </select>
    @if (!isset($multiple))
        @if (isset($xShowErrorProperty))
            <x-error property="{{ $errorProperty ?? $attributes->wire('model')->value() }}"
                     x-show="{{ $xShowErrorProperty }}"/>
        @else
            <x-error property="{{ $errorProperty ?? $attributes->wire('model')->value() }}"/>
        @endif
    @endif
</div>
