<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Image') }}
        </h2>
    </x-slot>

    <div class="flex justify-center items-center h-[70vh]">
    <form action="/image" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="src" class="
        file:bg-gradient-to-br file:from-emerald-500 file:to-sky-500
        file:border-0
        file:h-16
        file:my-4
        file:mx-4
        file:rounded-full
        file:text-white
        file:cursor-pointer
        bg-gradient-to-l from-slate-500 to-gray-800 rounded-full text-white">
        <button type="submit" class="absolute right-14 top-[20vh] w-28 h-14 transition ease-in-out delay-150 bg-blue-500 hover:-translate-y-1 hover:scale-110 hover:bg-indigo-500 duration-200 text-white rounded-full text-xl">Add</button>
    </form>
</div>
</x-app-layout>
