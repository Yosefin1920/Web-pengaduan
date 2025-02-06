<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    {{-- Favicon --}}
    <link rel="icon" type="image/x-icon" href="{{ asset('img/logo.png') }}">

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    {{-- Icon --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
        integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- Sweet alert --}}
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css" rel="stylesheet">


    <title>Register | Lapor Purworejo</title>

    @vite('resources/css/app.css')

</head>

<body class="font-poppins">
    <div class="flex items-center justify-center px-8">
        <div class="w-full p-3">
            <div class="flex items-center justify-start mb-2">
                <a href="{{ route('pengaduan.home') }}" class="flex items-center gap-2">
                    <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-12">
                    <h3 class="text-gray-800 font-bold text-sm leading-tight text-center">
                        Lapor <br> Purworejo
                    </h3>
                </a>
            </div>
            <h1 class="text-4xl font-bold text-gray-800 mb-1 text-center">Create Your Account</h1>
            <p class="text-gray-600 text-xs text-center mb-6">Register your account now!</p>
            <form action="{{ route('register-process') }}" method="POST" class="space-y-6" id="registerForm">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}"
                            placeholder="Enter Your Email"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('email')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="kode_pos" class="block text-sm font-medium text-gray-700">Kode Pos</label>
                        <input type="text" id="kode_pos" name="kode_pos" value="{{ old('kode_pos') }}"
                            placeholder="Enter Your Kode Pos"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('kode_pos')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="nik" class="block text-sm font-medium text-gray-700">NIK</label>
                        <input type="number" id="nik" name="nik" value="{{ old('nik') }}"
                            placeholder="Enter Your NIK"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('nik')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="provinsi" class="block text-sm font-medium text-gray-700">Provinsi</label>
                        <input type="text" id="provinsi" name="provinsi" value="{{ old('provinsi') }}"
                            placeholder="Enter Your Province"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('provinsi')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama" value="{{ old('nama') }}"
                            placeholder="Enter Your Full Name"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('nama')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="kota" class="block text-sm font-medium text-gray-700">Kabupaten/Kota</label>
                        <input type="text" id="kota" name="kota" value="{{ old('kota') }}"
                            placeholder="Enter Your City"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('kota')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="no_telp" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="number" id="no_telp" name="no_telp" value="{{ old('no_telp') }}"
                            placeholder="Enter Your Phone Number"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('no_telp')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="kecamatan" class="block text-sm font-medium text-gray-700">Kecamatan</label>
                        <input type="text" id="kecamatan" name="kecamatan" value="{{ old('kecamatan') }}"
                            placeholder="Enter Your Sub-District"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('kecamatan')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="tempat_lahir" class="block text-sm font-medium text-gray-700">Tempat Lahir</label>
                        <input type="text" id="tempat_lahir" name="tempat_lahir"
                            value="{{ old('tempat_lahir') }}" placeholder="Enter Your Birthplace"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('tempat_lahir')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="kelurahan" class="block text-sm font-medium text-gray-700">Kelurahan</label>
                        <input type="text" id="kelurahan" name="kelurahan" value="{{ old('kelurahan') }}"
                            placeholder="Enter Your Village"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('kelurahan')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal
                            Lahir</label>
                        <input type="date" id="tanggal_lahir" name="tanggal_lahir"
                            value="{{ old('tanggal_lahir') }}"
                            placeholder="Enter Your Date of Birth (ex: 02/12/2001)"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('tanggal_lahir')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="agama" class="block text-sm font-medium text-gray-700">Agama</label>
                        <input type="text" id="agama" name="agama" value="{{ old('agama') }}"
                            placeholder="Enter Your Religion"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('agama')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div>
                        <label for="jenis_kelamin" class="block text-sm font-medium text-gray-700">Jenis
                            Kelamin</label>
                        <div class="mt-2 flex gap-y-2 flex-col">
                            <label class="flex items-center">
                                <input type="radio" id="laki_laki" name="jenis_kelamin" value="laki-laki"
                                    {{ old('jenis_kelamin') == 'laki-laki' ? 'checked' : '' }}
                                    class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                                <span class="ml-2 text-sm text-gray-700">Laki-laki</span>
                            </label>
                            <label class="flex items-center">
                                <input type="radio" id="perempuan" name="jenis_kelamin" value="perempuan"
                                    {{ old('jenis_kelamin') == 'perempuan' ? 'checked' : '' }}
                                    class="w-4 h-4 text-primary border-gray-300 focus:ring-primary">
                                <span class="ml-2 text-sm text-gray-700">Perempuan</span>
                            </label>
                        </div>
                        @error('jenis_kelamin')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="status" class="block text-sm font-medium text-gray-700">Status Kawin</label>
                        <input type="text" id="status" name="status" value="{{ old('status') }}"
                            placeholder="Enter Your Status"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('status')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row-span-2">
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea id="alamat" name="alamat" placeholder="Enter Your Address"
                            class="w-full mt-1 p-4 border rounded-xl border-gray-400 shadow-sm focus:ring-primary focus:border-primary resize-none"
                            rows="4" required>{{ old('alamat') }}</textarea>
                        @error('alamat')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Your Password"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                        @error('password')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="block text-sm font-medium text-gray-700">Confirm
                            Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation"
                            placeholder="Confirm Your Password"
                            class="w-full mt-1 p-4 border rounded-full border-gray-400 shadow-sm focus:ring-primary focus:border-primary"
                            required>
                    </div>
                </div>

                <button type="submit" id="submitBtn"
                    class="w-full max-w-2xl mx-auto flex justify-center items-center bg-primary text-white font-semibold py-2 rounded-full hover:bg-opacity-80 transition-colors">
                    Register
                </button>
            </form>
            <p class="text-center mt-6 text-sm text-gray-600">
                Already have an account? <a href="{{ route('login') }}"
                    class="text-secondary font-semibold hover:underline">Login
                    now</a>
            </p>
            <p class="text-center mt-4 text-xs text-gray-500">
                By Click "Register" you agree to with Our <a href="#"
                    class="text-primary hover:underline">Privacy
                    Policy</a> &amp; <a href="#" class="text-primary hover:underline">Terms of Service</a>.
            </p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @if (session('success'))
        <script>
            Swal.fire({
                title: 'Sukses!',
                text: "{{ session('success') }}",
                icon: 'success',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('error'))
        <script>
            Swal.fire({
                title: 'Error!',
                text: "{{ session('error') }}",
                icon: 'error',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <script>
        document.getElementById('submitBtn').addEventListener('click', function(e) {
            e.preventDefault();

            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: 'Pastikan data yang Anda masukkan sudah benar.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Daftar!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('registerForm').submit();
                }
            });
        });
    </script>
</body>



</html>
