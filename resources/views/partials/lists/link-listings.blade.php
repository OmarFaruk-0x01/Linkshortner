@auth
    <div class="flex flex-col gap-3 items-center justify-center mt-3 pb-3">
        @if (count($links) > 0)
            @foreach ($links as $link)
                <x-link-card :link="$link" />
            @endforeach
        @else
            <div class="p-10">
                <h2 class='text-center text-gray-400'>No Links Created</h2>
            </div>
        @endif
    </div>
@else
    <div class="p-10">
        <h2 class='text-center text-gray-400'>Login Required (!)</h2>
    </div>
@endauth
