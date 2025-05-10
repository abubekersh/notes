<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link rel="shortcut icon" href="/images/note.png" type="image/x-icon">
    @vite('resources/css/app.css')
</head>

<body>
    <header class="flex bg-orange-500 text-white items-center p-4 justify-between h-20">
        <div>
            <img src="/images/note.png" class="w-9" alt="applicaation logo">
        </div>
        <a href="/">
            <h1 class="text-xl font-bold">Notes</h1>
        </a>
        <div class="flex gap-2">
            @guest
            <a class=" text-sm bg-white p-2 text-orange-500 font-bold rounded" href="/login">Login</a>
            @endguest
            @auth
            <form action="/logout" method="post">
                @csrf
                <button class=" text-sm bg-white p-2 text-orange-500 font-bold rounded">Logout</button>
            </form>
            @endauth
        </div>
    </header>
    {{$slot}}
    <footer class=" text-center bg-orange-500/90 grid md:grid-cols-3 grid-cols-1 gap-10  px-10 py-5 pt-10 text-sm text-white">
        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo temporibus fugiat sunt cumque inventore fugit sequi, provident dolores sint ea magni quibusdam non! Natus suscipit ipsa doloribus consequatur alias ipsum?</p>
        <ul>
            <li>something cool</li>
            <li>something cool</li>
            <li>something cool</li>
            <li>something cool</li>
        </ul>
        <ul>
            <li>another thing</li>
            <li>another thing</li>
            <li>another thing</li>
        </ul>
        <div class="md:col-span-3">
            <p>Develpoed By Abubeker Shelemew</p>
            <p>May 2025&copy;</p>
        </div>
    </footer>
</body>

</html>