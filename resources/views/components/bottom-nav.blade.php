@props(['route', 'icon'])

@php
    $active = request()->routeIs($route);
@endphp

<a href="{{ route($route) }}" class="flex flex-col items-center {{ $active ? 'text-green-600' : 'text-gray-500' }}">
    <img src="{{ $icon }}" class="w-6 h-6">
    <span class="text-xs mt-1">{{ $slot }}</span>
</a>
