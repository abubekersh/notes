<x-layouts.app>
    <x-slot:title>Reset Password</x-slot:title>
    <section class="md:w-1/2 w-[90%] m-auto border mb-25 border-orange-500 my-10 rounded p-10 ">
        <h2 class="text-center text-2xl font-bold capitalize">Reset your password</h2>
        <form action="/reset-password" method="post" class="flex flex-col gap-2">
            @csrf
            <input type="hidden" name="token" value="{{$token}}">
            <label for="email">Email</label>
            <input type="email" name="email" value="{{old('email')}}" id="email" autocomplete="false" class="p-2 border border-orange-500 rounded outline-lime-300 ">
            @error('email')
            <p class="text-xs text-red-500">{{$message}}</p>
            @enderror
            <label for="password">Password</label>
            <input type="password" name="password" id="password" class="p-2 border border-orange-500 rounded outline-lime-300 ">
            @error('password')
            <p class="text-xs text-red-500">{{$message}}</p>
            @enderror
            <label for="password_confirmation">Confirm Password</label>
            <input type="password" name="password_confirmation" id="password_confirmation" class="p-2 border border-orange-500 rounded outline-lime-300 ">
            <a href="/" class="text-xs text-orange-500">Back to home</a>
            <button class=" rounded bg-orange-500 p-2 text-white mt-5">Reset Password</button>
        </form>
    </section>
</x-layouts.app>