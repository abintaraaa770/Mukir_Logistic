@extends('layouts.app')

@title('Hubungi Kami - Mukir Logistics')

@section('content')
<div class="page-container page-contact">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Hubungi <span class="text-gradient">Kami</span></h2>
            <p class="section-subtitle">Punya pertanyaan seputar layanan kami? Tim representatif Mukir Logistics siap sedia membantu Anda.</p>
        </div>

        <div class="contact-wrapper mt-4">
            <!-- Contact Info Panel -->
            <div class="contact-info">
                <div class="info-item">
                    <div class="info-icon">📍</div>
                    <div>
                        <h3>Kantor Pusat</h3>
                        <p>Jl. Jend. Sudirman No. 123, SCBD, Jakarta Selatan, 12190</p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">📞</div>
                    <div>
                        <h3>Telepon / HP</h3>
                        <p>+62 21 8888 9999<br>+62 812 3456 7890 (WhatsApp)</p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">✉️</div>
                    <div>
                        <h3>Email</h3>
                        <p>hello@mukirlogistics.id<br>support@mukirlogistics.id</p>
                    </div>
                </div>
                
                <div class="info-item">
                    <div class="info-icon">⏰</div>
                    <div>
                        <h3>Jam Operasional</h3>
                        <p>Senin - Jumat: 08.00 - 18.00 WIB<br>Layanan Tracking & Support: 24/7</p>
                    </div>
                </div>
            </div>
            
            <!-- Quick Actions Panel -->
            <div class="contact-action">
                <div class="action-card">
                    <h3>Ingin Respon Cepat?</h3>
                    <p>Tim support kami siap membalas dalam hitungan menit lewat WhatsApp bisnis kami.</p>
                    <a href="https://wa.me/6281234567890?text=Halo%20Mukir%20Logistics%2C%20saya%20punya%20pertanyaan%20mengenai%20sewa%20truk." target="_blank" rel="noreferrer" class="btn btn-accent mt-3">Chat via WhatsApp</a>
                </div>
                
                <div class="action-card mt-3">
                    <h3>Butuh Kerja Sama Bisnis?</h3>
                    <p>Konsultasikan kebutuhan logistik jangka panjang perusahaan Anda bersama ahli kami.</p>
                    <a href="mailto:hello@mukirlogistics.id?subject=Permintaan%20Kerjasama%20Logistik" class="btn btn-outline mt-3">Kirim Email B2B</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
