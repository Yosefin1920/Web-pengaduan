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

    <title>
        @yield('title', 'Lapor Purworejo')
    </title>

    @vite('resources/css/app.css')

</head>

<body class="font-poppins bg-cover bg-center" style="background-image: url('{{ asset('img/bg.png') }}')">
    <nav class="bg-transparent fixed w-full top-0 left-0 z-50">
        <div class="max-w-screen-xl mx-auto px-4 py-8 flex items-center justify-between">
            <a href="{{ route('pengaduan.home') }}" class="flex items-center gap-2">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-10">
                <h3 class="text-white font-semibold">Lapor <br> Purworejo</h3>
            </a>
            <div class="hidden md:flex flex-grow justify-center gap-12">
                <div class="hidden md:flex flex-grow justify-center gap-12">
                    <a href="{{ route('pengaduan.home') }}"
                        class="text-white hover:text-yellow-300 font-semibold 
        @if (request()->routeIs('pengaduan.home')) text-yellow-300 @endif">
                        Home
                    </a>
                    <a href="{{ route('pengaduan.pengaduan') }}"
                        class="text-white hover:text-yellow-300 font-semibold 
        @if (request()->routeIs('pengaduan.pengaduan')) text-yellow-300 @endif">
                        Pengaduan
                    </a>
                    <a href="{{ route('pengaduan.tentang') }}"
                        class="text-white hover:text-yellow-300 font-semibold 
        @if (request()->routeIs('pengaduan.tentang')) text-yellow-300 @endif">
                        Tentang
                    </a>
                </div>
            </div>
            <a href="{{ route('profile') }}" class="flex items-center gap-2">
                @if (Auth::check())
                    <span class="text-yellow-300 font-semibold hover:text-opacity-80 transition-colors">
                        Hello, {{ Auth::user()->nama }}
                    </span>
                    @if (Auth::user()->profile_picture)
                        <img src="{{ asset('storage/profile_pictures/' . Auth::user()->profile_picture) }}"
                            alt="Logo User" class="h-8 w-8 rounded-full">
                    @else
                        <img src="{{ asset('img/default-user.jpg') }}" alt="Logo User"
                            class="h-8 w-8 rounded-full border-yellow-300 border-2">
                    @endif
                @else
                    <a href="{{ route('login') }}"
                        class="bg-white text-primary hover:bg-opacity-80 font-semibold px-6 py-3 rounded-full hover:bg-primary-dark transition-colors">
                        Login
                    </a>
                @endif
            </a>
        </div>
    </nav>

    <div class="max-w-screen-xl mx-auto p-4 h-screen flex items-center justify-center ">
        <div class="flex w-full">
            <div class="w-1/3 bg-white text-primary p-4 rounded-l-lg">
                <ul class="space-y-4">
                    <li>
                        <a href="{{ route('profile') }}"
                            class="w-full px-4 py-3 font-bold block rounded-lg hover:bg-primary hover:text-white hover:border-primary transition-colors 
           {{ Route::currentRouteName() === 'profile' ? 'bg-primary text-white border-none' : 'border-2 border-gray-700' }}">
                            Profil
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.password') }}"
                            class="w-full px-4 py-3 font-bold block rounded-lg hover:bg-primary hover:text-white hover:border-primary transition-colors 
           {{ Route::currentRouteName() === 'profile.password' ? 'bg-primary text-white border-none' : 'border-2 border-gray-700' }}">
                            Ubah Password
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('profile.riwayat') }}"
                            class="w-full px-4 py-3 font-bold block rounded-lg hover:bg-primary hover:text-white hover:border-primary transition-colors 
           {{ Route::currentRouteName() === 'profile.riwayat' ? 'bg-primary text-white border-none' : 'border-2 border-gray-700' }}">
                            Riwayat Aduan
                        </a>
                    </li>
                    <li>
                        <a href="#" id="logoutBtn"
                            class="w-full px-4 py-3 font-bold block rounded-lg hover:bg-primary hover:text-white hover:border-primary transition-colors 
        {{ Route::currentRouteName() === 'logout' ? 'bg-primary text-white border-none' : 'border-2 border-gray-700' }}">
                            Logout
                        </a>
                    </li>
                </ul>
            </div>
            <div class="w-3/4 bg-blue-100 p-6 rounded-r-lg h-[400px] overflow-auto ">
                @yield('content')
            </div>
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
        document.getElementById('logoutBtn').addEventListener('click', function(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Anda akan keluar dari akun ini.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Logout!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "{{ route('logout') }}";
                }
            });
        });
    </script>
</body>



</html>
