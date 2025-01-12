<?php

namespace App\Http\Controllers\API;

use App\Models\Surat;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\SuratResource;

class SuratController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $userId = $request->input('user_id');

        $surat = Surat::when($userId, function ($query, $userId) {
            return $query->where('user_id', $userId);
        })
            ->orderByRaw('CASE WHEN validasi = 0 THEN 0 ELSE 1 END') // Mengurutkan berdasarkan validasi, validasi 0 akan tampil paling awal
            ->latest('updated_at')
            ->get();

        return SuratResource::collection($surat);
    }

    public function getValidasi()
    {
        $surat = Surat::where('validasi', 1)
            ->get();

        return SuratResource::collection($surat);
    }

    public function getValidasiUID(Request $request)
    {
        $userId = $request->input('user_id');

        $surat = Surat::where('validasi', 1)
            ->where('user_id', $userId)
            ->get();

        return SuratResource::collection($surat);
    }

    public function getValidasibyYears(Request $request)
    {
        $validasi = $request->query('validasi');
        $tahun = $request->query('tahun');

        $suratValidasi = Surat::where('validasi', $validasi)
            ->whereYear('tgl_awal', $tahun)
            ->get();

        return response()->json([
            'data' => $suratValidasi,
        ]);
    }

    public function getValidasibyYearsUID(Request $request)
    {
        $validasi = $request->query('validasi');
        $tahun = $request->query('tahun');
        $userId = $request->query('user_id');

        $suratValidasi = Surat::where('validasi', $validasi)
            ->whereYear('tgl_awal', $tahun)
            ->where('user_id', $userId)
            ->get();

        return response()->json([
            'data' => $suratValidasi,
        ]);
    }


    public function getSuratSelesai(Request $request)
    {
        $user_id = $request->input('user_id');

        $surat = Surat::where('diserahkan', 1)
            ->where('user_id', $user_id)
            ->get();

        return SuratResource::collection($surat);
    }

    public function getAllSuratSelesai()
    {
        $surat = Surat::where('diserahkan', 1)
            ->get();

        return SuratResource::collection($surat);
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('search');
        $userId = $request->input('user_id');

        $surat = Surat::when($searchQuery, function ($query, $searchQuery) {
            return $query->where(function ($query) use ($searchQuery) {
                $query->where('judul', 'like', '%' . $searchQuery . '%')
                    ->orWhereHas('user', function ($query) use ($searchQuery) {
                        $query->where('name', 'like', '%' . $searchQuery . '%');
                    });
            });
        })
            ->when($userId, function ($query, $userId) {
                return $query->where('user_id', $userId);
            })
            ->orderByRaw('CASE WHEN validasi = 0 THEN 0 ELSE 1 END')
            ->latest('updated_at')
            ->get();

        return SuratResource::collection($surat);
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
        $surat = Surat::create($request->all());

        return [
            'success' => true,
            'message' => 'Surat berhasil ditambahkan',
            'data' => new SuratResource($surat)
        ];
    }

    /**
     * Display the specified resource.
     */
    public function show(Surat $surat)
    {
        $surat = Surat::find($surat->id);
        return new SuratResource($surat);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Surat $surat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Surat $surat)
    {
        $surat->update($request->all());

        return [
            'success' => true,
            'message' => 'Surat berhasil diubah',
            'data' => new SuratResource($surat)
        ];
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Surat $surat)
    {
        $surat->delete();

        return [
            'success' => true,
            'message' => 'Surat berhasil dihapus'
        ];
    }

    public function serahkan($id)
    {
        $surat = Surat::findOrFail($id);
        $surat->diserahkan = 1;
        $surat->save();

        return response()->json(['success' => true, 'message' => 'Surat berhasil diserahkan']);
    }
}
