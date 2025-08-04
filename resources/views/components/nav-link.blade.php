@props(['route', 'icon'])

<a href="{{ route($route) }}" 
   class="flex items-center p-2 rounded transition 
   {{ request()->routeIs($route) ? 'bg-green-100 text-green-600 font-semibold' : 'hover:bg-green-50' }}">
    <img src="{{ $icon }}" class="w-5 h-5 mr-2">
    {{ $slot }}
</a>
