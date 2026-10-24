<?php

namespace App\Http\Controllers;

use App\Models\Laporan;
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
     * Halaman form pelaporan.
     */
    public function create()
    {
        return view('laporan.form', [
            'daftarKecamatan' => $this->daftarKecamatan(),
            'hariIni'         => now('Asia/Jakarta')->toDateString(),
        ]);
    }

    /**
     * Menerima data form (POST), menyimpan ke database,
     * lalu menampilkan halaman konfirmasi.
     */
    public function konfirmasi(Request $request)
    {
        $hariIni = now('Asia/Jakarta')->toDateString();

        $data = $request->validate([
            'nama_pelapor'     => ['required', 'string', 'max:100'],
            'kecamatan'        => ['required', Rule::in($this->daftarKecamatan())],
            'desa'             => ['required', 'string', 'max:100'],
            'tinggi_genangan'  => ['required', 'integer', 'min:0', 'max:1000'],
            'tanggal_kejadian' => ['required', 'date', 'before_or_equal:' . $hariIni],
        ], [
            'nama_pelapor.required'          => 'Nama pelapor wajib diisi.',
            'kecamatan.required'             => 'Kecamatan wajib dipilih.',
            'kecamatan.in'                   => 'Kecamatan tidak valid.',
            'desa.required'                  => 'Desa/kelurahan wajib diisi.',
            'tinggi_genangan.required'       => 'Tinggi genangan wajib diisi.',
            'tinggi_genangan.integer'        => 'Tinggi genangan harus berupa angka bulat (cm).',
            'tinggi_genangan.min'            => 'Tinggi genangan tidak boleh negatif.',
            'tinggi_genangan.max'            => 'Tinggi genangan maksimal 1000 cm.',
            'tanggal_kejadian.required'      => 'Tanggal kejadian wajib diisi.',
            'tanggal_kejadian.date'          => 'Tanggal kejadian tidak valid.',
            'tanggal_kejadian.before_or_equal' => 'Tanggal kejadian tidak boleh melebihi hari ini.',
        ]);

        $laporan = Laporan::create([
            'nama_pelapor'     => $data['nama_pelapor'],
            'lokasi'           => $data['desa'] . ', Kec. ' . $data['kecamatan'],
            'tinggi_genangan'  => (int) $data['tinggi_genangan'],
            'tanggal_kejadian' => $data['tanggal_kejadian'],
        ]);

        return view('laporan.konfirmasi', compact('laporan'));
    }

    /**
     * Halaman daftar laporan (dari database).
     */
    public function index()
    {
        return view('laporan.index', [
            'daftarLaporan' => Laporan::all(),
        ]);
    }
}
