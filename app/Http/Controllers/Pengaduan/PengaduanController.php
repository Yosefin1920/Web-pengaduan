<?php

namespace App\Http\Controllers\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\Komentar;
use App\Models\Like;
use App\Models\Pengaduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    public function index()
    {
        $jumlahPengaduan = Pengaduan::count();
        $data = Pengaduan::latest()->get();

        $laporanTerhangat = Pengaduan::withCount(['komentar', 'likes'])
            ->orderByRaw('(komentar_count + likes_count) DESC')
            ->take(1)
            ->get();

        return view('pengaduan.pengaduan', compact('data', 'jumlahPengaduan', 'laporanTerhangat'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori' => 'required|string|max:50',
            'lokasi' => 'required|string|max:255',
            'nama_pelapor' => 'required|string|max:255',
            'no_telp' => 'required|string|max:15',
            'judul_aduan' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'deskripsi' => 'required|string',
            'saran' => 'required|string',
            'tampilkan_nama' => 'required|in:Anonim,Publik',
            'foto' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $data = $request->all();
        $data['user_id'] = auth()->id();

        if ($request->hasFile('foto')) {
            $file = $request->file('foto');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/uploads/pengaduan', $filename);
            $data['foto'] = $filename;
        }

        if ($request->tampilkan_nama == 'Anonim') {
            $data['nama_pelapor'] = 'Anonim';
        }
        Pengaduan::create($data);

        return redirect()->back()->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function detail($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $komentar = Komentar::where('pengaduan_id', $id)->get();
        $likesCount = Like::where('pengaduan_id', $id)->count();
        $komentarCount = Komentar::where('pengaduan_id', $id)->count();
        return view('pengaduan.detail_pengaduan', compact('pengaduan', 'komentar', 'likesCount', 'komentarCount'));
    }

    public function like($id)
    {
        $pengaduan = Pengaduan::findOrFail($id);
        $like = Like::where('pengaduan_id', $id)
            ->where('user_id', auth()->id())
            ->first();

        if ($like) {
            $like->delete();
        } else {
            Like::create([
                'pengaduan_id' => $id,
                'user_id' => auth()->id(),
            ]);
        }

        $likesCount = Like::where('pengaduan_id', $id)->count();

        return response()->json(['likesCount' => $likesCount]);
    }

    public function storeKomentar(Request $request, $id)
    {
        $request->validate([
            'isi_komentar' => 'required|string|max:500',
            'visibility' => 'required|in:public,anonymous',
        ]);

        Komentar::create([
            'pengaduan_id' => $id,
            'user_id' => auth()->id(),
            'isi_komentar' => $request->isi_komentar,
            'is_anonymous' => $request->visibility === 'anonymous',
        ]);

        return back();
    }
}
