@php
$last = $paginator->lastPage();
if ($last > 24) {
    $reference = $elements[0][1];
    $elements=[];
    $current = $paginator->currentPage();

    if($current <= 5){
        // Izquierda
        for ($i=1; $i <= 6; $i++)
            $elements[0][$i] = str_replace("1", $i, $reference);

        $elements[1]="...";

        $elements[2][$last - 1] = str_replace("1", $last - 1, $reference);
        $elements[2][$last] = str_replace("1",$last, $reference);
    }else if($current + 5 > $last){
        // Derecha
        $elements[0][1] = $reference;
        $elements[0][2] = str_replace("1",2, $reference);

        $elements[1] = "...";

        for ($i=$last - 5; $i <= $last ; $i++) 
            $elements[2][$i] = str_replace("1", $i, $reference);
    }else{
        // En medio
        $elements[0][1] = $reference;
        $elements[0][2] = str_replace("1",2, $reference);

        $elements[1] = "...";

        $elements[2][$current - 1] = str_replace("1", $current - 1, $reference);
        $elements[2][$current] = str_replace("1", $current, $reference);
        $elements[2][$current + 1] = str_replace("1", $current + 1, $reference);
        
        $elements[3] = "...";

        $elements[4][$last - 1] = str_replace("1", $last - 1, $reference);
        $elements[4][$last] = str_replace("1",$last, $reference);
    }
}
@endphp

<div class="intro-y col-span-12 flex flex-wrap sm:flex-row sm:flex-nowrap items-center">
    @if ($paginator->hasPages())
        <span class="relative z-0 inline-flex {{-- shadow-sm --}}">
            <span>
                {{-- Previous Page Link --}}
                @if ($paginator->onFirstPage())
                    <span aria-disabled="true" aria-label="{{ __('pagination.previous') }}">
                        <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-200 cursor-default dark:border-dark-6 dark:bg-dark-3 rounded-l-md" aria-hidden="true">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </span>
                @else
                    <button wire:click="previousPage" dusk="previousPage.after" rel="prev" class="relative inline-flex items-center px-2 py-2 text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white border border-gray-200 dark:border-dark-6 dark:bg-dark-3 rounded-l-md hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500" aria-label="{{ __('pagination.previous') }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                @endif
            </span>
  
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <span aria-disabled="true">
                        <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 bg-white border border-gray-200 cursor-default dark:border-dark-6 dark:bg-dark-3">{{ $element }}</span>
                    </span>
                @endif
  
                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        <span wire:key="paginator-page{{ $page }}">
                            @if ($page == $paginator->currentPage())
                                <span aria-current="page">
                                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-200 cursor-default dark:border-dark-6 dark:bg-dark-3">{{ $page }}</span>
                                </span>
                            @else
                                <button wire:click="gotoPage({{ $page }})" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium leading-5 text-gray-700 transition duration-150 ease-in-out bg-white border border-gray-200 dark:border-dark-6 dark:bg-dark-3 hover:text-gray-500 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-700" aria-label="{{ __('Go to page :page', ['page' => $page]) }}">
                                    {{ $page }}
                                </button>
                            @endif
                        </span>
                    @endforeach
                @endif
            @endforeach
  
            <span>
                {{-- Next Page Link --}}
                @if ($paginator->hasMorePages())
                    <button wire:click="nextPage" dusk="nextPage.after" rel="next" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 transition duration-150 ease-in-out bg-white border border-gray-200 dark:border-dark-6 dark:bg-dark-3 rounded-r-md hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500" aria-label="{{ __('pagination.next') }}">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </button>
                @else
                    <span aria-disabled="true" aria-label="{{ __('pagination.next') }}">
                        <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium leading-5 text-gray-500 bg-white border border-gray-200 cursor-default dark:border-dark-6 dark:bg-dark-3 rounded-r-md" aria-hidden="true">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                            </svg>
                        </span>
                    </span>
                @endif
            </span>
        </span>

    @else
        <div class="paginator-one-page">
            <p class="text-sm leading-5 text-gray-700 dark:text-gray-500">
                <span class="font-medium">{{ $paginator->total() }}</span>
                <span>{!! __('results') !!}</span>
            </p>
        </div>

    @endif
  </div>
  