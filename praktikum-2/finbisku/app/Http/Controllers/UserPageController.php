<?php

namespace App\Http\Controllers;

use App\Models\Business;
use App\Models\Transaction;
use App\Support\SampleData;

class UserPageController extends Controller
{
    public function dashboard()
    {
        $awalBulan = now()->startOfMonth();

        $pemasukan = (int) Transaction::where('jenis', 'pemasukan')->where('tanggal', '>=', $awalBulan)->sum('jumlah');
        $pengeluaran = (int) Transaction::where('jenis', 'pengeluaran')->where('tanggal', '>=', $awalBulan)->sum('jumlah');
        $saldo = $pemasukan - $pengeluaran;

        $rupiah = fn (int $n) => ($n < 0 ? '-' : '').'Rp '.number_format(abs($n), 0, ',', '.');

        $stats = [
            ['label' => 'Pemasukan bulan ini', 'value' => $rupiah($pemasukan), 'icon' => 'trending-up', 'tone' => 'green'],
            ['label' => 'Pengeluaran bulan ini', 'value' => $rupiah($pengeluaran), 'icon' => 'trending-down', 'tone' => 'red'],
            ['label' => 'Saldo', 'value' => $rupiah($saldo), 'icon' => 'wallet', 'tone' => 'gold'],
            ['label' => 'Jumlah usaha', 'value' => (string) Business::count(), 'icon' => 'briefcase', 'tone' => 'green'],
        ];

        $terbaru = Transaction::with('business')->orderByDesc('tanggal')->orderByDesc('id')->take(5)->get();

        return view('user.dashboard', ['stats' => $stats, 'terbaru' => $terbaru]);
    }

    public function articles()
    {
        return view('user.articles.index', ['articles' => SampleData::articles()]);
    }

    public function article(int $id)
    {
        return view('user.articles.show', ['article' => SampleData::find(SampleData::articles(), $id)]);
    }

    public function bookmarks()
    {
        return view('user.bookmarks', ['articles' => SampleData::articles()]);
    }

    public function businesses()
    {
        return view('user.business.index', ['businesses' => Business::orderBy('nama')->get()]);
    }

    public function business(int $id)
    {
        return view('user.business.show', ['business' => Business::findOrFail($id)]);
    }

    public function blogs()
    {
        return view('user.blogs.index', ['blogs' => SampleData::blogs()]);
    }

    public function blog(int $id)
    {
        return view('user.blogs.show', ['blog' => SampleData::find(SampleData::blogs(), $id)]);
    }
}