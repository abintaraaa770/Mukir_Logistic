@extends('layouts.app')

@title('Mukir Logistics - Sewa Truk Termo & AC')

@section('content')
<!-- Hero Section -->
<section id="beranda" class="hero">
    <div class="hero-bg">
        <img src="{{ asset('images/hero_truck.png') }}" alt="Modern Refrigerated Truck">
    </div>
    <div class="hero-overlay"></div>
    
    <div class="container hero-content animate-fade-up" style="opacity: 1; animation: fadeInUp 0.8s ease-out forwards;">
        <div class="hero-badge">Logistik Premium</div>
        <h1 style="font-size: 4rem; line-height: 1.1; margin-bottom: 1.5rem;">
            Sewa Truk Termo/AC <br> 
            <span class="text-gradient">& Sopir Profesional</span>
        </h1>
        <p style="font-size: 1.2rem; color: var(--text-muted); margin-bottom: 2.5rem;">
            Layanan pengiriman barang sensitif suhu untuk industri besar. Aman, terpercaya, melayani rute dalam kota maupun antar kota. Booking cepat dari platform kami.
        </p>
        <div class="hero-actions">
            <a href="{{ route('booking') }}" class="btn btn-accent">Booking Sekarang</a>
            <a href="{{ route('layanan') }}" class="btn btn-outline">Pelajari Lebih Lanjut</a>
        </div>
    </div>
</section>

<!-- Features Section -->
<section id="features" class="features">
    <div class="container">
        <div class="section-header" style="text-align: center; margin-bottom: 4rem;">
            <h2 class="section-title">Kenapa Memilih <span class="text-gradient">Mukir Logistics?</span></h2>
            <p class="section-subtitle">Kami menyediakan ekosistem logistik modern untuk memenuhi standar paling ketat dari bisnis Anda.</p>
        </div>

        <div class="features-grid">
            <div class="feature-card">
                <div class="feature-icon">🚛</div>
                <h3>Truk Termo/AC Modern</h3>
                <p>Menjaga barang dengan spesifikasi suhu khusus tetap segar dan aman selama perjalanan jauh.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">👨‍✈️</div>
                <h3>Sopir Profesional</h3>
                <p>Tim driver kami bersertifikasi, sangat berpengalaman, dan dilatih untuk standar keamanan tertinggi.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">⚡</div>
                <h3>Layanan Ekstra Cepat</h3>
                <p>Kecepatan dan ketepatan waktu pengiriman sangat diandalkan untuk industri skala besar.</p>
            </div>
            
            <div class="feature-card">
                <div class="feature-icon">🌐</div>
                <h3>Tracking Real-time</h3>
                <p>Sistem pemantauan canggih memungkinkan Anda melacak posisi barang secara real-time 24/7.</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="cta">
    <div class="container cta-content">
        <h2>Siap Melayani Skala Industri</h2>
        <p>Gabung dengan ribuan partner bisnis yang telah mempercayakan pengiriman mereka pada ekosistem Mukir Logistics.</p>
        <a href="{{ route('booking') }}" class="btn btn-accent" style="font-size: 1.2rem; padding: 1rem 3rem;">Mulai Pengiriman Hari Ini</a>
    </div>
</section>
@endsection
