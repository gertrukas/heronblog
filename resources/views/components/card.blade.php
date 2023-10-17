<div class="col-span-12 sm:col-span-6 xl:col-span-3 intro-y">
    <div class="report-box zoom-in">
        <div class="box p-5">
            <div class="text-2xl font-medium leading-8 mt-2" style="overflow-x: auto; overflow-y: hidden">
                @if (isset($money))
                    {{-- {{ $value }} --}}
                    @isset($decimals)
                        @if ($decimals == 2)
                            @money2Decimals($value)
                        @elseif($decimals == 4)
                            @money4Decimals($value)
                        @else
                            @money($value)
                        @endif
                    @else
                        @money($value)
                    @endisset
                @else
                    {{ $value }}
                @endif
            </div>
            <div class="text-base text-gray-600 mt-1">
                {{ $title }}
            </div>
        </div>
    </div>
</div>
