import {
  createIcons, LayoutDashboard, Briefcase, ArrowLeftRight, Newspaper, BookOpen, Bookmark,
  User, LogOut, Menu, X, Users, FileText, ChevronDown, Plus, Trash2, Wallet,
  TrendingUp, TrendingDown, Percent,
} from 'lucide';

createIcons({
  icons: {
    LayoutDashboard, Briefcase, ArrowLeftRight, Newspaper, BookOpen, Bookmark,
    User, LogOut, Menu, X, Users, FileText, ChevronDown, Plus, Trash2, Wallet,
    TrendingUp, TrendingDown, Percent,
  },
});

const $ = (s, r = document) => r.querySelector(s);
const $$ = (s, r = document) => [...r.querySelectorAll(s)];

// Sidebar (layar kecil)
const sidebar = $('#sidebar');
const overlay = $('#overlay');
const setSidebar = (open) => {
  if (!sidebar) return;
  sidebar.classList.toggle('-translate-x-full', !open);
  if (overlay) overlay.classList.toggle('hidden', !open);
};
$$('[data-open-sidebar]').forEach((b) => b.addEventListener('click', () => setSidebar(true)));
$$('[data-close-sidebar]').forEach((b) => b.addEventListener('click', () => setSidebar(false)));
if (overlay) overlay.addEventListener('click', () => setSidebar(false));

// Dropdown pilihan usaha
$$('[data-dropdown]').forEach((btn) => {
  const menu = document.getElementById(btn.dataset.dropdown);
  btn.addEventListener('click', (e) => {
    e.stopPropagation();
    const hidden = menu.classList.toggle('hidden');
    btn.setAttribute('aria-expanded', String(!hidden));
  });
  document.addEventListener('click', () => {
    menu.classList.add('hidden');
    btn.setAttribute('aria-expanded', 'false');
  });
});

// Form contoh (halaman statis, belum terhubung ke database)
$$('form[data-demo]').forEach((f) =>
  f.addEventListener('submit', (e) => {
    e.preventDefault();
    if (f.dataset.redirect) {
      window.location.href = f.dataset.redirect;
      return;
    }
    alert('Prototipe tanpa database: data tidak disimpan.');
  })
);

// Tombol bookmark contoh
$$('[data-bookmark]').forEach((b) =>
  b.addEventListener('click', () => {
    const on = b.getAttribute('aria-pressed') !== 'true';
    b.setAttribute('aria-pressed', String(on));
    b.querySelector('span').textContent = on ? 'Tersimpan' : 'Simpan ke bookmark';
  })
);

// Pratinjau format rupiah di input jumlah
const rupiah = new Intl.NumberFormat('id-ID');
$$('[data-rupiah]').forEach((input) => {
  const out = document.getElementById(input.dataset.rupiah);
  const show = () => {
    const n = parseInt(input.value, 10);
    out.textContent = n > 0 ? 'Rp ' + rupiah.format(n) : '';
  };
  input.addEventListener('input', show);
  show();
});

// Filter jenis transaksi
const filterBtns = $$('[data-filter]');
const rows = $$('[data-jenis]');
filterBtns.forEach((btn) =>
  btn.addEventListener('click', () => {
    const f = btn.dataset.filter;
    filterBtns.forEach((b) => {
      const on = b === btn;
      b.setAttribute('aria-pressed', String(on));
      b.classList.toggle('bg-finbisku-gold-100', on);
      b.classList.toggle('text-finbisku-gold-600', on);
      b.classList.toggle('text-neutral-600', !on);
    });
    rows.forEach((r) => r.classList.toggle('hidden', f !== 'semua' && r.dataset.jenis !== f));
  })
);
