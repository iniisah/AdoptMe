@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="max-w-7xl mx-auto px-4 py-8">
    <h1 class="text-4xl font-bold text-gray-800 mb-6">Selamat datang, {{ $username }}!</h1>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <div class="bg-gradient-to-r from-blue-500 to-blue-700 p-6 rounded-lg shadow">
            <p class="text-sm text-white">Total Hewan</p>
            <p class="text-2xl font-bold text-white">8</p>
        </div>
        <div class="bg-gradient-to-r from-green-500 to-green-700 p-6 rounded-lg shadow">
            <p class="text-sm text-white">Sudah Diadopsi</p>
            <p class="text-2xl font-bold text-white">3</p>
        </div>
        <div class="bg-gradient-to-r from-yellow-400 to-yellow-600 p-6 rounded-lg shadow">
            <p class="text-sm text-white">Pengguna Terdaftar</p>
            <p class="text-2xl font-bold text-white">12</p>
        </div>
        <div class="bg-gradient-to-r from-red-500 to-red-700 p-6 rounded-lg shadow">
            <p class="text-sm text-white">Permintaan Pending</p>
            <p class="text-2xl font-bold text-white">2</p>
        </div>
    </div>

    <div class="bg-white rounded-lg shadow p-6 mb-8">
        <h2 class="text-xl font-semibold text-gray-700 mb-4">Permintaan Adopsi Terbaru</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full table-auto text-sm">
                <thead>
                    <tr class="bg-green-600 text-white text-left">
                        <th class="px-4 py-2">Nama Pengguna</th>
                        <th class="px-4 py-2">Hewan</th>
                        <th class="px-4 py-2">Status</th>
                        <th class="px-4 py-2">Tanggal</th>
                        <th class="px-4 py-2">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-b">
                        <td class="px-4 py-2">Alya</td>
                        <td class="px-4 py-2">Ogi</td>
                        <td class="px-4 py-2 text-yellow-600">Pending</td>
                        <td class="px-4 py-2">2025-05-06</td>
                        <td class="px-4 py-2"><a href="#" class="text-blue-500 hover:underline">Lihat</a></td>
                    </tr>
                    <tr>
                        <td class="px-4 py-2">Budi</td>
                        <td class="px-4 py-2">Lola</td>
                        <td class="px-4 py-2 text-green-600">Disetujui</td>
                        <td class="px-4 py-2">2025-05-05</td>
                        <td class="px-4 py-2"><a href="#" class="text-blue-500 hover:underline">Lihat</a></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="bg-blue-900 rounded-lg shadow p-6">
        <h2 class="text-xl font-semibold text-white mb-4">Hewan Terbaru</h2>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @php
                $hewanTerbaru = [
                    ['foto' => 'images/rabbit1.jpg', 'nama' => 'Tupi', 'jenis' => 'Lionhead Rabbit'],
                    ['foto' => 'images/dog3.jpg', 'nama' => 'Finn', 'jenis' => 'Labrador Retriever Dog'],
                    ['foto' => 'images/cat2.jpg', 'nama' => 'Mbuy', 'jenis' => 'Domestic Shorthair Cat'],
                ];
            @endphp

            @foreach ($hewanTerbaru as $h)
                <div class="bg-white border rounded-lg overflow-hidden shadow">
                    <img src="{{ asset($h['foto']) }}" class="w-full h-40 object-cover" alt="{{ $h['nama'] }}">
                    <div class="p-4">
                        <h3 class="font-semibold text-gray-800">{{ $h['nama'] }}</h3>
                        <p class="text-sm text-gray-600">{{ $h['jenis'] }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection
