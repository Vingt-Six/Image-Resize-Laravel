<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <img src="{{ asset('storage/thumbnails/' . $images[0]->src) }}" alt="">
        </div>
    </x-slot>

    <div class="max-w-sm rounded overflow-hidden shadow-lg">
        <img class="w-full" src="{{ asset('storage/' . $images[0]->src) }}" alt="Sunset in the mountains">
        <div class="px-6 py-4">
            <div class="font-bold text-xl mb-2">The Coldest Sunset</div>
        </div>
        <div class="px-6 pt-4 pb-2">
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#photography</span>
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#travel</span>
            <span
                class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#winter</span>
        </div>
    </div>

    <form action="/image/1" method="POST">
        @csrf
        @method('PUT')
        <select name="id">
            @foreach ($images as $image)
                <option value="{{ $image->id }}">{{ $image -> id }}</option>
            @endforeach
        </select>
        <button type="submit">Change</button>
    </form>

    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach ($images as $image)
                <div class="carousel-item {{ $image->first == 1 ? 'active' : '' }}">
                    <img src="{{ asset('storage/'. $image->src) }}" class="d-block w-[40vw] mx-auto" alt="...">
                </div>
            @endforeach
        </div>
        <button class="carousel-control-prev bg-black rounded-2xl" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next bg-black rounded-2xl" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</x-app-layout>
