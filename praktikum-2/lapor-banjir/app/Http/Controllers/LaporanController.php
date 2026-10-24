<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LaporanController extends Controller
{
    /**
     * Daftar kecamatan di Kabupaten Bandung.
     */
    private function daftarKecamatan(): array
    {
        return [
            'Arjasari', 'Baleendah', 'Banjaran', 'Bojongsoang', 'Cangkuang',
            'Cicalengka', 'Cikancung', 'Cilengkrang', 'Cileunyi', 'Cimaung',
            'Cimenyan', 'Ciparay', 'Ciwidey', 'Dayeuhkolot', 'Ibun',
            'Katapang', 'Kertasari', 'Kutawaringin', 'Majalaya', 'Margaasih',
            'Margahayu', 'Nagreg', 'Pacet', 'Pameungpeuk', 'Pangalengan',
            'Paseh', 'Pasirjambu', 'Rancabali', 'Rancaekek', 'Solokanjeruk',
            'Soreang',
        ];
    }

    /**
     * Data contoh laporan (prototipe tanpa database).
     */
    private function dataLaporan(): array
    {
        return [
            ['id' => 1, 'nama' => 'Asep Sunandar',   'kecamatan' => 'Dayeuhkolot', 'desa' => 'Citeureup', 'tinggi' => 85,  'tanggal' => '2026-10-20'],
            ['id' => 2, 'nama' => 'Siti Rahmawati',  'kecamatan' => 'Baleendah',   'desa' => 'Andir',     'tinggi' => 45,  'tanggal' => '2026-10-20'],
            ['id' => 3, 'nama' => 'Deni Kurniawan',  'kecamatan' => 'Bojongsoang', 'desa' => 'Lengkong',  'tinggi' => 20,  'tanggal' => '2026-10-21'],
            ['id' => 4, 'nama' => 'Euis Komariah',   'kecamatan' => 'Rancaekek',   'desa' => 'Linggar',   'tinggi' => 30,  'tanggal' => '2026-10-21'],
            ['id' => 5, 'nama' => 'Yayan Hidayat',   'kecamatan' => 'Majalaya',    'desa' => 'Padamulya', 'tinggi' => 70,  'tanggal' => '2026-10-22'],
            ['id' => 6, 'nama' => 'Neneng Fitriani', 'kecamatan' => 'Ciparay',     'desa' => 'Sarimahi',  'tinggi' => 120, 'tanggal' => '2026-10-22'],
        ];
    }

    /**
     * Halaman form pelaporan.
     */
    public function create()
    {
        return view('laporan.form', [
            'daftarKecamatan' => $this->daftarKecamatan(),
        ]);
    }

    /**
     * Menerima data form (POST), lalu menampilkan halaman konfirmasi.
     */
    public function konfirmasi(Request $request)
    {
        $data = $request->validate([
            'nama'      => ['required', 'string', 'max:100'],
            'kecamatan' => ['required', Rule::in($this->daftarKecamatan())],
            'desa'      => ['required', 'string', 'max:100'],
            'tinggi'    => ['required', 'integer', 'min:0', 'max:1000'],
        ], [
            'nama.required'      => 'Nama pelapor wajib diisi.',
            'kecamatan.required' => 'Kecamatan wajib dipilih.',
            'kecamatan.in'       => 'Kecamatan tidak valid.',
            'desa.required'      => 'Desa/kelurahan wajib diisi.',
            'tinggi.required'    => 'Tinggi genangan wajib diisi.',
            'tinggi.integer'     => 'Tinggi genangan harus berupa angka bulat (cm).',
            'tinggi.min'         => 'Tinggi genangan tidak boleh negatif.',
            'tinggi.max'         => 'Tinggi genangan maksimal 1000 cm.',
        ]);

        $laporan = [
            'nama'      => $data['nama'],
            'kecamatan' => $data['kecamatan'],
            'desa'      => $data['desa'],
            'tinggi'    => (int) $data['tinggi'],
            'waktu'     => now('Asia/Jakarta')->format('d-m-Y H:i') . ' WIB',
        ];

        return view('laporan.konfirmasi', compact('laporan'));
    }

    /**
     * Halaman daftar laporan.
     */
    public function index()
    {
        return view('laporan.index', [
            'daftarLaporan' => $this->dataLaporan(),
        ]);
    }
}
