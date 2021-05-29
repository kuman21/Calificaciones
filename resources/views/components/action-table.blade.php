@props(['url' => '#'])

<a {{ $attributes->merge(['href' => $url, 'class' => 'text-indigo-600 hover:text-indigo-900']) }}>
    {{ $slot }}
</a>