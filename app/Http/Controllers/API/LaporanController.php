<?php

namespace App\Http\Controllers\API;

use App\Models\Laporan;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Resources\LaporanResource;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = $request->input('user_id');

        $laporan = Laporan::when($userId, function ($query, $userId) {
            return $query->where('user_id', $userId);
        })->get();

        return LaporanResource::collection($laporan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $allowedfileExtension = ['jpg', 'png', 'jpeg', 'heic', 'heif'];
        $photos = $request->foto;

        foreach ($photos as $photo) {
            $extension = $photo->getClientOriginalExtension();
            $check = in_array($extension, $allowedfileExtension);

            if ($check) {
                $path[] = $photo->store('post-foto');
            } else {
                return response()->json(['error' => 'Ekstensi File tidak di dukung'], 400);
            }
        }

        $data = new Laporan;
        $data->user_id = $request->user_id;
        $data->surat_id = $request->surat_id;
        $data->nama_kegiatan = $request->nama_kegiatan;
        $data->foto = $path;
        $data->lokasi = $request->lokasi;
        $data->deskripsi = $request->deskripsi;
        $data->save();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil ditambahkan',
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Laporan $laporan)
    {
        $laporan = Laporan::find($laporan->id);
        return new LaporanResource($laporan);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Laporan $laporan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Laporan $laporan)
    {
        if ($request->hasFile('foto')) {
            $allowedfileExtension = ['jpg', 'png', 'jpeg'];
            $photos = $request->foto;

            foreach ($photos as $photo) {
                $extension = $photo->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);

                if ($check) {
                    $path[] = $photo->store('post-foto');
                } else {
                    return response()->json(['error' => 'Ekstensi File tidak di dukung'], 400);
                }
            }

            foreach ($laporan->foto as $foto) {
                File::delete(public_path() . '/storage/' . $foto);
            }

            $laporan->update([
                'nama_kegiatan' => $request->nama_kegiatan,
                'foto' => $path,
                'lokasi' => $request->lokasi,
                'deskripsi' => $request->deskripsi,
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diubah'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $data = Laporan::find($id);

        $images = $data->foto;

        foreach ($images as $image) {
            $destination = public_path() . '/storage/' . $image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
        }

        $result = $data->delete();

        if ($result) {
            return response()->json([
                'status' => 'success',
                'message' => 'Data berhasil dihapus'
            ]);
        } else {
            return response()->json([
                'status' => 'error',
                'message' => 'Data gagal dihapus'
            ]);
        }
    }

    public function getByUserId($id)
    {
        $data = Laporan::where('user_id', $id)->get();
        if (is_null($data)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Data tidak ditemukan.',
                404
            ]);
        }
        return response()->json(
            $data
        );
    }
}
