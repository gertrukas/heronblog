@props(['id' => null, 'maxWidth' => null])

<x-modalview :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right dark:bg-dark-3">
        {{ $footer }}
    </div>
</x-modalview>
