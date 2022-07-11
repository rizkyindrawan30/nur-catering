<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Lauk;
use App\Models\Transaction;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request)
    {
        $lauk = Lauk::get();
        $kotak = Paket::where('category_id', '=', '1')->get();
        $bungkus = Paket::where('category_id', '=', '2')->get();
        $tumpeng = Paket::where('category_id', '=', '3')->get();
        $paket = Paket::get();

        $data = $request->session()->all();

        return view('layouts.user.main', compact('paket', 'kotak', 'bungkus', 'tumpeng', 'lauk', 'data'));
    }

    public function detailpaket($id)
    {
        $paket = Paket::find($id);
        $transaksi = Transaction::find($id);
        return view('layouts.user.detailpaket', compact('paket', 'transaksi'));
    }

    public function about()
    {
        return view('layouts.user.tentangkami');
    }
}
