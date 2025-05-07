@extends('layouts.app')
@section('title', 'My Profile')

@section('content')
<div class="max-w-2xl mx-auto py-12 px-4 relative">

    {{-- Tombol kembali --}}
    <a href="{{ url()->previous() }}" class="fixed top-4 left-4 z-50">
        <img src="{{ asset('images/back.png') }}" alt="Kembali" class="w-9 h-9 hover:opacity-80 transition">
    </a>


    {{-- Judul --}}
    <h1 class="text-4xl font-bold text-center text-gray-800 mb-10">Profil Pengguna</h1>

    {{-- Kartu Profil --}}
    <div class="bg-white shadow-xl rounded-2xl px-8 py-10 space-y-8">
        {{-- Avatar --}}
        <div class="flex justify-center">
            <img src="{{ asset('images/profil.png') }}" 
                alt="Avatar" 
                class="w-24 h-24 rounded-full shadow-md object-cover">
        </div>


        {{-- Informasi Pengguna --}}
        <div class="space-y-4 text-gray-700 text-sm sm:text-base">
            @foreach([
                'Nama Lengkap' => $name,
                'Username' => $username,
                'No Telepon' => $phone,
                'Email' => $email,
                'Password' => '********'
            ] as $label => $value)
                <div class="flex justify-between border-b pb-2">
                    <span class="font-medium">{{ $label }}</span>
                    <span>{{ $value }}</span>
                </div>
            @endforeach
        </div>

        {{-- Tombol Aksi --}}
        <div class="flex justify-center gap-4">
            <button onclick="openEditModal()" class="px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Edit Profil</button>
            <button onclick="openLogoutModal()" class="px-5 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">Logout</button>
        </div>
    </div>
</div>

{{-- Modal Edit Profil --}}
<div id="editModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-md animate-fadeIn">
        <h2 class="text-xl font-semibold mb-4 text-center">Edit Profil</h2>
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                @foreach([
                    'name' => ['label' => 'Nama Lengkap', 'type' => 'text', 'value' => $name],
                    'phone' => ['label' => 'No Telepon', 'type' => 'text', 'value' => $phone],
                    'email' => ['label' => 'Email', 'type' => 'email', 'value' => $email],
                ] as $field => $props)
                    <div>
                        <label class="block text-sm font-medium text-gray-700">{{ $props['label'] }}</label>
                        <input type="{{ $props['type'] }}" name="{{ $field }}" value="{{ $props['value'] }}" class="w-full border px-3 py-2 rounded-lg focus:outline-none focus:ring focus:border-blue-300">
                    </div>
                @endforeach
            </div>
            <div class="mt-6 flex justify-between">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Simpan</button>
            </div>
        </form>
    </div>
</div>

{{-- Modal Logout --}}
<div id="logoutModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-xl p-6 w-96 text-center animate-fadeIn">
        <h2 class="text-xl font-semibold mb-4">Apakah anda yakin ingin keluar?</h2>
        <div class="flex justify-center space-x-4">
            <div class="flex-1">
                <button onclick="closeLogoutModal()" class="w-full px-4 py-2 rounded-xl bg-gray-200 hover:bg-gray-300 transition">Batal</button>
            </div>
            <form method="POST" action="{{ route('logout') }}" class="flex-1">
                @csrf
                <button type="submit" class="w-full px-4 py-2 rounded-xl bg-red-500 text-white hover:bg-red-600 transition">Ya</button>
            </form>
        </div>
    </div>
</div>
@endsection

{{-- Animasi fadeIn --}}
<style>
.animate-fadeIn {
    animation: fadeIn 0.2s ease-out;
}
@keyframes fadeIn {
    from {
        opacity: 0;
        transform: scale(0.95);
    }
    to {
        opacity: 1;
        transform: scale(1);
    }
}
</style>

{{-- Script Modal --}}
<script>
function openEditModal() {
    const modal = document.getElementById('editModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}
function closeEditModal() {
    const modal = document.getElementById('editModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
function openLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.classList.remove('hidden');
    modal.classList.add('flex');
}
function closeLogoutModal() {
    const modal = document.getElementById('logoutModal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}
</script>
