<x-layouts.app>
    <x-slot:title>
        Admin Dashboard
    </x-slot:title>
    <section class="flex gap-8 p-10 md:flex-row md:flex-wrap flex-col mb-20">
        @foreach ($users as $user )
        <div class="bg-red-400 md:min-w-96 h-52 flex flex-col grow text-white p-4 rounded">
            <p class="capitalize font-extrabold">{{$user->name}}</p>
            <h2 class="text-center p-3 font-extrabold">Notes</h2>
            <ul class="mx-4 flex flex-col gap-4">
                @foreach ($notes as $note )
                @if ($note->user_id == $user->id)
                <li class="list-disc capitalize text-sm">{{$note->title}} <a href="/notes/{{$note->id}}/note" class="bg-white p-1 text-xs rounded text-black">Show</a></li>
                @endif
                @endforeach
            </ul>
            <form action="/user/{{$user->id}}" id="delete-form" method="post" class="mt-auto">
                @csrf
                @method('delete')
                <button type="button" class="bg-white p-2 text-xs font-bold rounded text-red-500" onclick="deleteUser()">Delete User</button>
            </form>
        </div>
        @endforeach
        <script>
            function deleteUser() {
                let x = confirm('Are you sure you want to delete this?');
                if (x == true) {
                    document.getElementById('delete-form').submit();
                } else {
                    console.log('declined');
                }
            }
        </script>
    </section>
</x-layouts.app>