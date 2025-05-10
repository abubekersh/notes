<x-layouts.app>
    <x-slot:title>Forgot password</x-slot:title>
    <section class="md:w-1/2 w-[90%] m-auto border mb-25 border-orange-500 my-10 rounded p-10 ">
        <h2 class="text-center text-2xl font-bold capitalize pb-15">Forgot password</h2>
        <form action="/forgot-password" method="post" class="flex flex-col gap-2">
            @csrf
            <label for="email">Email</label>
            <input type="email" name="email" value="{{old('email')}}" id="email" autocomplete="false" class="p-2 border border-orange-500 rounded outline-lime-300 ">
            @error('email')
            <p class="text-xs text-red-500">{{$message}}</p>
            @enderror
            @if (session('email'))
            <p class="text-xs text-green-400">{{session('email')}}</p>
            @endif
            <div class="p-2 flex justify-between text-left text-orange-500 gap-2">
                <a href="/register" class="text-xs text-orange-500">Do not have an account?</a>
            </div>
            <button class=" rounded bg-orange-500 p-2 text-white mt-5">Send Reset Link</button>
        </form>
    </section>
</x-layouts.app>