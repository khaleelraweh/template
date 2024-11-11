@props(['route', 'slug'])

<a href="{{ route($route, $slug) }}">
    {{ $slot }}
</a>
