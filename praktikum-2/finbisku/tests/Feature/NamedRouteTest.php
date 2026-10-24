<?php

namespace Tests\Feature;

use Tests\TestCase;

class NamedRouteTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutVite(); // tidak perlu `npm run build` untuk menguji Blade
    }

    public static function halaman(): array
    {
        return [
            'home' => ['home', []],
            'articles.index' => ['articles.index', []],
            'articles.show' => ['articles.show', [1]],
            'public-blogs.index' => ['public-blogs.index', []],
            'public-blogs.show' => ['public-blogs.show', [2]],
            'login' => ['login', []],
            'register' => ['register', []],
            'password.request' => ['password.request', []],
            'dashboard' => ['dashboard', []],
            'user.articles.index' => ['user.articles.index', []],
            'user.articles.show' => ['user.articles.show', [3]],
            'business.index' => ['business.index', []],
            'business.create' => ['business.create', []],
            'business.show' => ['business.show', [1]],
            'business.edit' => ['business.edit', [1]],
            'transactions.index' => ['transactions.index', []],
            'transactions.create' => ['transactions.create', []],
            'transactions.show' => ['transactions.show', [1]],
            'transactions.edit' => ['transactions.edit', [1]],
            'blogs.index' => ['blogs.index', []],
            'blogs.create' => ['blogs.create', []],
            'blogs.show' => ['blogs.show', [1]],
            'blogs.edit' => ['blogs.edit', [1]],
            'bookmarks' => ['bookmarks', []],
            'profile' => ['profile', []],
            'profile.password' => ['profile.password', []],
            'admin.dashboard' => ['admin.dashboard', []],
            'admin.profile' => ['admin.profile', []],
            'admin.users.index' => ['admin.users.index', []],
            'admin.users.show' => ['admin.users.show', [1]],
            'admin.articles.index' => ['admin.articles.index', []],
            'admin.articles.create' => ['admin.articles.create', []],
            'admin.articles.show' => ['admin.articles.show', [4]],
            'admin.articles.edit' => ['admin.articles.edit', [1]],
        ];
    }

    #[\PHPUnit\Framework\Attributes\DataProvider('halaman')]
    public function test_setiap_halaman_dapat_diakses_lewat_named_route(string $nama, array $parameter): void
    {
        $this->get(route($nama, $parameter))->assertOk();
    }

    public function test_data_tidak_ditemukan_menampilkan_404(): void
    {
        $this->get(route('articles.show', 999))->assertNotFound();
        $this->get(route('admin.users.show', 999))->assertNotFound();
    }

    public function test_navigasi_publik_memakai_named_route(): void
    {
        $this->get(route('home'))
            ->assertSee(route('articles.index'), false)
            ->assertSee(route('public-blogs.index'), false)
            ->assertSee(route('login'), false)
            ->assertSee(route('register'), false);
    }

    public function test_daftar_artikel_menampilkan_semua_data_dengan_foreach(): void
    {
        $this->get(route('articles.index'))
            ->assertSee('Mengenal arus kas untuk UMKM')
            ->assertSee('Mengatur modal kerja agar usaha tetap sehat');
    }

    public function test_menu_user_memakai_named_route_dan_menandai_halaman_aktif(): void
    {
        $this->get(route('business.index'))
            ->assertSee(route('transactions.index'), false)
            ->assertSee('aria-current="page"', false);
    }

    public function test_transaksi_tersimpan_ke_session_setelah_form_dikirim(): void
    {
        $this->post(route('transactions.store'), [
            'jenis' => 'pemasukan',
            'kategori' => 'Penjualan',
            'jumlah' => 150000,
            'tanggal' => '2026-10-24',
            'keterangan' => 'Tes',
        ])
            ->assertRedirect(route('transactions.index'))
            ->assertSessionHas('transaksi');
    }

    public function test_ringkasan_keuangan_dan_pesan_status_tampil(): void
    {
        $this->withSession([
            'status' => 'Transaksi ditambahkan.',
            'transaksi' => [[
                'jenis' => 'pemasukan',
                'kategori' => 'Penjualan',
                'jumlah' => 150000,
                'tanggal' => '2026-10-24',
                'keterangan' => 'Tes',
            ]],
        ])->get(route('transactions.index'))
            ->assertOk()
            ->assertSee('Transaksi ditambahkan.')
            ->assertSee('Rp 150.000');
    }
}
