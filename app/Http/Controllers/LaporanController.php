<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LaporanPenjualan;

class LaporanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Laporan Pendapatan";
        $title_content = "Data Laporan Pendapatan";
        $laporan = LaporanPenjualan::paginate(4);
        return view('admin.laporan.index', compact('title', 'laporan', 'title_content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Input Laporan Pendapatan";
        $title_content = "Input Data Laporan Pendapatan";
        $laporan = LaporanPenjualan::all();
        return view('admin.laporan.create', compact('title', 'title_content', 'laporan'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $ValidateData = $request->validate([
            'order'           => 'required',
            'tanggal'         => 'required',
            'jumlah_order'    => 'required',
            'jumlah_pengeluaran' => 'required',
            'jumlah_pendapatan' => 'required',
            'keuntungan'    => 'required',
        ]);
        // dd($ValidateData);

        LaporanPenjualan::create($ValidateData);
        return redirect('LaporanPenjualan')->with('success', 'Data Berhasil diinput !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Data';
        $title_content = 'Edit Data Laporan Penjualan';
        $laporan = LaporanPenjualan::find($id);
        return view('admin.laporan.edit', compact('title', 'title_content', 'laporan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $ValidateData = $request->validate([
            'order'              => 'required',
            'tanggal'            => 'required',
            'jumlah_order'       => 'required',
            'jumlah_pengeluaran' => 'required',
            'jumlah_pendapatan'  => 'required',
            'keuntungan'         => 'required',
        ]);

        LaporanPenjualan::where('id', $id)->update($ValidateData);

        return redirect('LaporanPenjualan')->with('success', 'Data Berhasil diinput !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laporan = LaporanPenjualan::find($id);
        LaporanPenjualan::destroy($id);

        return redirect('LaporanPenjualan')->with('success', 'Data Laporan Penjualan sudah berhasil terhapus !');
    }
}
