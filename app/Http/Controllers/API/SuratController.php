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
    public function index()
    {
        $surat = Surat::all();
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
}
