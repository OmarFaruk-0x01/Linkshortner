@php
    $parsedUrl = parse_url($link->long_url);
    $domain = 'null';
    if (isset($parsedUrl['host'])) {
        $domain = $parsedUrl['host'];
    }
    $shortUrl = route('links.show', ['link' => $link]);
@endphp

<x-card>
    <div class='flex gap-3 items-start' x-data="{ input: '{{ $shortUrl }}', isCopied: false }">
        <div class="w-[48px]">
            <img width="100%" height="100%"
                src="https://t2.gstatic.com/faviconV2?client=SOCIAL&type=FAVICON&fallback_opts=TYPE,SIZE,URL&url=http://{{ $domain }}&size=64" />
        </div>
        <div class="w-full flex flex-col gap-1">
            <div class="flex items-center justify-between gap-3">
                <a href="{{ $shortUrl }}" target="_blank" class="font-semibold text-black line-clamp-1 break-all">
                    {{ $shortUrl }}
                </a>
                <span x-show="isCopied" x-transition
                    class="text-sm text-green-700 bg-green-100 px-2 py-1 rounded">Copied</span>
            </div>
            <span class="text-sm text-gray-500 line-clamp-1 break-all">
                {{ $link->long_url }}
            </span>
            <div class="flex items-center gap-2 justify-end mt-2">
                <span
                    class="text-sm text-gray-500">{{ \Illuminate\Support\Carbon::parse($link->created_at)->diffForHumans() }}</span>
                <span
                    class="bg-gray-200 px-2 text-sm rounded truncate">{{ \Illuminate\Support\Number::abbreviate($link->clicks, 0) }}
                    clicks</span>
                <x-secondary-button
                    @click="navigator.clipboard.writeText(input),isCopied = true, setTimeout(() => {isCopied = false}, 2000)"
                    ::class="'!px-2 !py-1'">
                    Copy
                </x-secondary-button>
                <form action="{{ route('links.remove', ['id' => $link->id]) }}" method='POST'>
                    @csrf
                    @method('delete')
                    <x-danger-button type='submit' class="!px-3 !py-1">
                        Delete
                    </x-danger-button>
                </form>
            </div>
        </div>
    </div>
</x-card>
