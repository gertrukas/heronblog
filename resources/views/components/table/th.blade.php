<th class="border-b-2 dark:border-dark-5 whitespace-nowrap @isset($textLeft) text-left @else text-left @endisset @isset($state) cursor-pointer @endisset @isset($class) {{ $class }} @endisset @isset($tooltip) tooltip @endisset" @isset($tooltip) tooltip="{{ $tooltip }}" @endisset {{ $attributes->wire('click') }}>
	<span class="inline-block">{{ $slot }}</span>
	@isset($state)
		@if ($state['sort_by'] != (explode("'", $attributes->wire('click')->value())[1]))
			<x-fa-sort class="inline-block w-3 h-3"/>
		@elseif ($state['direction'] === 'ASC')
			<x-fa-sort-up class="inline-block w-3 h-3"/>
		@else
			<x-fa-sort-down class="inline-block w-3 h-3"/>
		@endif
	@endisset
</th>
