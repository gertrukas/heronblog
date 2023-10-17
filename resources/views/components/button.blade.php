@isset($useAElement)
    <a 
        {{ $attributes->wire('click') }}
        @isset($xShow) ="{{ $xShow }}" @endisset
        class="button @isset($icon) flex items-center align-top @endisset {{ $class ?? '' }} @isset($tooltip) tooltip @endisset"
        style="{{ $style ?? '' }}"
        wire:loading.attr="disabled"
        @isset($tooltip) tooltip="{{ $tooltip }}" @endisset
    >
        @isset($icon)
            <span wire:loading.remove wire:target="{{ $attributes->wire('click')->value() }}">
                <i data-feather="{{ $icon }}" class="hidden w-4 h-4 mr-2 sm:block"></i>
            </span>
            <x-svg-loader 
                wire:loading wire:target="{{ $attributes->wire('click')->value() }}" 
                class="hidden w-4 h-4 mr-2 animate-spin sm:block" 
            /> 
        @else
            <x-svg-loader 
                wire:loading wire:target="{{ $attributes->wire('click')->value() }}" 
                class="hidden w-5 h-5 mr-2 animate-spin sm:block" 
            /> 
        @endisset
        <span @if(!isset($icon)) wire:loading.remove wire:target="{{ $attributes->wire('click')->value() }}" @endif @isset($xText) x-text="{{ $xText }}" @endisset>
            @isset($text)
                {!! $text !!}
            @endisset
        </span>
    </a>
@else

    @if (!isset($target))
        @php($target = isset($submit) ? 'submit' : $attributes->wire('click')->value())
    @endif
    <button
        @isset($submit)
            type="submit"
        @else
            type="button"
            {{ $attributes->wire('click') }} 
        @endisset
        @isset($xShow) x-show="{{ $xShow }}" @endisset
        wire:loading.attr="disabled"
        wire:loading.class="pointer-events-none"
        class="button @isset($icon) flex items-center align-top @endisset {{ $class ?? '' }} @isset($tooltip) tooltip @endisset"
        style="{{ $style ?? '' }}"
        @isset($tooltip) tooltip="{{ $tooltip }}" @endisset
    >
        @isset($icon)
            <span wire:loading.remove wire:target="{{ $target }}">
                <i data-feather="{{ $icon }}" class="hidden w-4 h-4 mr-2 sm:block"></i>
            </span>
            <x-svg-loader 
                wire:loading wire:target="{{ $target }}" 
                class="hidden w-4 h-4 mr-2 animate-spin sm:block" 
            /> 
        @else
            <x-svg-loader 
                wire:loading wire:target="{{ $target }}" 
                class="hidden w-5 h-5 mr-2 animate-spin sm:block" 
            /> 
        @endisset
        <span @if(!isset($icon)) wire:loading.remove wire:target="{{ $target }}" @endif @isset($xText) x-text="{{ $xText }}" @endisset>
            @isset($text)
                {!! $text !!}
            @endisset
        </span>
    </button>
@endisset
