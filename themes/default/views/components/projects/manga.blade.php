@props(['slug', 'title', 'type', 'cover', 'genres'])

<div class="group">
    <a href="{{ route('manga.show', $slug) }}" class="block">
        <div class="relative aspect-[2/3] rounded-2xl overflow-hidden mb-4 shadow-2xl transition-all duration-500 group-hover:scale-[1.02] group-hover:shadow-neon-purple/20">
            <img class="h-full w-full object-cover lazyload transition-all duration-500 group-hover:brightness-110" 
                 data-src="{{ str_starts_with($cover, 'http') ? $cover : (str_contains($cover, '/') ? asset('storage/' . $cover) : asset('storage/covers/' . $cover)) }}" 
                 alt="{{ $title }}" />
            <div class="absolute inset-0 bg-gradient-to-t from-surface via-transparent to-transparent opacity-60"></div>
        </div>
        <div class="px-1">
            <div class="flex flex-wrap gap-1 mb-1">
                <span class="text-[10px] font-manrope font-bold tracking-widest uppercase text-on-surface-variant/60">
                    {{ __($type) }}
                </span>
            </div>
            <h3 class="font-epilogue text-sm font-bold text-on-surface leading-tight group-hover:text-neon-purple transition-colors truncate">
                {{ $title }}
            </h3>
            @if(isset($genres) && $genres->count() > 0)
            <div class="mt-2 flex flex-wrap gap-1 overflow-hidden h-5">
                @foreach ($genres->take(2) as $genre)
                <span class="text-[9px] px-1.5 py-0.5 rounded-md bg-surface-container-high text-on-surface-variant/80 border border-outline-variant/10">
                    {{ $genre->title }}
                </span>
                @endforeach
            </div>
            @endif
        </div>
    </a>
</div>
