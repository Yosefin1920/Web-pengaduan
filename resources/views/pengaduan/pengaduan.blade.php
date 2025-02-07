@extends('layouts.pengaduan')

@section('title', 'Pengaduan | Lapor Purworejo')
@section('content')


    <div class="w-full flex items-center justify-center font-poppins bg-cover bg-center h-screen"
        style="background-image: url('{{ asset('img/bg.png') }}')">
    </div>

    <div class="-mt-[540px] flex mx-auto justify-center mb-[300px]">
        @if (Auth::check())
                <div class="w-full max-w-xl mt-22 bg-gradient-to-tr from-primary to-secondary rounded-lg shadow-lg ">
                    <div class="flex justify-center items-center mb-6">
                        <a href="#"
                            class="text-white font-semibold step-indicator w-full rounded-t-lg bg-secondary border-2 p-4"
                            data-step="1">Langkah 1</a>
                        <a href="#" class="text-white font-semibold step-indicator w-full rounded-t-lg bg-red-400 p-4"
                            data-step="2">Langkah 2</a>
                        <a href="#" class="text-white font-semibold step-indicator w-full rounded-t-lg bg-red-400 p-4"
                            data-step="3">Langkah 3</a>
                    </div>
                    <div class="p-6">
                        <div id="step-1" class="step-content mb-6">
                            <h2 class="text-xl font-semibold text-white">Kategori</h2>
                            <select id="kategori" name="kategori"
                                class="w-full mt-2 px-4 py-2 border rounded-lg shadow-sm focus:ring-secondary focus:border-secondary">
                                <option value="">Pilih Kategori</option>
                                <option value="kesehatan">Kesehatan</option>
                                <option value="pendidikan">Pendidikan</option>
                                <option value="sosial">Sosial</option>
                                <option value="olahraga">Olahraga</option>
                                <option value="seni">Seni</option>
                            </select>
                            <button
                                class="mt-4 bg-white text-secondary px-6 py-3 text-sm font-semibold rounded-full hover:bg-opacity-80 transition-colors"
                                id="next-1">Selanjutnya</button>
                        </div>
                        <div id="step-2" class="step-content hidden mb-6">
                            <h2 class="text-xl font-semibold text-white">Lokasi</h2>
                            <input type="text" id="lokasi" name="lokasi" placeholder="Masukkan lokasi pengaduan"
                                class="w-full mt-2 px-4 py-2 border placeholder:text-sm placeholder:text-gray-500 rounded-lg shadow-sm focus:ring-secondary focus:border-secondary">
                            <button
                                class="mt-4 bg-white text-secondary font-semibold px-6 py-3 text-sm rounded-full hover:bg-opacity-80 transition-colors"
                                id="next-2">Selanjutnya</button>
                        </div>
                        <div id="step-3" class="step-content hidden mb-6">
                            <h2 class="text-xl font-semibold text-white">Form Pengaduan</h2>
                            <form action="{{ route('pengaduan.pengaduan-process') }}" method="POST" class="space-y-6"
                                id="pengaduanForm" enctype="multipart/form-data">
                                @csrf
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-x-6 gap-y-4">
                                    <input type="hidden" id="hidden-kategori" name="kategori">
                                    <input type="hidden" id="hidden-lokasi" name="lokasi">
                                    <div>
                                        <label for="nama_pelapor" class="block text-sm font-medium text-white">Nama
                                            Pelapor</label>
                                        <input type="text" id="nama_pelapor" name="nama_pelapor"
                                            placeholder="Masukkan nama anda"
                                            class="placeholder:text-sm placeholder:text-gray-500 w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring-secondary focus:border-secondary"
                                            required>
                                    </div>
                                    <div>
                                        <label for="no_telp" class="block text-sm font-medium text-white">Nomor
                                            Telepon/WhatsApp</label>
                                        <input type="number" id="no_telp" name="no_telp"
                                            placeholder="Masukkan nomor telepon/WhatsApp anda"
                                            class="placeholder:text-sm placeholder:text-gray-500 w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring-secondary focus:border-secondary"
                                            required>
                                    </div>
                                    <div>
                                        <label for="judul_aduan" class="block text-sm font-medium text-white">Judul
                                            Aduan</label>
                                        <input type="text" id="judul_aduan" name="judul_aduan"
                                            placeholder="Masukkan judul aduan anda"
                                            class="placeholder:text-sm placeholder:text-gray-500 w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring-secondary focus:border-secondary"
                                            required>
                                    </div>
                                    <div>
                                        <label for="tanggal" class="block text-sm font-medium text-white">Tanggal
                                            Kejadian</label>
                                        <input type="date" id="tanggal" name="tanggal"
                                            class="placeholder:text-sm placeholder:text-gray-500 w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring-secondary focus:border-secondary"
                                            required>
                                    </div>
                                    <div>
                                        <label for="deskripsi" class="block text-sm font-medium text-white">Deskripsi
                                            Aduan</label>
                                        <textarea id="deskripsi" name="deskripsi" placeholder="Masukkan deskripsi aduan anda"
                                            class="w-full mt-1 p-4 border placeholder:text-sm placeholder:text-gray-500 rounded-lg shadow-sm focus:ring-secondary focus:border-secondary resize-none"
                                            rows="4" required></textarea>
                                    </div>
                                    <div>
                                        <label for="saran" class="block text-sm font-medium text-white">Saran atau
                                            Masukan</label>
                                        <textarea id="saran" name="saran" placeholder="Masukkan saran atau masukan anda"
                                            class="w-full mt-1 p-4 border placeholder:text-sm placeholder:text-gray-500 rounded-lg shadow-sm focus:ring-secondary focus:border-secondary resize-none"
                                            rows="4" required></textarea>
                                    </div>
                                    <div>
                                        <label for="foto" class="block text-sm font-medium text-white">Unggah Foto
                                            (Opsional)</label>
                                        <input type="file" id="foto" name="foto"
                                            class="w-full mt-1 px-4 py-2 border rounded-lg shadow-sm focus:ring-secondary focus:border-secondary">
                                    </div>
                                    <div>
                                        <label class="block text-sm font-medium text-white">Tampilkan Nama</label>
                                        <div class="flex items-center space-x-4 mt-1">
                                            <label class="flex items-center space-x-2">
                                                <input type="radio" name="tampilkan_nama" value="Publik" checked>
                                                <span class="text-white text-sm">Publik</span>
                                            </label>
                                            <label class="flex items-center space-x-2">
                                                <input type="radio" name="tampilkan_nama" value="Anonim">
                                                <span class="text-white text-sm">Anonim</span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" id="submitBtn"
                                    class="w-full bg-white text-secondary font-semibold py-2 rounded-lg hover:bg-opacity-80 transition-colors">
                                    Kirim Pengaduan
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @else
                <div class="flex items-center space-x-8 text-white mt-40">
                    <img src="{{ asset('img/pengaduan.png') }}" alt="pengaduan" class="w-full" />
                </div>
            @endif
    </div>

    <div class="text-center">
        <h1 class="text-2xl">Jumlah Laporan Sekarang</h1>
        <h3 class="font-semibold text-3xl">{{ $jumlahPengaduan }}</h3>

        <!-- Bagian Laporan Terhangat -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-6">Laporan Terhangat</h2>
            @if ($laporanTerhangat->isNotEmpty())
                <div class="max-w-screen-xl mx-auto px-4 py-8 flex justify-center gap-4 flex-wrap items-center">
                    @foreach ($laporanTerhangat as $hot)
                        <div
                            class="max-w-lg bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden mb-4 relative">
                            <div
                                class="absolute top-4 right-4 bg-red-500 text-white px-3 py-1 rounded-full text-sm font-bold">
                                HOT 🔥
                            </div>
                                @if(!empty($hot['foto']))
        <img src="{{ asset('storage/uploads/pengaduan/' . $hot['foto']) }}" alt="Foto Pengaduan" class="object-cover rounded-lg">
    @endif

                            <div class="p-4">
                                <h5 class="text-xl font-bold text-gray-900">{{ $hot->judul_aduan }}</h5>
                                <p class="mt-2 text-gray-700 text-justify">{{ Str::limit($hot->deskripsi, 100, '...') }}
                                </p>
                                <div class="flex justify-between items-center mt-4 text-sm text-gray-500">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-user"></i>
                                        <span class="font-medium">{{ $hot->tampilkan_nama }}</span>
                                    </div>
                                    <a href="{{ route('detail.pengaduan', ['id' => $hot->id]) }}"
                                        class="flex items-center space-x-2">
                                        <i class="fas fa-comment-alt text-gray-500"></i>
                                        <span>Komentar ({{ $hot->komentar_count }})</span>
                                    </a>
                                    <a href="{{ route('detail.pengaduan', ['id' => $hot->id]) }}"
                                        class="flex items-center space-x-2">
                                        <i class="fas fa-thumbs-up text-gray-500"></i>
                                        <span>Dukungan ({{ $hot->likes_count }})</span>
                                    </a>
                                    <a href="{{ route('detail.pengaduan', ['id' => $hot->id]) }}"
                                        class="flex items-center space-x-2">
                                        <i class="fas fa-eye text-gray-500"></i>
                                        <span>Lihat</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

        <!-- Bagian Semua Laporan -->
        <div class="mt-12">
            <h2 class="text-2xl font-bold mb-6">Semua Laporan</h2>
            @if ($data->isNotEmpty())
                <div class="max-w-screen-xl mx-auto px-4 py-8 flex justify-center gap-4 flex-wrap items-center">
                    @foreach ($data as $datas)
                        <div class="max-w-lg bg-white border border-gray-200 rounded-lg shadow-md overflow-hidden mb-4">
                        @if(!empty($datas['foto']))
    <img src="{{ asset('storage/uploads/pengaduan/' . $datas['foto']) }}" alt="Foto Pengaduan" class="object-cover rounded-lg">
@endif
                            <div class="p-4">
                                <h5 class="text-xl font-bold text-gray-900">{{ $datas->judul_aduan }}</h5>
                                <p class="mt-2 text-gray-700 text-justify">{{ Str::limit($datas->deskripsi, 100, '...') }}
                                </p>
                                <div class="flex justify-between items-center mt-4 text-sm text-gray-500">
                                    <div class="flex items-center space-x-2">
                                        <i class="fas fa-user"></i>
                                        <span class="font-medium">{{ $datas->tampilkan_nama }}</span>
                                    </div>
                                    <a href="{{ route('detail.pengaduan', ['id' => $datas->id]) }}"
                                        class="flex items-center space-x-2">
                                        <i class="fas fa-comment-alt text-gray-500"></i>
                                        <span>Komentar ({{ $datas->komentar->count() }})</span>
                                    </a>
                                    <a href="{{ route('detail.pengaduan', ['id' => $datas->id]) }}"
                                        class="flex items-center space-x-2">
                                        <i class="fas fa-thumbs-up text-gray-500"></i>
                                        <span>Dukungan ({{ $datas->likes->count() }})</span>
                                    </a>
                                    <a href="{{ route('detail.pengaduan', ['id' => $datas->id]) }}"
                                        class="flex items-center space-x-2">
                                        <i class="fas fa-eye text-gray-500"></i>
                                        <span>Lihat</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="max-w-screen-xl mx-auto px-4 py-8 text-center">
                    <h5 class="text-xl font-bold text-gray-900">Aduan Kosong</h5>
                    <p class="mt-2 text-gray-700">Saat ini tidak ada pengaduan yang tersedia.</p>
                </div>
            @endif
        </div>
    </div>


    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const stepIndicators = document.querySelectorAll('.step-indicator');
            const steps = document.querySelectorAll('.step-content');

            const kategoriInput = document.getElementById('kategori');
            const lokasiInput = document.getElementById('lokasi');
            const hiddenKategori = document.getElementById('hidden-kategori');
            const hiddenLokasi = document.getElementById('hidden-lokasi');

            const showStep = (stepIndex) => {
                steps.forEach((step, index) => {
                    if (index === stepIndex) {
                        step.classList.remove('hidden');
                        stepIndicators[index].classList.replace('bg-red-400', 'bg-secondary');
                        stepIndicators[index].classList.add('border-2');
                        stepIndicators[index].classList.remove('border-none');
                    } else {
                        step.classList.add('hidden');
                        stepIndicators[index].classList.replace('bg-secondary', 'bg-red-400');
                        stepIndicators[index].classList.add('border-none');
                        stepIndicators[index].classList.remove('border-2');
                    }
                });
            };

            document.getElementById('next-1').addEventListener('click', function(e) {
                e.preventDefault();
                const kategori = kategoriInput.value;
                if (kategori) {
                    hiddenKategori.value = kategori;
                    showStep(1);
                } else {
                    alert('Harap pilih kategori terlebih dahulu!');
                }
            });

            document.getElementById('next-2').addEventListener('click', function(e) {
                e.preventDefault();
                const lokasi = lokasiInput.value;
                if (lokasi) {
                    hiddenLokasi.value = lokasi;
                    showStep(2);
                } else {
                    alert('Harap masukkan lokasi pengaduan!');
                }
            });

            stepIndicators.forEach((indicator, index) => {
                indicator.addEventListener('click', function() {
                    showStep(index);
                });
            });
        });
    </script>

@endsection
