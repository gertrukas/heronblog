@php($id = $id ?? uniqid())
<button 
    wire:click="$emit('showModal', '{{ $id }}')"
    class="cursor-pointer flex items-center show-modal {{ $textTheme ?? $theme }} {{ $class ?? '' }} @isset($tooltip) tooltip @endisset"
    tooltip="{{ $tooltip ?? '' }}"
    style="outline: none; {{ $style ?? '' }}"
>
    {{ $slot }}
</button>
<div class="modal" id="{{ $id }}" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog {{ $modalClass ?? $modalClass }}">
        <div class="modal-content">
            <div class="p-5 text-center">
                <i data-feather="{{ $icon }}" class="w-16 h-16 mx-auto mt-3 {{ $theme }}"></i>
                <div class="text-xl mt-5">{{ $title }}</div>
                @if (isset($subtitle) && is_array($subtitle))
                    @foreach ($subtitle as $sub)
                        <div class="@if($loop->first) mt-2 @endif text-gray-600">{{ $sub }}</div>
                    @endforeach
                @else
                    <div class="mt-2 text-gray-600">{{ $subtitle ?? '' }}</div>
                @endif
            </div>
            <div class="px-5 pb-8 text-center">
                <button
                        @isset($buttonsWidth) style="width: {{ $buttonsWidth }}" @endisset
                type="button"
                        data-dismiss="modal"
                        class="btn btn-outline-secondary w-{{ $buttonsWidth ?? '24' }} mr-1 text-{{ $button1Text ?? 'gray-700' }}"
                >
                    {{ $button1 }}
                </button>
                <button
                        {{ $attributes->wire('click') }}
                        @isset($buttonsWidth) style="width: {{ $buttonsWidth }}" @endisset
                        wire:loading.attr="disabled"
                        type="button"
                        class="btn w-{{ $buttonsWidth ?? '24' }} text-{{ $button2Text ?? 'white' }} button {{ $theme }}"
                >
                    <svg
                            wire:loading
                            wire:target="{{ explode('(', $attributes->wire('click')->value())[0] }}"
                            class="w-5 h-5 dark:text-white text-black animate-spin" xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                    >
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="3"></circle>
                        <path class="opacity-75" fill="currentColor" d="M3 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    <span wire:loading.remove wire:target="{{ explode('(', $attributes->wire('click')->value())[0] }}">{{ $button2 }}</span>
                </button>
            </div>
        </div>
    </div>
</div>
