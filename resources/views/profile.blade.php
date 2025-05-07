@extends('layouts.app')

@section('content')
<div class="max-w-xl mx-auto py-10 px-4">
    <a href="{{ url()->previous() }}" class="absolute top-0 left-0 mt-2 ml-2 z-50">

        <img src="{{ asset('images/back.png') }}" alt="Kembali" class="w-9 h-9 hover:opacity-80 transition">
    </a>

    <h1 class="text-3xl font-bold text-center text-gray-800 mb-8">Profil Pengguna</h1>

    <div class="bg-white shadow-lg rounded-xl p-6 space-y-6">
        <div class="space-y-3 text-sm sm:text-base text-gray-700">
            <div class="flex justify-between">
                <span class="font-semibold">Nama Lengkap:</span>
                <span>{{ $name }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold">Username:</span>
                <span>{{ $username }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold">No Telepon:</span>
                <span>{{ $phone }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold">Email:</span>
                <span>{{ $email }}</span>
            </div>
            <div class="flex justify-between">
                <span class="font-semibold">Password:</span>
                <span>********</span>
            </div>
        </div>

        <div class="flex justify-center gap-4">
            <button onclick="openEditModal()" class="px-5 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition">Edit Profil</button>
            <button onclick="openLogoutModal()" class="px-5 py-2 bg-red-500 text-white rounded-lg hover:bg-red-600 transition">Logout</button>
        </div>
    </div>
</div>

<!-- Modal Edit Profil -->
<div id="editModal" class="fixed inset-0 bg-black/50 hidden items-center justify-center z-50">
    <div class="bg-white rounded-2xl shadow-xl p-6 w-full max-w-md animate-fadeIn">
        <h2 class="text-xl font-semibold mb-4 text-center">Edit Profil</h2>
        <form method="POST" action="{{ route('profile.update') }}">
            @csrf
            @method('PUT')
            <div class="space-y-4">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="name" value="{{ $name }}" class="w-full border px-3 py-2 rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">No Telepon</label>
                    <input type="text" name="phone" value="{{ $phone }}" class="w-full border px-3 py-2 rounded-lg">
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" name="email" value="{{ $email }}" class="w-full border px-3 py-2 rounded-lg">
                </div>
            </div>
            <div class="mt-6 flex justify-between">
                <button type="button" onclick="closeEditModal()" class="px-4 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Batal</button>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600">Simpan</button>
            </div>
        </form>
    </div>
</div>

<!-- Modal Logout -->
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
