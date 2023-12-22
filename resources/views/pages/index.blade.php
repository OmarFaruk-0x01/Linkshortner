<x-guest-layout>
    <div class="flex items-center justify-center flex-col gap-5">
        <x-card>
            <h4 class="text-center font-semibold text-xl uppercase text-gray-500">Url Shortner</h4>
            <div class="mt-5">
                @include('partials.forms.link-form')
            </div>
        </x-card>
        <div class="w-full">
            <h5 class="text-center font-semibold text-xl uppercase text-gray-500">Short Links</h5>

            @include('partials.lists.link-listings')
        </div>
    </div>
</x-guest-layout>
