<x-layouts.app>
    <x-slot:title>{{$note->title}}</x-slot:title>
    <section class="md:w-1/2 w-[90%]  my-10 m-auto {{$note->color}} border border-orange-500 rounded">
        <a href="{{Auth::user()->is_admin?'/admin':'/notes'}}" class="block border border-orange-500 p-2 mt-4 mx-2 bg-white font-bold text-black rounded text-xs">Back to home</a>
        <div class="flex   items-center gap-2 p-5 ">
            <p class="bg-white grow border-b-2 text-center outline-0 p-4">{{$note->title}}</p>
        </div>
        @php
        $lines = explode('<br>',$note->note);
        @endphp
        <div id="note-book" class="p-4 text-sm">
            @foreach ($lines as $line)
            @if ($line != null)
            <p class="outline-0 border-b p-3 block w-full">{{$line}}</p>
            @endif
            @endforeach
        </div>
        <div class="bg-white flex justify-center p-2 gap-3 text-xs">
            @if (!Auth::user()->is_admin)
            <a href="/notes/{{$note->id}}/edit" class="border border-orange-500 p-2 text-center font-bold rounded">Edit</a>
            @endif
            <form action="/notes/{{$note->id}}" method="post">
                @csrf
                @method('delete')
                <button class="bg-red-400 text-white font-bold p-2  rounded">Delete</button>
            </form>
        </div>
    </section>
</x-layouts.app>