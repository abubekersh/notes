@php
use Illuminate\Support\Str;
@endphp
<x-layouts.app>
    <x-slot:title>
        {{Auth::user()->name}}`s Notes
    </x-slot:title>
    <section class="grid md:grid-cols-2 grid-cols-1 gap-5 gap-y-10 p-10 {{$notes->isEmpty()?'h-screen':''}}">
        <form class="flex flex-row md:gap-15 gap-4 max-h-35 text-xs md:col-span-2 flex-wrap justify-center items-center font-bold py-6 bg-orange-500 ">
            <h2 class="text-center md:col-span-2">Filter</h2>
            <div class="flex gap-2 items-center justify-between md:col-span-2">
                <label for="color">Color</label>
                <select name="color" id="color" class="border  text-white border-white outline-0 p-1 rounded">
                    <option value="all" class="bg-orange-400">All</option>
                    <option value="red" class="bg-red-400 "></option>
                    <option value="green" class="bg-green-400"></option>
                    <option value="blue" class="bg-blue-400"></option>
                    <option value="purple" class="bg-purple-400"></option>
                    <option value="indigo" class="bg-indigo-400"></option>
                </select>
            </div>
            <div class="flex gap-2 items-center justify-between col-span-2">
                <label for="date">Date</label>
                <select name="date" id="date" class="border bg-white border-white outline-0 p-1 rounded">
                    <option value="new">Newest first</option>
                    <option value="old">oldest first</option>
                </select>
            </div>
            <div class="flex gap-2 items-center justify-between col-span-2">
                <label for="tilte">Title</label>
                <select name="title" id="title" class="border bg-white border-white outline-0 p-1 rounded">
                    <option value="asc">Ascending</option>
                    <option value="desc">Descending</option>
                </select>
            </div>
            <button class=" p-2 rounded bg-orange-500 text-white border border-white">Apply Filter</button>
            <a href="/notes/trash">
                <img src="/images/recycle-bin.png" class="w-5 ml-auto" alt="">
            </a>
        </form>
        <h1 class="md:col-span-2 text-center text-2xl font-bold ">Your Notes {{$notes->isEmpty()?'Are Empty':''}}</h1>
        @foreach ($notes as $note )
        <div class="group bg-white border border-orange-500 max-h-60 p-5 text-black/90 rounded flex flex-col">
            <div class="flex justify-around items-center p-2 {{$note->color}} rounded">
                <p class="md:text-2xl text-lg font-bold  text-white">{{$note->title}}</p>
                <div class="w-7 rounded h-7 bg-white"></div>
            </div>
            @php
            $lines = explode('<br>',$note->note);
            $limited = array_slice($lines,0,5);
            $new = implode('<br>',$limited);
            @endphp
            <p class=" text-xs p-4 ">{!! Str::of($new)->limit(180)!!}</p>
            <div class="text-xs flex p-4 justify-between mt-auto">
                <a href="/notes/{{$note->id}}/note" class="group"><span class="group-hover:underline">See More</span> <span class="group-hover:ml-1 transition-all duration-700">&rightarrow;</span></a>
                <p>{{$note->created_at}}</p>
            </div>
        </div>
        @endforeach
        <a href="/notes/create" class="rounded md:w-1/4 p-3 mb-10 font-bold inline-block hover:bg-orange-500 hover:text-white hover:fill-amber-800 transition-colors duration-800 ease-in-out md:col-span-2 text-center border border-orange-500  h-fit m-auto">
            create new note
        </a>
    </section>
</x-layouts.app>