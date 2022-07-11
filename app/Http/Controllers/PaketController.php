<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Paket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use function GuzzleHttp\Promise\all;

class PaketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Menu Paket";
        $title_content = "Data Menu Paket";
        $paket = Paket::with('categorys')->latest()->paginate(4);
        return view('admin.menu.paket.index', compact('title', 'title_content', 'paket'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Input Menu Paket";
        $title_content = "Input Data Menu Paket";
        $categorys = Category::all();
        return view('admin.menu.paket.create', compact('title', 'title_content', 'categorys'));
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_paket'    => 'required',
            'menu_paket'    => 'required',
            'harga'         => 'required',
            'photo'         => 'required|image|max:2048',
            'category_id'   => 'required',
        ]);
        if ($request->file('photo')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['photo'] = $request->file('photo')->store('paket-image');
        }
        Paket::create($validateData);
        return redirect('paket')->with('success', 'Data Pakat telah berhasil diinput!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'Detail Paket';
        $title_content = "Detail Paket";
        $categorys = Category::all();
        $paket = Paket::find($id);
        return view('admin.menu.paket.detail', compact('title', 'categorys', 'paket', 'title_content'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = "Edit Menu Paket";
        $title_content = "Edit Data Menu Paket";
        $categorys = Category::all();
        $paket = Paket::find($id);
        return view('admin.menu.paket.edit', compact('title', 'categorys', 'title_content', 'paket'));
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'nama_paket'    => 'required',
            'menu_paket'    => 'required',
            'harga'         => 'required',
            'photo'         => 'required',
            'category_id'   => 'required',
        ]);
        if ($request->file('photo')) {
            if ($request->oldImage) {
                Storage::delete($request->oldImage);
            }
            $validateData['photo'] = $request->file('photo')->store('paket-image');
        }
        Paket::where('id', $id)->update($validateData);
        return redirect('paket')->with('success', 'Data Pakat telah berhasil diinput!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = Paket::find($id);
        if (Storage::delete($paket->photo)) {
            $paket->delete();
        } else {
            Paket::destroy($id);
        }

        return redirect('paket')->with('success', 'Data Menu Paket telah berhasil dihapus!');
    }
}
