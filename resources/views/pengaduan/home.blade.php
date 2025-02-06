@extends('layouts.pengaduan')

@section('title', 'Home - Lapor Purworejo')
@section('content')

    <div class="max-w-screen-xl mx-auto p-4 h-screen flex items-center justify-center">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="flex justify-center items-center">
                <img src="{{ asset('img/hero.png') }}" alt="Hero Image" class="w-full h-auto object-cover rounded-lg">
            </div>
            <div class="flex flex-col justify-center items-start space-y-4">
                <h1 class="text-4xl font-extrabold text-white">Layanan Pengaduan</h1>
                <h1 class="text-4xl font-extrabold text-white">Online Purworejo</h1>
                <p class="text-lg text-white">Sampaikan Laporan Anda dengan Mudah dan Dapatkan Solusi</p>
                <a href="{{ Auth::check() ? route('pengaduan.pengaduan') : route('login') }}"
                    class="bg-white text-primary font-semibold px-6 py-3 rounded-full hover:bg-opacity-80 transition-colors">
                    Buat Pengaduan &gt;
                </a>
            </div>
        </div>
    </div>

@endsection
