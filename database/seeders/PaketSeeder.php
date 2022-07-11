<?php

namespace Database\Seeders;

use App\Models\Paket;
use Illuminate\Database\Seeder;

class PaketSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Categori 1
        Paket::create([
            'nama_paket' => 'Paket 1',
            'menu_paket' => '<div>Ayam Kecap<br>Telur<br>Sayur<br>Air</div>',
            'harga' => 17000,
            'photo' => 'paket-image/Dp5yzU4D14IwBBz69hSnlI6sE1u8WG5vjVX173uL.jpg',
            'category_id' => '1'
        ]);
        Paket::create([
            'nama_paket' => 'Paket 2',
            'menu_paket' => '<div>Ayam Kecap<br>Udang<br>Telur<br>Sate</div>',
            'harga' => 20000,
            'photo' => 'paket-image/XSbx7RX946z24ovDR4ChWLluOcRroF3SJb8m22de.jpg',
            'category_id' => '1'
        ]);

        // Categori 2
        Paket::create([
            'nama_paket' => 'Bungkus 1',
            'menu_paket' => '<div>Ayam<br>Tahu<br>Mie<br>Telur<br>Sambal</div>',
            'harga' => 8000,
            'photo' => 'paket-image/7mD6rTbZaOE75Cw3nVwy6dT16qw3qzXaSGUvcjnO.jpg',
            'category_id' => '2'
        ]);
        Paket::create([
            'nama_paket' => 'Bungkus 2',
            'menu_paket' => '<div>Ayam Kecap<br>Udang<br>Telur<br>Sate</div>',
            'harga' => 10000,
            'photo' => 'paket-image/iMCa2Yt7KuiuyiVe3oWHwjofzOAGZr66zv6P4FAw.jpg',
            'category_id' => '2'
        ]);

        // Categori
        Paket::create([
            'nama_paket' => 'Nasi Tumpeng',
            'menu_paket' => '<div>Ayam Sisit<br>Tempe Manis<br>Telor<br>Urab<br>Ayam</div>',
            'harga' => 200000,
            'photo' => 'paket-image/rbK4Ip5mK6nHvvJZUonO8cOI08l9CH4zlJ4kAP2t.jpg',
            'category_id' => '3'
        ]);
    }
}
