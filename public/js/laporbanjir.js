(function () {
    'use strict';

    // Batas kategori sama dengan yang dipakai Controller (LaporBanjirController::tingkat)
    function tingkatDari(cm) {
        if (!(cm > 0)) return { kode: 'kosong', label: 'Belum diisi' };
        if (cm <= 30) return { kode: 'rendah', label: 'Rendah' };
        if (cm <= 70) return { kode: 'sedang', label: 'Sedang' };
        if (cm <= 120) return { kode: 'tinggi', label: 'Tinggi' };
        return { kode: 'sangat-tinggi', label: 'Sangat tinggi' };
    }

    // Pengukur tinggi genangan
    var gauge = document.querySelector('[data-gauge]');
    if (gauge) {
        var maks = Number(gauge.dataset.max) || 200;
        var air = gauge.querySelector('[data-gauge-water]');
        var nilai = document.querySelector('[data-gauge-value]');
        var badge = document.querySelector('[data-gauge-badge]');
        var input = document.getElementById('tinggi_genangan');

        var render = function (cm) {
            cm = Number.isFinite(cm) && cm > 0 ? cm : 0;
            var persen = Math.min((cm / maks) * 100, 100);
            var t = tingkatDari(cm);
            air.style.height = persen + '%';
            nilai.textContent = cm;
            badge.textContent = t.label;
            badge.dataset.tingkat = t.kode;
        };

        if (input) {
            render(parseInt(input.value, 10));
            input.addEventListener('input', function () {
                render(parseInt(input.value, 10));
            });
        } else {
            render(Number(gauge.dataset.cm));
        }
    }

    // Cegah kirim ganda saat form dikirim
    var form = document.getElementById('form-lapor');
    var tombol = document.getElementById('tombol-kirim');
    if (form && tombol) {
        form.addEventListener('submit', function () {
            tombol.disabled = true;
            tombol.textContent = 'Mengirim...';
        });
        // Aktifkan lagi jika pengguna kembali ke halaman ini lewat tombol Back
        window.addEventListener('pageshow', function () {
            tombol.disabled = false;
            tombol.textContent = 'Kirim laporan';
        });
    }
})();
