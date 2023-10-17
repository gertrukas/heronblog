@isset ($useButtonElement)
  <button 
@else
  <a 
@endisset
  {{ $attributes }}
  class="cursor-pointer flex items-center justify-center  mr-{{ $marginRight ?? 2 }} @isset($color) text-{{$color}} @endisset @isset($theme) text-{{$theme}} @endisset @isset($tooltip) tooltip @endisset @isset($className) {{$className}} @endisset"
  @isset($xClass)
    :class="{{ $xClass }}"
  @endisset
   @isset($xDisabled)
   :disabled="{{ $xDisabled }}"
   @endisset
  tooltip="{{ $tooltip ?? ''}}"
  wire:loading.attr="disabled">
  <x-svg-loader wire:loading class="w-4 h-4 animate-spin" wire:target="{{ $attributes->wire('click')->value() }}" />
  <span wire:loading.remove wire:target="{{ $attributes->wire('click')->value() }}">
    <i class="fas fa-{{ $iconName }}" class="w-4 h-4 "></i>
  </span>
  @isset($text)
  <div class="ml-2">
    {{ $text }}
  </div>
  @endisset
@isset ($useButtonElement)
  </button>
@else
  </a>
@endisset
