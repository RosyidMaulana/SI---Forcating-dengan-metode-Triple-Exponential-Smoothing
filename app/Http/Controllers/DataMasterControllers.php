<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wisatawan;

class DataMasterControllers extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data =  Wisatawan::all();

        return view('master-data.view-master-data', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data =  Wisatawan::all();

        return view('master-data.aksi-master-data', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // dd($request);
        $latestYear = Wisatawan::max('tahun');
        $dataBulan = $request->input('bulan');
        $dataKunjungan = $request->input('jumlah_kunjungan');

        // dd($request);

                Wisatawan::create([
                'tahun' => $latestYear + 1,
                'bulan' => $dataBulan,
                'jumlah_kunjungan' => $dataKunjungan,
            ]);

        // $data = $request->input('data');
        // foreach ($data as $entry) {
        //         Wisatawan::create([
        //         'tahun' => $latestYear + 1,
        //         'bulan' => $entry['bulan'],
        //         'jumlah_kunjungan' => $entry['jumlah_kunjungan'],
        //     ]);
    // }

    return redirect()->back()->with('success', 'Data berhasil ditambahkan.');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request, $id);



            // Cari data berdasarkan ID
            $data = Wisatawan::findOrFail($id);

            // Update kolom jumlah_kunjungan dengan nilai dari form
            $data->jumlah_kunjungan = $request->input('jumlah_kunjungan');

            // Simpan perubahan ke database
            $data->save();

            // Redirect dengan pesan sukses
            return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function delete(Request $request)
    {
        // dd($request->input('tahun'));

        $tahun = $request->input('tahun');

        // Hapus semua record yang memiliki tahun yang sama
        Wisatawan::where('tahun', $tahun)->delete();

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Semua data dengan tahun ' . $tahun . ' berhasil dihapus.');
    }


    public function tambah()
    {
        return view('master-data.tambah-data');
    }
}
