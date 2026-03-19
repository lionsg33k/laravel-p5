@props([])

@php
    $navItems = [
        ['label' => 'Home', 'url' => url('/'), 'route' => null],
        ['label' => 'Participants', 'url' => route('participant'), 'route' => 'participant*'],
        ['label' => 'Posts', 'url' => route('posts.index'), 'route' => 'posts*'],
        ['label' => 'Courses', 'url' => route('courses.index'), 'route' => 'courses.*'],
        ['label' => 'Images', 'url' => route('files.index'), 'route' => 'files.*'],
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
