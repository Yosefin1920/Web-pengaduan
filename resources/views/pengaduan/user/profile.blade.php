@extends('layouts.profile')

@section('title', 'Profile | Lapor Purworejo')

@section('content')

    <h1 class="text-2xl font-bold text-primary">Hello, {{ Auth::user()->nama }} It's your profil!</h1>
    <div class="mt-6">
        <div class="flex items-center justify-center mb-6 relative">
            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-primary">
                @if (Auth::user()->profile_picture)
                    <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}" alt="Foto Profil"
                        class="w-full h-full object-cover">
                @else
                    <img src="{{ asset('img/default-user.jpg') }}" alt="Foto Profil" class="w-full h-full object-cover">
                @endif
            </div>
            <button
                class="absolute bottom-2 right-2 bg-white text-primary p-2 rounded-full shadow-md hover:bg-primary hover:text-white transition duration-200"
                onclick="document.getElementById('uploadFoto').click()">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M15.232 5.232l3.536 3.536M9 11l3.536 3.536M4 16v4h4l12-12a2 2 0 00-2.828-2.828L4 16z" />
                </svg>
            </button>
            <form action="{{ route('upload.profile.picture') }}" method="POST" enctype="multipart/form-data"
                id="uploadForm">
                @csrf
                <input type="file" name="profile_picture" id="uploadFoto" class="hidden"
                    onchange="document.getElementById('uploadForm').submit()">
            </form>
        </div>
        <form action="{{ route('profile.update') }}" method="POST" class="grid grid-cols-3 gap-4 ">
            @csrf
            <div>
                <label class="block text-primary font-semibold">Email</label>
                <input type="email" name="email" value="{{ old('email', $user->email) }}"
                    class="w-full bg-blue-300 text-white px-4 py-2 rounded-full">
            </div>
            <div>
                <label class="block text-primary font-semibold">Nama Lengkap</label>
                <input type="text" readonly name="nama" value="{{ old('nama', $user->nama) }}"
                    class="w-full bg-blue-300 text-white px-4 py-2 rounded-full">
            </div>
            <div>
                <label class="block text-primary font-semibold">Jenis Kelamin</label>
                <div class="flex flex-col">
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenis_kelamin" value="laki-laki" readonly
                            {{ old('jenis_kelamin', $user->jenis_kelamin) == 'laki-laki' ? 'checked' : '' }}
                            class="form-radio text-blue-600">
                        <span class="ml-2">Laki-laki</span>
                    </label>
                    <label class="inline-flex items-center">
                        <input type="radio" name="jenis_kelamin" value="perempuan" readonly
                            {{ old('jenis_kelamin', $user->jenis_kelamin) == 'perempuan' ? 'checked' : '' }}
                            class="form-radio text-blue-600">
                        <span class="ml-2">Perempuan</span>
                    </label>
                </div>
            </div>
            <div>
                <label class="block text-primary font-semibold">NIK</label>
                <input type="text" name="nik" value="{{ old('nik', $user->nik) }}"
                    class="w-full bg-blue-300 text-white px-4 py-2 rounded-full" readonly>
            </div>
            <div>
                <label class="block text-primary font-semibold">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" value="{{ old('tempat_lahir', $user->tempat_lahir) }}"
                    class="w-full bg-blue-300 text-white px-4 py-2 rounded-full" readonly>
            </div>
            <div>
                <label class="block text-primary font-semibold">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir"
                    value="{{ old('tanggal_lahir', \Carbon\Carbon::parse($user->tanggal_lahir)->format('Y-m-d')) }}"
                    class="w-full bg-blue-300 text-white px-4 py-2 rounded-full" readonly>
            </div>
            <div>
                <label class="block text-primary font-semibold">Agama</label>
                <input type="text" name="agama" value="{{ old('agama', $user->agama) }}"
                    class="w-full bg-blue-300 text-white px-4 py-2 rounded-full" readonly>
            </div>
            <div>
                <label class="block text-primary font-semibold">Status</label>
                <input type="text" name="status" value="{{ old('status', $user->status) }}"
                    class="w-full bg-blue-300 text-white px-4 py-2 rounded-full" readonly>
            </div>
            <div>
                <label class="block text-primary font-semibold">Alamat</label>
                <textarea name="alamat" readonly class="w-full bg-blue-300 text-white px-4 py-2 rounded-lg">{{ old('alamat', $user->alamat) }}</textarea>
            </div>
            <div>
                <label class="block text-primary font-semibold">Kode Pos</label>
                <input type="text" readonly name="kode_pos" value="{{ old('kode_pos', $user->kode_pos) }}"
                    class="w-full bg-blue-300 text-white px-4 py-2 rounded-full">
            </div>
            <div>
                <label class="block text-primary font-semibold">Provinsi</label>
                <input type="text" readonly name="provinsi" value="{{ old('provinsi', $user->provinsi) }}"
                    class="w-full bg-blue-300 text-white px-4 py-2 rounded-full">
            </div>
            <div>
                <label class="block text-primary font-semibold">Kabupaten/Kota</label>
                <input type="text" readonly name="kota" value="{{ old('kota', $user->kota) }}"
                    class="w-full bg-blue-300 text-white px-4 py-2 rounded-full">
            </div>
            <div>
                <label class="block text-primary font-semibold">Kecamatan</label>
                <input type="text" readonly name="kecamatan" value="{{ old('kecamatan', $user->kecamatan) }}"
                    class="w-full bg-blue-300 text-white px-4 py-2 rounded-full">
            </div>
            <div>
                <label class="block text-primary font-semibold">Kelurahan</label>
                <input type="text" readonly name="kelurahan" value="{{ old('kelurahan', $user->kelurahan) }}"
                    class="w-full bg-blue-300 text-white px-4 py-2 rounded-full">
            </div>
            <div class="col-span-3">
                <button type="submit"
                    class="w-full bg-primary text-white hover:bg-white hover:text-primary hover:border-black border-2 border-primary transition-colors px-4 py-2 rounded-full font-semibold">
                    Simpan Perubahan
                </button>
            </div>
        </form>

    </div>

@endsection
