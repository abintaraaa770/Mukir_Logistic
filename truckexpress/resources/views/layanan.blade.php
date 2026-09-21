@extends('layouts.app')

@title('Layanan Kami - Mukir Logistics')

@section('content')
<div class="page-container page-layanan">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Layanan <span class="text-gradient">Unggulan</span> Kami</h2>
            <p class="section-subtitle">Solusi logistik berpendingin yang dirancang untuk menjaga kualitas bisnis Anda dari titik awal hingga tujuan akhir.</p>
        </div>

        <div class="services-grid mt-4">
            <!-- Service 1 -->
            <div class="service-detail-card">
                <div class="service-icon">❄️</div>
                <h3>Cold Chain Logistics</h3>
                <p>Layanan logistik rantai dingin end-to-end untuk menjaga kualitas produk makanan, minuman bersuhu khusus, dan hasil laut. Suhu dipertahankan secara konstan.</p>
                <ul class="service-features">
                    <li><span class="check">✓</span> Suhu Terpantau 24/7</li>
                    <li><span class="check">✓</span> Armada Premium Terawat</li>
                    <li><span class="check">✓</span> Sopir Tersertifikasi</li>
                </ul>
            </div>

            <!-- Service 2 -->
            <div class="service-detail-card">
                <div class="service-icon">💊</div>
                <h3>Distribusi Farmasi</h3>
                <p>Pengiriman obat-obatan dan vaksin yang membutuhkan penanganan khusus dan kontrol suhu ketat untuk memenuhi standar keamanan medis tingkat tinggi.</p>
                <ul class="service-features">
                    <li><span class="check">✓</span> Kalibrasi Suhu Akurat</li>
                    <li><span class="check">✓</span> Standar CPOB / GDP</li>
                    <li><span class="check">✓</span> Proteksi Higienis Maksimal</li>
                </ul>
            </div>

            <!-- Service 3 -->
            <div class="service-detail-card">
                <div class="service-icon">📅</div>
                <h3>Sewa Harian / Bulanan</h3>
                <p>Kami menawarkan fleksibilitas penyewaan truk pendingin secara harian maupun kontrak bulanan khusus untuk kebutuhan intensitas tinggi di B2B.</p>
                <ul class="service-features">
                    <li><span class="check">✓</span> Kontrak Fleksibel</li>
                    <li><span class="check">✓</span> Pilihan Driver / Lepas Kunci</li>
                    <li><span class="check">✓</span> Layanan Emergency 24 Jam</li>
                </ul>
            </div>

            <!-- Service 4 -->
            <div class="service-detail-card">
                <div class="service-icon">🗺️</div>
                <h3>Pengiriman Antar Kota</h3>
                <p>Layanan ekspedisi terintegrasi untuk pendistribusian lintas provinsi dengan rute terjadwal dan pelacakan armada real-time yang presisi.</p>
                <ul class="service-features">
                    <li><span class="check">✓</span> Jangkauan Luas Seluruh Jawa</li>
                    <li><span class="check">✓</span> Estimasi Tepat Waktu</li>
                    <li><span class="check">✓</span> Asuransi Pengiriman Penuh</li>
                </ul>
            </div>
        </div>
        
        <div class="text-center mt-5 mb-5">
            <a href="{{ route('booking') }}" class="btn btn-accent btn-wide mt-4">Pesan Layanan Sekarang</a>
        </div>
    </div>
</div>
@endsection
