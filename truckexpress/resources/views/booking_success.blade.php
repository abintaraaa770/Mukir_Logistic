@extends('layouts.app')

@title('Booking Berhasil - Mukir Logistics')

@section('content')
<div class="page-container page-booking">
    <div class="container animate-fade-up">
        <div class="section-header">
            <h2 class="section-title">Booking <span class="text-gradient">Berhasil!</span></h2>
            <p class="section-subtitle">Pesanan Anda telah disimpan di sistem kami. Silakan klik tombol di bawah untuk berdiskusi dengan admin melalui WhatsApp.</p>
        </div>

        <div class="booking-card" style="max-width: 600px; text-align: center;">
            <div style="font-size: 4rem; color: #10b981; margin-bottom: 1.5rem;">🎉</div>
            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.8rem; margin-bottom: 0.5rem; color: white;">
                Kode Lacak Anda:
            </h3>
            <div style="background: rgba(0, 224, 255, 0.1); border: 1px dashed var(--secondary); padding: 1rem 2rem; border-radius: 10px; display: inline-block; font-size: 2rem; font-family: 'Outfit', sans-serif; font-weight: 800; letter-spacing: 2px; color: var(--secondary); margin-bottom: 2rem;">
                {{ $booking->tracking_code }}
            </div>

            <!-- Booking details summary -->
            <div style="background: rgba(255, 255, 255, 0.03); border: 1px solid rgba(255, 255, 255, 0.05); border-radius: 10px; padding: 1.5rem; text-align: left; margin-bottom: 2rem;">
                <table style="width: 100%; border-collapse: collapse; font-size: 0.95rem; color: var(--text-muted);">
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td style="padding: 0.75rem 0; font-weight: 600; color: white; width: 40%;">Perusahaan / Nama</td>
                        <td style="padding: 0.75rem 0;">: {{ $booking->name }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td style="padding: 0.75rem 0; font-weight: 600; color: white;">Nomor HP/WA</td>
                        <td style="padding: 0.75rem 0;">: {{ $booking->phone }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td style="padding: 0.75rem 0; font-weight: 600; color: white;">Rute</td>
                        <td style="padding: 0.75rem 0;">: {{ $booking->origin }} &rarr; {{ $booking->destination }}</td>
                    </tr>
                    <tr style="border-bottom: 1px solid rgba(255,255,255,0.05);">
                        <td style="padding: 0.75rem 0; font-weight: 600; color: white;">Jenis Layanan</td>
                        <td style="padding: 0.75rem 0;">: {{ $booking->truck_type }}</td>
                    </tr>
                    <tr>
                        <td style="padding: 0.75rem 0; font-weight: 600; color: white;">Tanggal Kirim</td>
                        <td style="padding: 0.75rem 0;">: {{ $booking->date->format('d M Y') }}</td>
                    </tr>
                </table>
            </div>

            <!-- WhatsApp redirection code -->
            @php
                $waNumber = '6281234567890'; // Default admin WhatsApp number
                $message = "Halo Mukir Logistics, saya ingin melakukan konfirmasi booking pengiriman:\n\n" .
                           "*Kode Lacak*: " . $booking->tracking_code . "\n" .
                           "*Nama/Perusahaan*: " . $booking->name . "\n" .
                           "*Nomor HP*: " . $booking->phone . "\n" .
                           "*Alamat Asal*: " . $booking->origin . "\n" .
                           "*Alamat Tujuan*: " . $booking->destination . "\n" .
                           "*Tipe Truk*: " . $booking->truck_type . "\n" .
                           "*Tanggal Pengiriman*: " . $booking->date->format('d-m-Y') . "\n\n" .
                           "Mohon info status & tindak lanjutnya. Terima kasih!";
                $waUrl = "https://wa.me/" . $waNumber . "?text=" . urlencode($message);
            @endphp

            <div style="display: flex; flex-direction: column; gap: 1rem;">
                <a href="{{ $waUrl }}" target="_blank" class="btn btn-accent btn-wide" style="background: linear-gradient(135deg, #25d366 0%, #128c7e 100%); box-shadow: 0 4px 15px rgba(37, 211, 102, 0.3);">
                    💬 Kirim Konfirmasi ke WhatsApp
                </a>
                
                <a href="{{ route('tracking', ['code' => $booking->tracking_code]) }}" class="btn btn-outline btn-wide">
                    🌐 Pantau Status Pengiriman (Live Tracking)
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
