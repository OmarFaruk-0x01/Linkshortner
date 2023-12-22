<div>
    <form action="{{ route('links.store') }}" method="POST">
        @csrf
        <div>
            <x-input-label class="font-semibold">Long Url</x-input-label>
            <x-text-input type='url' name='longUrl' placeholder='long url' class="w-full" />
            <x-input-error :messages="$errors->get('longUrl')" class="mt-2" />
        </div>
        <div class="flex justify-end mt-5">
            <x-primary-button type='submit'>Submit</x-primary-button>
        </div>
    </form>

</div>
