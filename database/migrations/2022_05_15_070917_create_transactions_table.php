<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('transaksi_kode');
            $table->string('nama');
            $table->string('email')->nullable();
            $table->string('kontak');
            $table->string('alamat');
            $table->date('tanggal_pengiriman');
            $table->time('waktu_pengiriman');
            $table->enum('jenis_pembayaran', ['transfer', 'tunai']);
            $table->string('bukti_pembayaran')->nullable();
            $table->bigInteger('total_transaksi');
            $table->enum('status', ['Belum Bayar', 'Validasi', 'Valid', 'Gagal', 'Diproses', 'Dikirim', 'Diambil', 'Diterima', 'Pemesanan Selesai']);
            $table->enum('jenis_pengiriman', ['Dikirim', 'Diambil']);
            $table->string('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
