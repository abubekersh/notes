@php
use Illuminate\Support\Str;
@endphp
<x-layouts.app>
    <x-slot:title>
        {{Auth::user()->name}}`s Notes
    </x-slot:title>
    <section class="grid md:grid-cols-2 grid-cols-1 gap-5 gap-y-10 p-10 {{$trashs->isEmpty()?'h-screen':''}}">
        <h1 class="md:col-span-2 text-center text-2xl font-bold ">Notes Trash {{$trashs->isEmpty()?'Are Empty':''}}</h1>
        @foreach ($trashs as $trash )
        <div class="group bg-white border border-orange-500 max-h-60 p-5 text-black/90 rounded flex flex-col">
            <div class="flex justify-around items-center p-2 {{$trash->color}} rounded">
                <p class="md:text-2xl text-lg font-bold  text-white">{{$trash->title}}</p>
                <div class="w-7 rounded h-7 bg-white"></div>
            </div>
            @php
            $lines = explode('<br>',$trash->note);
            $limited = array_slice($lines,0,5);
            $new = implode('<br>',$limited);
            @endphp
            <p class=" text-xs p-4 ">{!! Str::of($new)->limit(180)!!}</p>
            <div class="text-xs flex p-4 justify-between mt-auto">
                <div class="flex gap-2">
                    <form action="/notes/{{$trash->id}}/restore" method="post">
                        @csrf
                        <button class="border border-red-400 rounded p-2">Restore</button>
                    </form>
                    <form action="/notes/{{$trash->id}}" method="post">
                        @csrf
                        @method('delete')
                        <button class="text-white bg-red-400 rounded p-2">Permanent Delete</button>
                    </form>
                </div>
                <p>{{$trash->created_at}}</p>
            </div>
        </div>
        @endforeach
        <a href="/notes" class="md:col-span-2 border border-orange-400 hover:bg-orange-400 hover:text-white font-bold transition-colors duration-700 p-3 rounded w-1/4 h-fit  text-center m-auto">Go Back</a>
    </section>
    <script>
        document.getElementById('color').addEventListener('change', function() {
            removeColors();
            this.classList.add('bg-' + this.value + "-400");
        });

        function removeColors() {
            let colors = ['bg-red-400', 'bg-green-400', 'bg-blue-400', 'bg-indigo-400', 'bg-amber-400', 'bg-purple-400'];
            colors.forEach(color => {
                document.getElementById('color').classList.remove(color);
            });
        }
    </script>
</x-layouts.app>