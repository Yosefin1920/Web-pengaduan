@extends('layouts.pengaduan')

@section('title', 'Tentang | Lapor Purworejo')
@section('content')

    <div class="min-h-screen flex flex-col justify-center items-center text-center">
        <h1 class="text-4xl font-extrabold text-white mb-4">Tentang <span class="text-secondary">Lapor Purworejo.</span></h1>
        <p class="text-lg text-white">Lapor Purworejo merupakan media resmi milik KOMINFO Purworejo</p>
        <p class="text-lg text-white">guna mewadahi ruang pengaduan di publik langsung </p>
        <p class="text-lg text-white">kepada instansi pemerintahan </p>
        <p class="text-2xl text-white mt-4 mb-8 flex items-center gap-2">
            <i class="fa-regular fa-envelope text-5xl"></i>
            <a href="mailto:dinkominfo@purworejokab.go.id" class="underline">dinkominfo@purworejokab.go.id</a>
        </p>
        <a href="{{ Auth::check() ? route('pengaduan.pengaduan') : route('login') }}"
            class="bg-white text-primary font-semibold px-6 py-3 rounded-full hover:bg-opacity-80 transition-colors">
            Buat Pengaduan &gt;
        </a>
    </div>

@endsection
