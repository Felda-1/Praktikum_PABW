<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class TransactionController extends Controller
{
    private const KATEGORI = [
        'Penjualan', 'Modal', 'Bahan baku', 'Gaji', 'Sewa',
        'Listrik dan air', 'Pemasaran', 'Lainnya',
    ];

    /** Input -> proses -> tampil: data dari session dihitung menjadi ringkasan keuangan. */
    public function index(Request $request)
    {
        $transaksi = $request->session()->get('transaksi', []);

        $pemasukan = (int) collect($transaksi)->where('jenis', 'pemasukan')->sum('jumlah');
        $pengeluaran = (int) collect($transaksi)->where('jenis', 'pengeluaran')->sum('jumlah');
        $saldo = $pemasukan - $pengeluaran;
        $margin = $pemasukan > 0 ? round($saldo / $pemasukan * 100, 1) : null;
        $rasio = $pemasukan > 0 ? round($pengeluaran / $pemasukan * 100, 1) : ($pengeluaran > 0 ? 100.0 : 0.0);

        $daftar = collect($transaksi)
            ->map(fn ($t, $i) => $t + ['index' => $i])
            ->sortByDesc('tanggal')
            ->values();

        return view('user.transactions.index', [
            'daftar'      => $daftar,
            'pemasukan'   => $pemasukan,
            'pengeluaran' => $pengeluaran,
            'saldo'       => $saldo,
            'margin'      => $margin,
            'rasio'       => $rasio,
            'kondisi'     => $this->kondisi($pemasukan, $pengeluaran, $rasio),
        ]);
    }

    public function create()
    {
        return view('user.transactions.create', ['kategori' => self::KATEGORI]);
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'jenis'      => ['required', Rule::in(['pemasukan', 'pengeluaran'])],
                'kategori'   => ['required', Rule::in(self::KATEGORI)],
                'jumlah'     => ['required', 'integer', 'min:1', 'max:1000000000000'],
                'tanggal'    => ['required', 'date'],
                'keterangan' => ['nullable', 'string', 'max:150'],
            ],
            [
                'required'       => ':attribute wajib diisi.',
                'in'             => 'Pilihan :attribute tidak valid.',
                'jumlah.integer' => 'Jumlah harus berupa angka bulat dalam rupiah.',
                'jumlah.min'     => 'Jumlah minimal Rp 1.',
                'jumlah.max'     => 'Jumlah terlalu besar.',
                'date'           => 'Tanggal tidak valid.',
                'max.string'     => ':attribute maksimal :max karakter.',
            ],
            ['jenis' => 'Jenis', 'kategori' => 'Kategori', 'jumlah' => 'Jumlah', 'tanggal' => 'Tanggal', 'keterangan' => 'Keterangan']
        );

        $request->session()->push('transaksi', [
            'jenis'      => $data['jenis'],
            'kategori'   => $data['kategori'],
            'jumlah'     => (int) $data['jumlah'],
            'tanggal'    => $data['tanggal'],
            'keterangan' => trim($data['keterangan'] ?? ''),
        ]);

        return redirect()->route('transactions.index')->with('status', 'Transaksi ditambahkan.');
    }

    public function destroy(Request $request, int $index)
    {
        $list = $request->session()->get('transaksi', []);
        if (isset($list[$index])) {
            unset($list[$index]);
            $request->session()->put('transaksi', array_values($list));
        }

        return redirect()->route('transactions.index')->with('status', 'Transaksi dihapus.');
    }

    public function reset(Request $request)
    {
        $request->session()->forget('transaksi');

        return redirect()->route('transactions.index')->with('status', 'Semua transaksi dikosongkan.');
    }

    /** Kondisi sederhana; batas 80% adalah asumsi untuk prototipe. */
    private function kondisi(int $pemasukan, int $pengeluaran, float $rasio): array
    {
        if ($pemasukan + $pengeluaran === 0) {
            return ['label' => 'Belum ada data', 'pesan' => 'Tambahkan transaksi pertama untuk melihat ringkasan.', 'warna' => 'bg-finbisku-neutral-300'];
        }
        if ($pengeluaran > $pemasukan) {
            return ['label' => 'Defisit', 'pesan' => 'Pengeluaran melebihi pemasukan. Tinjau biaya terbesar lebih dulu.', 'warna' => 'bg-red-500'];
        }
        if ($rasio > 80) {
            return ['label' => 'Waspada', 'pesan' => 'Pengeluaran sudah di atas 80% pemasukan.', 'warna' => 'bg-finbisku-gold-400'];
        }

        return ['label' => 'Sehat', 'pesan' => 'Pengeluaran masih di bawah 80% pemasukan.', 'warna' => 'bg-finbisku-green-400'];
    }
}
