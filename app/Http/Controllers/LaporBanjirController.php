<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class LaporBanjirController extends Controller
{
    /** 31 kecamatan di Kabupaten Bandung (urut abjad). */
    private const KECAMATAN = [
        'Arjasari', 'Baleendah', 'Banjaran', 'Bojongsoang', 'Cangkuang',
        'Cicalengka', 'Cikancung', 'Cilengkrang', 'Cileunyi', 'Cimaung',
        'Cimenyan', 'Ciparay', 'Ciwidey', 'Dayeuhkolot', 'Ibun',
        'Katapang', 'Kertasari', 'Kutawaringin', 'Majalaya', 'Margaasih',
        'Margahayu', 'Nagreg', 'Pacet', 'Pameungpeuk', 'Pangalengan',
        'Paseh', 'Pasirjambu', 'Rancabali', 'Rancaekek', 'Solokanjeruk',
        'Soreang',
    ];

    /** Menampilkan halaman form pelaporan. */
    public function form()
    {
        return view('laporbanjir.form', [
            'daftarKecamatan' => self::KECAMATAN,
        ]);
    }

    /**
     * Memproses data dari form. Data TIDAK disimpan; hanya divalidasi
     * lalu dikirim langsung ke view konfirmasi.
     */
    public function kirim(Request $request)
    {
        $data = $request->validate(
            [
                'nama_pelapor'    => ['required', 'string', 'max:100'],
                'kecamatan'       => ['required', Rule::in(self::KECAMATAN)],
                'desa'            => ['required', 'string', 'max:100'],
                'tinggi_genangan' => ['required', 'integer', 'min:1', 'max:300'],
            ],
            [
                'required'             => ':attribute wajib diisi.',
                'string'               => ':attribute harus berupa teks.',
                'max.string'           => ':attribute maksimal :max karakter.',
                'integer'              => ':attribute harus berupa angka bulat.',
                'kecamatan.in'         => 'Pilih kecamatan dari daftar yang tersedia.',
                'tinggi_genangan.min'  => 'Tinggi genangan minimal :min cm.',
                'tinggi_genangan.max'  => 'Tinggi genangan maksimal :max cm. Jika lebih tinggi, hubungi BPBD langsung.',
            ],
            [
                'nama_pelapor'    => 'Nama pelapor',
                'kecamatan'       => 'Kecamatan',
                'desa'            => 'Desa',
                'tinggi_genangan' => 'Tinggi genangan',
            ]
        );

        $tinggi = (int) $data['tinggi_genangan'];

        return view('laporbanjir.konfirmasi', [
            'laporan' => [
                'nama_pelapor'    => trim($data['nama_pelapor']),
                'kecamatan'       => $data['kecamatan'],
                'desa'            => trim($data['desa']),
                'tinggi_genangan' => $tinggi,
                'tingkat'         => $this->tingkat($tinggi),
                'waktu'           => now('Asia/Jakarta')->locale('id')->translatedFormat('j F Y, H:i') . ' WIB',
            ],
        ]);
    }

    /** Kategori kasar tinggi genangan (asumsi prototipe, bukan standar BPBD). */
    private function tingkat(int $cm): array
    {
        return match (true) {
            $cm <= 30  => ['kode' => 'rendah',        'label' => 'Rendah'],
            $cm <= 70  => ['kode' => 'sedang',        'label' => 'Sedang'],
            $cm <= 120 => ['kode' => 'tinggi',        'label' => 'Tinggi'],
            default    => ['kode' => 'sangat-tinggi', 'label' => 'Sangat tinggi'],
        };
    }
}
