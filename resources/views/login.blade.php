@extends('layouts.app')
@section('title', 'Adopt Me')
@section('content')
<div class="relative w-full min-h-screen m-0 p-0 overflow-hidden">
    <img src="images/log_back.png" alt="Background Login"
        class="absolute w-full h-full object-cover" />

    <div class="absolute inset-0 flex items-center justify-center">
        <div class="max-w-md w-full space-y-8 bg-white p-10 rounded-2xl shadow-lg z-10">
            <div>
                <h2 class="text-center text-3xl font-extrabold text-gray-900">
                    Login ke Akun Anda
                </h2>
            </div>
            <form class="mt-8 space-y-6" action="{{ route('doLogin') }}" method="POST">
                @csrf
                <div class="rounded-md shadow-sm space-y-4">
                    <div>
                        <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                        <input id="username" name="username" type="text" required
                            class="appearance-none rounded-lg block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Masukkan username">
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" name="password" type="password" required
                            class="appearance-none rounded-lg block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
                            placeholder="Masukkan password">
                    </div>
                </div>

                @if(session('error'))
                    <div class="text-red-600 text-sm mt-2">
                        {{ session('error') }}
                    </div>
                @endif

                <div>
                    <button type="submit"
                        class="w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-lg text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        Masuk
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
