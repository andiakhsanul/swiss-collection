<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\CategoriesVideo;
use App\Models\Program;
use Illuminate\Support\Facades\Log;

class VideoController extends Controller
{

    public function store(Request $request)
    {
        // Menyimpan file gambar_video ke storage
        $path = $request->file('gambar_video')->store('video_image', 'public');

        // Membuat video baru dengan data yang diberikan
        $video = Video::create([
            'judul_video' => $request->judul_video,
            'deskripsi_video' => $request->deskripsi_video,
            'url_video' => $request->url_video,
            'durasi_video' => $request->durasi_video,
            'gambar_video' => $path,
        ]);

        // Menghubungkan video dengan categories dan program
        $categories = $request->categories;
        $program = $request->program;

        $video->categories()->attach($categories);
        $video->program()->attach($program);

        // Redirect ke halaman admin/video
        return redirect()->intended('admin/video');
    }

    public function destroy($id)
    {
        // Mengambil video berdasarkan ID
        $video = Video::findOrFail($id);

        // Melepaskan hubungan categories dan program
        $video->categories()->detach();
        $video->program()->detach();

        // Menghapus gambar dari storage
        Storage::delete('public/' . $video->gambar_video);

        // Menghapus video dari database
        $video->delete();

        // Redirect ke halaman admin/video
        return redirect()->intended('admin/video');
    }

    public function edit($id)
    {
        // Mengambil video berdasarkan ID beserta categories dan program yang terkait
        $video = Video::with('categories', 'program')->find($id);
        $cat = CategoriesVideo::all();
        $prog = Program::all();

        // Mengirim data ke view editVideo
        return view('admin.editVideo', compact('video', 'cat', 'prog'));
    }

    
    public function update(Request $request, $id)
    {
        try {
            // Temukan recipe berdasarkan ID
            $video = Video::findOrFail($id);

            // Jika ada gambar yang diunggah
            if ($request->hasFile('gambar_video')) {
                // Hapus gambar lama jika ada
                if ($video->gambar_video) {
                    Storage::disk('public')->delete($video->gambar_video);
                }

                // Simpan gambar baru
                $path = $request->file('gambar_video')->store('video_image', 'public');
                $video->gambar_video = $path;
            }

            // Update data recipe
            $video->judul_video = $request->judul_video;
            $video->durasi_video = $request->durasi_video;
            $video->deskripsi_video = $request->deskripsi_video;
            $video->url_video = $request->url_video;
            $video->save();

            // Sinkronkan kategori
            $video->categories()->sync($request->input('categories', []));

            // Redirect ke halaman yang diinginkan setelah berhasil update
            return redirect()->intended('admin/video');
        } catch (\Exception $e) {
            // Tangani exception di sini, misalnya log dan kembalikan pesan kesalahan
            Log::error('Error updating video: ' . $e->getMessage());
            return back()->withError('Gagal mengupdate video. Silakan coba lagi.');
        }
    }
}