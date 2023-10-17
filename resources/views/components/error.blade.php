@error($property)  
    <div
        @isset($xShow)
            x-show="{{ $xShow }}"
        @endisset
        @isset($bootstrap)
            class="text-danger"
        @else
            class="w-5/6 mt-2 text-red-500"
        @endisset
    >
        {{ ucfirst($message) }}
    </div> 
@enderror