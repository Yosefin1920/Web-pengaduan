@extends('layouts.profile')

@section('title', 'Riwayat Pengaduan | Lapor Purworejo')

@section('content')
    <div class="mt-6">
        <h2 class="text-2xl font-bold text-primary mb-4">Riwayat Pengaduan</h2>
        @if ($pengaduan->isEmpty())
            <p class="text-secondary mb-6">Belum ada pengaduan yang diajukan.</p>
            <a href="{{ Auth::check() ? route('pengaduan.pengaduan') : route('login') }}"
                class="bg-white text-primary font-semibold px-6 py-3  rounded-full hover:bg-primary hover:text-white transition-colors">
                Buat Pengaduan &gt;
            </a>
        @else
            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-300">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th class="py-2 px-4 border">No.</th>
                            <th class="py-2 px-4 border">Nama</th>
                            <th class="py-2 px-4 border">Nomor Telepon</th>
                            <th class="py-2 px-4 border">Kategori</th>
                            <th class="py-2 px-4 border">Lokasi</th>
                            <th class="py-2 px-4 border">Judul Aduan</th>
                            <th class="py-2 px-4 border">Tanggal</th>
                            <th class="py-2 px-4 border">Deskripsi</th>
                            <th class="py-2 px-4 border">Saran</th>
                            <th class="py-2 px-4 border">Foto</th>
                            <th class="py-2 px-4 border">Nama pelapor</th>
                            <th class="py-2 px-4 border">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pengaduan as $index => $data)
                            <tr class="{{ $loop->even ? 'bg-gray-100' : 'bg-white' }}">
                                <td class="py-2 px-4 border text-center">{{ $index + 1 }}</td>
                                <td class="py-2 px-4 border">{{ $data->nama_pelapor }}</td>
                                <td class="py-2 px-4 border">{{ $data->no_telp }}</td>
                                <td class="py-2 px-4 border">{{ $data->kategori }}</td>
                                <td class="py-2 px-4 border">{{ $data->lokasi }}</td>
                                <td class="py-2 px-4 border">{{ $data->judul_aduan }}</td>
                                <td class="py-2 px-4 border">{{ \Carbon\Carbon::parse($data->tanggal)->format('d-m-Y') }}
                                </td>
                                <td class="py-2 px-4 border">{{ Str::limit($data->deskripsi, 50, '...') }}</td>
                                <td class="py-2 px-4 border">{{ Str::limit($data->saran, 50, '...') }}</td>
                                <td class="py-2 px-4 border">
                                    <a href="{{ asset('storage/uploads/pengaduan/' . $data->foto) }}" target="_blank">
                                        <img src="{{ asset('storage/uploads/pengaduan/' . $data->foto) }}"
                                            alt="Foto Pengaduan" width="100">
                                    </a>
                                </td>
                                <td class="py-2 px-4 border">{{ $data->tampilkan_nama }}</td>
                                <td class="py-2 px-4 border">{{ $data->status }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>
@endsection
