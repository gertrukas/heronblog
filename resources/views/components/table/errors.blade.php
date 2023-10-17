@isset($message)  
    <div 
        @isset($bootstrap)
            class="text-danger" style="margin-top: -15px; font-size: 14px"
        @else
            class="w-5/6 mt-2 login__input-error text-theme-6"
        @endisset
    >
        {{ ucfirst($message) }}
    </div>  
@endisset