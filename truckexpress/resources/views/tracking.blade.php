@extends('layouts.app')

@title('Lacak Pengiriman - Mukir Logistics')

@section('content')
<div class="page-container page-booking">
    <div class="container animate-fade-up">
        <div class="section-header">
            <h2 class="section-title">Lacak <span class="text-gradient">Pengiriman</span></h2>
            <p class="section-subtitle">Masukkan kode lacak unik (TRX-XXXXX) Anda untuk memantau status perjalanan dan posisi GPS armada secara real-time.</p>
        </div>

        <!-- Search Form Card -->
        <div class="booking-card" style="max-width: 600px; margin-bottom: 3rem;">
            <form action="{{ route('tracking') }}" method="GET" class="booking-form">
                <div class="form-group">
                    <label for="code">Kode Lacak (Tracking Code)</label>
                    <div style="display: flex; gap: 1rem; align-items: center;">
                        <input type="text" id="code" name="code" value="{{ $code ?? '' }}" required placeholder="Contoh: TRX-12345" style="flex: 1; margin: 0; font-family: monospace; font-size: 1.2rem;" />
                        <button type="submit" class="btn btn-accent" style="border-radius: 10px; padding: 0.9rem 2rem;">Cari</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Search Results -->
        @if ($searched)
            @if ($booking)
                <div class="booking-card animate-fade-up" style="max-width: 800px; padding: 2.5rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; border-bottom: 1px solid rgba(255,255,255,0.1); padding-bottom: 1.5rem; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
                        <div>
                            <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.5rem; color: white;">Status Pengiriman</h3>
                            <span style="font-size: 0.9rem; color: var(--text-muted); font-family: monospace;">Kode: {{ $booking->tracking_code }}</span>
                        </div>
                        <div>
                            <!-- Status Badges -->
                            @if ($booking->status == 'pending')
                                <span style="background: rgba(234, 179, 8, 0.2); border: 1px solid #eab308; color: #fef08a; padding: 0.5rem 1.2rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem;">Menunggu Persetujuan</span>
                            @elseif ($booking->status == 'approved')
                                <span style="background: rgba(59, 130, 246, 0.2); border: 1px solid #3b82f6; color: #bfdbfe; padding: 0.5rem 1.2rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem;">Pemesanan Disetujui</span>
                            @elseif ($booking->status == 'in_transit')
                                <span style="background: rgba(6, 182, 212, 0.2); border: 1px solid #06b6d4; color: #cffafe; padding: 0.5rem 1.2rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem;">Dalam Perjalanan (Live)</span>
                            @elseif ($booking->status == 'completed')
                                <span style="background: rgba(16, 185, 129, 0.2); border: 1px solid #10b981; color: #a7f3d0; padding: 0.5rem 1.2rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem;">Selesai Terkirim</span>
                            @elseif ($booking->status == 'cancelled')
                                <span style="background: rgba(239, 68, 68, 0.2); border: 1px solid #ef4444; color: #fecaca; padding: 0.5rem 1.2rem; border-radius: 50px; font-weight: 600; font-size: 0.9rem;">Dibatalkan</span>
                            @endif
                        </div>
                    </div>

                    <!-- Details Grid -->
                    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1.5rem; margin-bottom: 2rem; text-align: left;">
                        <div style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); padding: 1rem; border-radius: 10px;">
                            <span style="font-size: 0.8rem; color: var(--text-muted); display: block; margin-bottom: 0.25rem;">Pengemudi (Sopir)</span>
                            <strong style="color: white;">{{ $booking->driver_name ?? 'Belum Ditugaskan' }}</strong>
                        </div>
                        <div style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); padding: 1rem; border-radius: 10px;">
                            <span style="font-size: 0.8rem; color: var(--text-muted); display: block; margin-bottom: 0.25rem;">Plat Nomor Truk</span>
                            <strong style="color: white; font-family: monospace; font-size: 1rem;">{{ $booking->plate_number ?? 'Belum Tersedia' }}</strong>
                        </div>
                        <div style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); padding: 1rem; border-radius: 10px;">
                            <span style="font-size: 0.8rem; color: var(--text-muted); display: block; margin-bottom: 0.25rem;">Jenis Truk</span>
                            <strong style="color: white;">{{ $booking->truck_type }}</strong>
                        </div>
                        <div style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); padding: 1rem; border-radius: 10px;">
                            <span style="font-size: 0.8rem; color: var(--text-muted); display: block; margin-bottom: 0.25rem;">Tanggal Kirim</span>
                            <strong style="color: white;">{{ $booking->date->format('d M Y') }}</strong>
                        </div>
                    </div>

                    <!-- Origin & Destination -->
                    <div style="background: rgba(255,255,255,0.02); border: 1px solid rgba(255,255,255,0.05); padding: 1.5rem; border-radius: 10px; text-align: left; margin-bottom: 2rem;">
                        <h4 style="font-family: 'Outfit', sans-serif; font-size: 1.1rem; color: white; margin-bottom: 1rem;">Detail Rute Perjalanan</h4>
                        <div style="display: flex; flex-direction: column; gap: 1rem; position: relative;">
                            <div>
                                <span style="color: var(--secondary); font-weight: bold; margin-right: 0.5rem;">● Asal:</span>
                                <span style="color: var(--text-main);">{{ $booking->origin }}</span>
                            </div>
                            <div style="border-left: 2px dashed rgba(255,255,255,0.15); margin-left: 5px; height: 15px;"></div>
                            <div>
                                <span style="color: #ef4444; font-weight: bold; margin-right: 0.5rem;">■ Tujuan:</span>
                                <span style="color: var(--text-main);">{{ $booking->destination }}</span>
                            </div>
                        </div>
                    </div>

                    <!-- Live Tracking Map Section -->
                    <div style="text-align: left; margin-top: 2rem;">
                        <h4 style="font-family: 'Outfit', sans-serif; font-size: 1.2rem; color: white; margin-bottom: 1rem; display: flex; align-items: center; gap: 0.5rem;">
                            📍 Peta Pelacakan Live GPS
                        </h4>
                        
                        @if ($booking->tracking_lat && $booking->tracking_lng)
                            <div style="border: 1px solid rgba(255,255,255,0.1); border-radius: 12px; overflow: hidden; box-shadow: 0 10px 30px rgba(0,0,0,0.5);">
                                <iframe 
                                    src="https://maps.google.com/maps?q={{ $booking->tracking_lat }},{{ $booking->tracking_lng }}&z=12&output=embed" 
                                    width="100%" 
                                    height="400" 
                                    style="border:0; display: block;" 
                                    allowfullscreen="" 
                                    loading="lazy">
                                </iframe>
                            </div>
                            <span style="display: block; font-size: 0.8rem; color: var(--text-muted); margin-top: 0.5rem; text-align: right; font-family: monospace;">
                                Koordinat GPS: {{ $booking->tracking_lat }}, {{ $booking->tracking_lng }}
                            </span>
                        @else
                            <div style="background: rgba(255,255,255,0.03); border: 1px dashed rgba(255,255,255,0.1); padding: 3rem 1.5rem; border-radius: 12px; text-align: center; color: var(--text-muted);">
                                <div style="font-size: 2.5rem; margin-bottom: 1rem;">📡</div>
                                <p style="font-weight: 500; color: white; margin-bottom: 0.25rem;">GPS Belum Aktif</p>
                                <p style="font-size: 0.9rem; max-width: 500px; margin: 0 auto;">Peta pelacakan live akan otomatis ditampilkan di sini setelah armada pengiriman berada dalam status perjalanan (In Transit) dan GPS diaktifkan oleh admin.</p>
                            </div>
                        @endif
                    </div>
                </div>
            @else
                <div class="booking-card animate-fade-up" style="max-width: 600px; text-align: center; border-color: rgba(239, 68, 68, 0.4); background: rgba(239, 68, 68, 0.05);">
                    <div style="font-size: 3rem; color: #ef4444; margin-bottom: 1rem;">⚠️</div>
                    <h3 style="font-family: 'Outfit', sans-serif; color: white; margin-bottom: 0.5rem;">Kode Tidak Ditemukan</h3>
                    <p style="color: var(--text-muted); font-size: 0.95rem;">Maaf, kode tracking <strong>"{{ $code }}"</strong> tidak terdaftar di sistem kami. Mohon pastikan penulisan kode sudah benar (contoh: TRX-83719).</p>
                </div>
            @endif
        @endif
    </div>
</div>
@endsection
