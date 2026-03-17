@props([])

@php
    $navItems = [
        ['label' => 'Home', 'url' => url('/'), 'route' => null],
        ['label' => 'Participants', 'url' => route('participant'), 'route' => 'participant*'],
        ['label' => 'Posts', 'url' => route('posts'), 'route' => 'posts*'],
        ['label' => 'Images', 'url' => url('/images-crud'), 'route' => "files.images"],
        ['label' => 'Students', 'url' => route('student'), 'route' => 'student'],
    ];
@endphp

<aside {{ $attributes->merge(['class' => 'flex h-full w-1/5 shrink-0 flex-col bg-alpha']) }}>
    <div class="flex flex-col gap-1 p-4">
        @foreach ($navItems as $item)
            @php
                $isActive = $item['route']
                    ? request()->routeIs($item['route'])
                    : request()->is('/');
            @endphp
            <a href="{{ $item['url'] }}"
                class="rounded-lg px-4 py-3 text-sm font-medium transition {{ $isActive ? 'bg-white/20 text-white' : 'text-white/80 hover:bg-white/10 hover:text-white' }}">
                {{ $item['label'] }}
            </a>
        @endforeach
    </div>
</aside>
