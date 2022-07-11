<?php

namespace App\Http\Controllers;

use App\Models\Paket;
use App\Models\Transaction;
use App\Models\Transaction_detail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TransaksiContoller extends Controller
{
    public function cart(Request $request)
    {
        $cart = Transaction_detail::with('menu')->where('status', 'cart')->where('user_id', Auth::guard('user')->user()->id)->get();
        $jumlah = 0;
        $total_harga = 0;
        foreach ($cart as $item) {
            $item->menu->nama_paket;
            $item->menu->categorys->category;
            $item->menu->harga;
            $item->kuantitas;
            $total = $item->menu->harga * $item->kuantitas;
            $jumlah += $item->kuantitas;
            $total_harga += $item->total_harga;
        }

        return view('user.transaksi.cart', compact('cart', 'jumlah', 'total_harga'));
    }

    public function cartEdit($id)
    {
        $find_cart = Transaction_detail::with('menu')->find($id);
        return view('user.transaksi.kuantitas', compact('find_cart'));
    }

    public function cartUpdate(Request $request, $id)
    {
        $kuantitas = Transaction_detail::with('menu')->where('id', $id)->first();
        $kuantitas->kuantitas = $request->kuantitas;
        $kuantitas->total_harga = $request->kuantitas * $kuantitas->menu->harga;
        $kuantitas->save();
        return redirect()->route('cart');
    }

    public function addcart(Request $request)
    {
        $cart = Transaction_detail::where('user_id', Auth::guard('user')->user()->id)->where('menu_id', $request->menu_id)->where('status', 'cart')->first();
        if (!empty($cart)) {
            $cart->kuantitas = $cart->kuantitas + $request->kuantitas;
            $cart->save();
            return redirect()->route('cart')->with('succsess', 'Menu berhasil ditambahkan ke keranjang');
        } else {
            $addacart = new Transaction_detail;
            $addacart->user_id = $request->user_id;
            $addacart->transaction_id = $request->transaction_id;
            $addacart->menu_id = $request->menu_id;
            $addacart->kuantitas = $request->kuantitas;
            $addacart->status = "cart";
            $addacart->harga = $request->harga;
            $addacart->total_harga = $request->harga * $request->kuantitas;
            // dd($addacart);
            $addacart->save();
            return redirect()->route('cart')->with('succsess', 'Menu berhasil ditambahkan ke keranjang');
        }
    }

    public function cartDelete($id)
    {
        Transaction_detail::destroy($id);

        return redirect()->back()->with('success', 'Cart Berhasil di download');
    }



    public function checkout()
    {
        $cart = Transaction_detail::with('menu')->where('status', 'cart')->where('user_id', Auth::guard('user')->user()->id)->get();
        $jumlah = 0;
        $total_harga = 0;
        foreach ($cart as $item) {
            $item->menu->nama_paket;
            $item->menu->categorys->category;
            $item->menu->harga;
            $item->kuantitas;
            $total = $item->menu->harga * $item->kuantitas;
            $jumlah += $item->kuantitas;
            $total_harga += $item->total_harga;
        }

        return view('user.transaksi.checkout', compact('cart', 'jumlah', 'total_harga'));
    }

    public function addCheckout(Request $request)
    {
        // return $request->file('bukti_pembayaran')->store('photo-bukti');
        // Create Kode Transaksi
        $tgl = substr(str_replace('-', '', Carbon::now()), 0, 8);
        $checkout = Transaction::latest()->first() ?? new Transaction();
        $kode_transaksi = (int) $checkout->transaksi_kode + 1;

        // $no = $tgl . $table_no;
        // $auto = substr($no, 8);
        // $auto = intval($auto) + 1;
        // $kode_transaksi = substr($no, 0, 8) . str_repeat(0, (4 - strlen(($auto))) . $auto);

        $cart = Transaction_detail::with('menu')->where('status', 'cart')->where('user_id', Auth::guard('user')->user()->id)->get();
        $jumlah = 0;
        $total_harga = 0;
        foreach ($cart as $item) {
            $item->menu->nama_paket;
            $item->menu->categorys->category;
            $item->menu->harga;
            $item->kuantitas;
            $jumlah += $item->kuantitas;
            $total_harga += $item->total_harga;
        }

        $checkout = $request->validate([
            'nama'  => 'required',
            'alamat'  => 'required',
            'kontak'  => 'required|numeric',
            'tanggal_pengiriman'  => 'required',
            'waktu_pengiriman'  => 'required',
            'jenis_pengiriman'  => 'required|in:Dikirim,Diambil'
        ]);
        // ddd($request);
        $checkout = new Transaction();
        $checkout->user_id = Auth::guard('user')->user()->id;
        $checkout->transaksi_kode =  tambah_nol_didepan($kode_transaksi, 5);
        $checkout->nama = $request->nama;
        $checkout->alamat = $request->alamat;
        $checkout->kontak = $request->kontak;
        $checkout->tanggal_pengiriman = $request->tanggal_pengiriman;
        $checkout->waktu_pengiriman = $request->waktu_pengiriman;
        // if ($request->file('bukti_pembayaran')) {
        //     $checkout->bukti_pembayaran = $request->file('bukti_pembayaran')->store('bukti-pembayaran');
        // }
        $checkout->status = "Belum Bayar";
        $checkout->total_transaksi = $total_harga;
        // dd($checkout);
        $checkout->save();

        $jumlah = 0;
        $total_harga = 0;
        foreach ($cart as $item) {
            $cartToCheckout = Transaction_detail::where('user_id', Auth::guard('user')->user()->id)->where('id', $item->id)->first();
            $cartToCheckout->transaction_id = tambah_nol_didepan($kode_transaksi, 5);
            $cartToCheckout->status = "checkout";
            // dd($cartToCheckout);
            $cartToCheckout->save();
        }
        return redirect()->route('invoice')->with('success', 'Checkout Berhasil!');
    }

    public function pesanSekarang(Request $request)
    {
        $addacart = new Transaction_detail;
        $addacart->user_id = Auth::guard('user')->user()->id;
        $addacart->menu_id = $request->menu_id;
        $addacart->kuantitas = $request->kuantitas;
        $addacart->status = "cart";
        $addacart->harga = $request->harga;
        $addacart->total_harga = $request->harga * $request->kuantitas;
        // dd($addacart);
        $addacart->save();
        return redirect()->route('checkout')->with('succsess', 'Menu berhasil ditambahkan ke keranjang');
    }

    public function transaksi()
    {
        $transaksi = Transaction::with('detail.menu')->where('user_id', Auth::guard('user')->user()->id)->get();

        foreach ($transaksi as $item) {
            $photo = Transaction_detail::with('menu')->where('user_id', Auth::guard('user')->user()->id)
                ->where('transaction_id', $item->transaksi_kode)
                ->first();
        }

        return view('user.transaksi.transaksi', compact('transaksi', 'photo'));
    }

    public function transaksiDetail($id)
    {
        $transaksi = Transaction::with('detail.menu')->where('user_id', Auth::guard('user')->user()->id)->findOrFail($id);
        $detail = Transaction_detail::with('menu')->where('user_id', Auth::guard('user')->user()->id)->where('transaction_id', $transaksi->transaksi_kode)->get();
        return view('user.transaksi.detail-transaksi', compact('transaksi', 'detail'));
    }

    public function dataTransaksi()
    {
        $title = "Transaksi";
        $data_transaksi = Transaction::paginate(10);
        return view('admin.transaksi.dataTransaksi', compact('data_transaksi', 'title'));
    }

    public function detailTransaksi($id)
    {
        $title = "Detail Transaksi";
        $transaksi = Transaction::findOrFail($id);
        $detail = Transaction_detail::with('menu')->where('transaction_id', $transaksi->transaksi_kode)->get();
        return view('admin.transaksi.detail-dataTransaksi', compact('transaksi', 'detail', 'title'));
    }

    public function indexInvoice()
    {
        $transaksi = Transaction::where('user_id', Auth::guard('user')->user()->id)->latest()->first();
        $detail = Transaction_detail::with('menu')->where('user_id', Auth::guard('user')->user()->id)->where('transaction_id', $transaksi->transaksi_kode)->get();

        return view('user.transaksi.invoice', compact('transaksi', 'detail'));
    }

    public function invoice(Request $request, $id)
    {
        // return $request->file('bukti_pembayaran')->store('bukti-pembayaran');

        $request->validate([
            'bukti_pembayaran'  => 'required'
        ]);

        $bayar = Transaction::where('user_id', Auth::guard('user')->user()->id)->find($id);
        $bayar->status = "Validasi";
        if ($request->file('bukti_pembayaran')) {
            $bayar->bukti_pembayaran = $request->file('bukti_pembayaran')->store('bukti-pembayaran');
        }
        // ddd($bayar);
        $bayar->save();
        return redirect()->route('transaksi.index')->with('success', 'Pembayaran Berhasil dilakukan!');
    }



    public function setStatus(Request $request, $id)
    {
        // dd($request);
        // $request->validate([
        //     'status'  => 'required|in:Belum Bayar, Gagal,Valid, Validasi, Dikirim, Diambil, Diterima, Pesanan Selesai,Diproses'
        // ]);

        $setStatus = Transaction::findOrFail($id);
        $setStatus->status = $request->status;
        // dd($setStatus);
        $setStatus->save();

        return redirect()->route('data.transaksi')->with('success', 'Status Transaksi Berhasil di Ubah!');
    }
}
