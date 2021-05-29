@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="text-lg">
            {{ $title }}
        </div>
    </div>

    <div class="px-6 py-4">
        {{ $content }}
    </div>

    <div class="px-6 py-4 bg-gray-100 text-right">
        {{ $footer }}
    </div>
</x-jet-modal>