<x-layouts.app>
    <x-slot:title>
        Create New Note
    </x-slot:title>
    <form id="book" action="/notes" method="post" class="md:w-1/2 w-[90%]  my-10 m-auto border border-orange-500 rounded">
        @csrf
        <a href="/notes" class="block border border-orange-500 p-2 mt-4 mx-2 bg-white font-bold text-black rounded text-xs">Back to home</a>
        <div class="flex   items-center gap-2 p-5 ">
            <input type="text" name="title" placeholder="title" class="bg-white grow border-b-2 text-center outline-0 p-4">
            <input type="hidden" id="color" name="color" value="bg-red-400">
            <div class="w-15 h-10 overflow-y-scroll overflow-x-hidden border-2 border-white">
                <div onclick="setColor('bg-red-400')" class="bg-red-400 w-10 h-10"></div>
                <div onclick="setColor('bg-green-400')" class="bg-green-400 w-10 h-10"></div>
                <div onclick="setColor('bg-blue-400')" class="bg-blue-400 w-10 h-10"></div>
                <div onclick="setColor('bg-purple-400')" class="bg-purple-400 w-10 h-10"></div>
                <div onclick="setColor('bg-indigo-400')" class="bg-indigo-400 w-10 h-10"></div>
                <div onclick="setColor('bg-amber-400')" class="bg-amber-400 w-10 h-10"></div>
            </div>
        </div>
        <div id="note-book" class="p-4">
            @for ($i=1;$i <=20;$i++)
                <input type="text" name="input{{$i}}" class="pt-2 outline-0 border-b block w-full">
                @endfor
        </div>
        <button class="w-full bg-orange-500 text-white font-bold p-3">Save</button>
        <script>
            var inputs = document.querySelectorAll('#note-book input');

            inputs.forEach((input, index) => {
                input.addEventListener('keydown', function(e) {
                    var x = e.charCode || e.keyCode;
                    if (x == 13) {
                        e.preventDefault()
                        if (index + 1 < inputs.length)
                            inputs[index + 1].focus();
                    }
                });
            });

            function setColor(color) {
                document.getElementById('color').value = color;
                removeColors();
                document.getElementById('book').classList.add(color)
            }

            function removeColors() {
                let colors = ['bg-red-400', 'bg-green-400', 'bg-blue-400', 'bg-indigo-400', 'bg-amber-400', 'bg-purple-400'];
                colors.forEach(color => {
                    document.getElementById('book').classList.remove(color);
                });
            }
        </script>
    </form>
</x-layouts.app>