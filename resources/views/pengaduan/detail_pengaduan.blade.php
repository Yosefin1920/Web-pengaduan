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

<body>
    <nav class="fixed w-full top-0 left-0 z-50" style="background-image: url('{{ asset('img/bg.png') }}');">
        <div class="max-w-screen-xl mx-auto px-4 py-8 flex items-center justify-between">
            <a href="{{ route('pengaduan.home') }}" class="flex items-center gap-2">
                <img src="{{ asset('img/logo.png') }}" alt="Logo" class="h-10">
                <h3 class="text-white font-semibold">Lapor <br> Purworejo</h3>
            </a>
            <div class="hidden md:flex flex-grow justify-center gap-12">
                <div class="hidden md:flex flex-grow justify-center gap-12">
                    <a href="{{ route('pengaduan.home') }}"
                        class=" text-white hover:text-yellow-300 font-semibold 
        @if (request()->routeIs('pengaduan.home')) text-yellow-300 @endif">
                        Home
                    </a>
                    <a href="{{ route('pengaduan.pengaduan') }}"
                        class=" text-white hover:text-yellow-300 font-semibold 
        @if (request()->routeIs('pengaduan.pengaduan')) text-yellow-300 @endif">
                        Pengaduan
                    </a>
                    <a href="{{ route('pengaduan.tentang') }}"
                        class=" text-white hover:text-yellow-300 font-semibold 
        @if (request()->routeIs('pengaduan.tentang')) text-yellow-300 @endif">
                        Tentang
                    </a>
                </div>
            </div>
            <a href="{{ route('profile') }}" class="flex items-center text-white justify-center gap-2">
                @if (Auth::check())
                    <span class=" font-semibold hover:text-opacity-80 transition-colors">
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

    <div class="container max-w-2xl mx-auto p-6 mt-32 flex items-center justify-center">
        <div class="p-6">
            <div>
                <img src="{{ asset('img/bg-purworejo.png') }}" alt="">
                <div class="p-4 overflow-hidden">
                    <h5 class="text-xl font-bold text-gray-900">{{ $pengaduan->judul_aduan }}</h5>
                    <p class="mt-2 text-gray-700">
                        {{ $pengaduan->deskripsi }}
                    </p>
                    <div class="flex justify-between items-center mt-4 text-sm text-gray-500">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-user"></i>
                            <span class="font-medium">{{ $pengaduan->tampilkan_nama }}</span>
                        </div>
                        <a href="{{ route('detail.pengaduan', ['id' => $pengaduan->id]) }}"
                            class="flex items-center space-x-2">
                            <i class="fas fa-comment-alt text-gray-500"></i>
                            <span>Komentar ({{ $komentarCount }})</span>
                        </a>
                        <a href="#" class="flex items-center space-x-2" id="like-button"
                            data-id="{{ $pengaduan->id }}">
                            <i class="fas fa-thumbs-up text-gray-500"></i>
                            <span id="like-count">Dukungan ({{ $likesCount }})</span>
                        </a>
                    </div>
                </div>
            </div>

            <div class="mt-6">
                <h3 class="text-lg font-bold">Komentar</h3>
                @foreach ($komentar as $kom)
                    <div class="mb-4 p-4 bg-gray-100 border rounded-lg">
                        <p><strong>{{ $kom->is_anonymous ? 'Anonim' : $kom->user->nama }}</strong>:
                            {{ $kom->isi_komentar }}</p>
                        <span class="text-sm text-gray-500">{{ $kom->created_at->diffForHumans() }}</span>
                    </div>
                @endforeach

                @auth
                    <form action="{{ route('pengaduan.storeKomentar', ['id' => $pengaduan->id]) }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <div class="flex items-center space-x-4">
                                <div class="flex items-center">
                                    <input type="radio" id="public" name="visibility" value="public" class="mr-2"
                                        checked>
                                    <label for="public">Publik ({{ Auth::user()->nama }})</label>
                                </div>
                                <div class="flex items-center">
                                    <input type="radio" id="anonymous" name="visibility" value="anonymous" class="mr-2">
                                    <label for="anonymous">Anonim</label>
                                </div>
                            </div>
                        </div>
                        <textarea name="isi_komentar" rows="4" class="w-full p-2 border rounded-lg" required></textarea>
                        <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg mt-2">Kirim
                            Komentar</button>
                    </form>
                @else
                    <div class="text-center p-4 bg-gray-50 rounded-lg">
                        <p class="mb-2">Silakan login terlebih dahulu untuk memberikan komentar</p>
                        <a href="{{ route('login') }}"
                            class="inline-block bg-blue-600 text-white px-4 py-2 rounded-lg">Login</a>
                    </div>
                @endauth
            </div>
            <div class="mt-6">
                <a href="{{ route('pengaduan.pengaduan') }}"
                    class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg transition">
                    Kembali
                </a>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('like-button').addEventListener('click', function(e) {
            e.preventDefault();

            const pengaduanId = this.getAttribute('data-id');

            fetch(`/pengaduan/${pengaduanId}/like`, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                })
                .then(response => response.json())
                .then(data => {
                    document.getElementById('like-count').textContent = data.likesCount;
                });
        });
    </script>

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
                confirmButtonText: 'Ya, Kirim!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('pengaduanForm').submit();
                }
            });
        });
    </script>
</body>



</html>
