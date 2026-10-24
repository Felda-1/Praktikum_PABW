<?php

namespace App\Support;

/**
 * Sumber data contoh tunggal untuk prototipe tanpa database.
 * Controller mengambil data dari sini, lalu Blade menampilkannya dengan @foreach/@forelse.
 */
class SampleData
{
    public static function articles(): array
    {
        $isi = [
            'Isi artikel ini masih contoh. Pada versi lengkap, teks diambil dari database dan ditulis oleh admin FINBISKU.',
            'Mulailah dari hal kecil: catat setiap uang masuk dan keluar, lalu tinjau setiap akhir pekan.',
        ];

        return [
            ['id' => 1, 'kategori' => 'Pengelolaan kas', 'judul' => 'Cara memisahkan uang pribadi dan uang usaha', 'ringkasan' => 'Kenapa UMKM perlu rekening terpisah dan bagaimana memulainya.', 'penulis' => 'Admin FINBISKU', 'isi' => $isi],
            ['id' => 2, 'kategori' => 'Dasar keuangan', 'judul' => 'Mengenal arus kas untuk UMKM', 'ringkasan' => 'Memahami uang masuk dan keluar agar usaha tetap bernapas.', 'penulis' => 'Admin FINBISKU', 'isi' => $isi],
            ['id' => 3, 'kategori' => 'Penetapan harga', 'judul' => 'Menghitung harga pokok penjualan (HPP)', 'ringkasan' => 'Langkah sederhana menentukan harga jual yang tidak merugi.', 'penulis' => 'Admin FINBISKU', 'isi' => $isi],
            ['id' => 4, 'kategori' => 'Modal', 'judul' => 'Mengatur modal kerja agar usaha tetap sehat', 'ringkasan' => 'Cara membagi modal untuk stok, operasional, dan cadangan.', 'penulis' => 'Admin FINBISKU', 'isi' => $isi],
        ];
    }

    public static function businesses(): array
    {
        return [
            ['id' => 1, 'nama' => 'Warung Makan Bu Sari', 'jenis' => 'Kuliner', 'kota' => 'Bandung', 'deskripsi' => 'Warung makan rumahan dengan menu harian.'],
            ['id' => 2, 'nama' => 'Kopi Senja', 'jenis' => 'Minuman', 'kota' => 'Bandung', 'deskripsi' => 'Deskripsi usaha ini masih contoh.'],
            ['id' => 3, 'nama' => 'Toko Kain Mawar', 'jenis' => 'Fashion', 'kota' => 'Cimahi', 'deskripsi' => 'Deskripsi usaha ini masih contoh.'],
        ];
    }

    public static function blogs(): array
    {
        $isi = ['Cerita usaha ini masih contoh. Di versi lengkap, pemilik usaha menulis kisah dan fotonya sendiri sebagai sarana promosi.'];

        return [
            ['id' => 1, 'judul' => 'Cerita dari dapur Warung Bu Sari', 'usaha' => 'Warung Makan Bu Sari', 'kategori' => 'Kuliner', 'isi' => $isi],
            ['id' => 2, 'judul' => 'Dari satu gerobak ke tiga cabang kopi', 'usaha' => 'Kopi Senja', 'kategori' => 'Minuman', 'isi' => $isi],
            ['id' => 3, 'judul' => 'Kain tenun yang menemukan pembelinya', 'usaha' => 'Toko Kain Mawar', 'kategori' => 'Fashion', 'isi' => $isi],
        ];
    }

    public static function users(): array
    {
        return [
            ['id' => 1, 'nama' => 'Rina Pratama', 'email' => 'rina@contoh.id', 'peran' => 'user', 'jumlah_usaha' => 3, 'bergabung' => '01/09/2026'],
            ['id' => 2, 'nama' => 'Dimas Saputra', 'email' => 'dimas@contoh.id', 'peran' => 'user', 'jumlah_usaha' => 1, 'bergabung' => '05/09/2026'],
            ['id' => 3, 'nama' => 'Sari Wulandari', 'email' => 'sari@contoh.id', 'peran' => 'user', 'jumlah_usaha' => 2, 'bergabung' => '12/09/2026'],
        ];
    }

    public static function features(): array
    {
        return [
            ['judul' => 'Keuangan per usaha', 'deskripsi' => 'Satu akun bisa mengelola beberapa usaha, dengan pencatatan keuangan yang terpisah untuk masing-masing.'],
            ['judul' => 'Blog usaha', 'deskripsi' => 'Ceritakan usahamu dan jadikan blog sebagai sarana promosi bagi calon pelanggan.'],
            ['judul' => 'Artikel keuangan', 'deskripsi' => 'Baca artikel dari admin dan simpan yang penting ke bookmark.'],
        ];
    }

    public static function userStats(): array
    {
        return [
            ['label' => 'Pemasukan bulan ini', 'value' => 'Rp 12.450.000', 'icon' => 'trending-up', 'tone' => 'green'],
            ['label' => 'Pengeluaran bulan ini', 'value' => 'Rp 7.830.000', 'icon' => 'trending-down', 'tone' => 'red'],
            ['label' => 'Saldo', 'value' => 'Rp 4.620.000', 'icon' => 'wallet', 'tone' => 'gold'],
            ['label' => 'Jumlah usaha', 'value' => (string) count(self::businesses()), 'icon' => 'briefcase', 'tone' => 'green'],
        ];
    }

    public static function adminStats(): array
    {
        return [
            ['label' => 'Total user', 'value' => '128', 'icon' => 'users', 'tone' => 'green'],
            ['label' => 'Artikel', 'value' => '24', 'icon' => 'file-text', 'tone' => 'gold'],
            ['label' => 'Blog usaha', 'value' => '57', 'icon' => 'newspaper', 'tone' => 'green'],
            ['label' => 'Usaha terdaftar', 'value' => '203', 'icon' => 'briefcase', 'tone' => 'gold'],
        ];
    }

    /** Cari satu data berdasarkan id; kalau tidak ada tampilkan halaman 404. */
    public static function find(array $items, int $id): array
    {
        return collect($items)->firstWhere('id', $id) ?? abort(404);
    }
}
