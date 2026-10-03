{{-- Pengukur tinggi genangan. Diisi oleh public/js/laporbanjir.js --}}
<aside class="gauge-panel" aria-label="Perkiraan tinggi genangan pada tubuh orang dewasa">
    <h2>Perkiraan tinggi genangan</h2>

    <div class="gauge-wrap">
        <div class="gauge" data-gauge data-max="200" data-cm="{{ (int) ($cm ?? 0) }}">
            <div class="gauge-water" data-gauge-water></div>
        </div>
        <ul class="gauge-marks" aria-hidden="true">
            <li style="--at: 10%">Mata kaki (20 cm)</li>
            <li style="--at: 25%">Lutut (50 cm)</li>
            <li style="--at: 50%">Pinggang (100 cm)</li>
            <li style="--at: 75%">Dada (150 cm)</li>
        </ul>
    </div>

    <p class="readout" aria-live="polite">
        <span data-gauge-value>0</span> <small>cm</small><br>
        <span class="badge" data-gauge-badge data-tingkat="kosong">Belum diisi</span>
    </p>
</aside>
