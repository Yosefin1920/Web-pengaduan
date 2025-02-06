@extends('layouts.profile')

@section('title', 'Ubah Password | Lapor Purworejo')

@section('content')

    <div class="mt-6">
        <form action="{{ route('password.update') }}" method="POST">
            @csrf
            <div>
                <label for="current_password" class="block text-primary font-semibold">Password Lama</label>
                <input class="w-full bg-blue-300 text-gray-900 px-4 py-2 rounded-full" type="password" id="current_password"
                    name="current_password" required>
                @error('current_password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block text-primary font-semibold" for="new_password">Password Baru</label>
                <input class="w-full bg-blue-300 text-gray-900 px-4 py-2 rounded-full" type="password" id="new_password"
                    name="new_password" required>
                @error('new_password')
                    <div class="text-red-500">{{ $message }}</div>
                @enderror
            </div>
            <div>
                <label class="block text-primary font-semibold" for="new_password_confirmation">Konfirmasi Password
                    Baru</label>
                <input class="w-full bg-blue-300 text-gray-900 px-4 py-2 rounded-full" type="password"
                    id="new_password_confirmation" name="new_password_confirmation" required>
            </div>
            <div>
                <button type="submit"
                    class="w-full bg-primary text-white hover:bg-white hover:text-primary hover:border-black border-2 border-primary transition-colors px-4 py-2 rounded-full font-semibold mt-4">
                    Ubah Password
                </button>
            </div>
        </form>
    </div>



@endsection
