document.addEventListener('DOMContentLoaded', function () {
    var form = document.getElementById('form-laporan');
    if (!form) return;

    var tinggi = document.getElementById('tinggi');

    // Cegah karakter yang tidak diperlukan pada input angka bulat
    tinggi.addEventListener('keydown', function (e) {
        if (['e', 'E', '+', '-', '.', ','].includes(e.key)) {
            e.preventDefault();
        }
    });

    // Cegah pengiriman ganda saat tombol ditekan berkali-kali
    form.addEventListener('submit', function () {
        var tombol = form.querySelector('button[type="submit"]');
        tombol.disabled = true;
        tombol.textContent = 'Mengirim...';
    });
});
