<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Ibadah;
use Illuminate\Http\Request;

class IbadahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return response()->json(Ibadah::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
          $request->validate([
            'ibadah' => 'required|string|max:255',
            'jenis' => 'required|string|min:1|max:120',
            'waktu' => 'required|string|max:90',
          
        ]);

         $ibadah = Ibadah::create($request->all());
        return response()->json($ibadah, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $ibadah = Ibadah::find($id);
        if (!$ibadah) {
            return response()->json(['message' => 'Data tidak ada'], 404);
        }
        return response()->json($ibadah);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $ibadah = Ibadah::find($id);
        if (!$ibadah) {
            return response()->json(['message' => 'Data tidak ditemukan '], 404);
        }  
        $request->validate([
            'ibadah' => 'required|string|max:255',
            'jenis' => 'required|string|min:1|max:120',
            'waktu' => 'required|string|max:90',
          
        ]);
        $ibadah->update($request->all());
        return response()->json([
            'message' => 'ibadah berhasil diupdate',
            'data' => $ibadah,
        ],status: 200);  
    }

    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ibadah = Ibadah::find($id);
        if (!$ibadah) {
            return response()->json(['message' => 'ibadah tidak ada'], 404);
        }
        $ibadah->delete();
        return response()->json(['message' => 'ibadah berhasil dihapus'], 200);
        
    }
}
