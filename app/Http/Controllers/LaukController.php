<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lauk;
use Illuminate\Support\Facades\Storage;

class LaukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Data Lauk";
        $title_content = "Data Lauk";
        $lauk = Lauk::paginate(4);
        return view('admin.menu.lauk.index', compact('title', 'lauk', 'title_content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Data Lauk";
        $title_content = "Tambah Data Lauk";
        $lauk = Lauk::all();
        return view('admin.menu.lauk.create', compact('title', 'title_content', 'lauk'));
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
            'nama_lauk'    => 'required',
            'harga'   => 'required',
            'list'    => 'required',
        ]);
        Lauk::create($ValidateData);
        return redirect('Lauk')->with('success', 'Data Berhasil diinput !');
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
        $title = 'Edit Data Lauk';
        $title_content = 'Edit Data Lauk';
        $lauk = Lauk::find($id);
        return view('admin.menu.lauk.edit', compact('title', 'title_content', 'lauk'));
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
            'nama_lauk'    => 'required',
            'harga'   => 'required',
            'list'    => 'required',
        ]);

        Lauk::where('id', $id)->update($ValidateData);

        return redirect('Lauk')->with('success', 'Data Berhasil diinput !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lauk = Lauk::find($id);
        Lauk::destroy($id);

        return redirect('Lauk')->with('success', 'Data Laporan Penjualan sudah berhasil terhapus !');
    }
}
