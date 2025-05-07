@extends('layouts.app')
@section('title', 'Kelola Hewan Adopsi')
@section('content')
    <h1 class="text-2xl font-bold mb-6">Daftar Hewan</h1>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @foreach($hewan as $item)
        <div class="bg-white rounded-lg shadow-md overflow-hidden relative">
            <img src="{{ asset($item['foto']) }}" alt="{{ $item['nama'] }}" class="w-full h-48 object-cover">
            <div class="p-4 relative">
                <img src="{{ asset('images/sunting_biru.png') }}" alt="Edit" class="w-9 h-9 absolute top-8 right-4 cursor-pointer">
                <h2 class="text-lg font-semibold">{{ $item['nama'] }}</h2>
                <p class="text-sm text-gray-600">{{ $item['jenis'] }}</p>
                <p class="text-sm text-gray-600">{{ $item['umur'] }}</p>
            </div>
        </div>
        @endforeach

        <div class="flex items-center justify-center p-6">
        <img src="{{ asset('images/tambah_hijau.png') }}" alt="Tambah" class="w-20 h-20">
        </div>

    </div>
@endsection
