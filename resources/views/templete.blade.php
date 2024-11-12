<x-layout>

    @if ($content === 'content')
        <x-content />
    @elseif ($content === 'list_vehicle')
        <x-list_vehicle :data="$data"  />
    @elseif ($content === 'percobaan')
        <x-percobaan :data="$data"  />
    @elseif ($content === 'add_vehicle')
        <x-add_vehicle :data="$data"  />
    @else
        <p>Komponen tidak tersedia</p>
    @endif
</x-layout>