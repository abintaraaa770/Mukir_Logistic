@extends('admin.layout')

@section('title', 'Edit Booking ' . $booking->tracking_code . ' - Admin')

@section('admin_content')
<div style="margin-bottom: 2rem;">
    <a href="{{ route('admin.bookings.index') }}" style="color: var(--secondary); text-decoration: none; font-size: 0.9rem;">&larr; Kembali ke Daftar</a>
    <h2 style="font-family: 'Outfit', sans-serif; font-size: 2rem; color: white; margin-top: 0.5rem; margin-bottom: 0.25rem;">
        Edit Booking: <span class="text-gradient" style="font-family: monospace;">{{ $booking->tracking_code }}</span>
    </h2>
    <p style="color: var(--text-muted); margin: 0;">Perbarui detail pemesanan, penugasan sopir, dan live koordinat GPS tracking.</p>
</div>

<!-- Display Validation Errors -->
@if ($errors->any())
    <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.4); padding: 1.5rem; border-radius: 10px; margin-bottom: 2rem; color: #fca5a5;">
        <strong style="display: block; margin-bottom: 0.5rem;">Oops! Terjadi kesalahan input:</strong>
        <ul style="list-style: inside; font-size: 0.95rem;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="admin-card">
    <form class="booking-form" action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.2rem; color: white; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 0.5rem; margin-bottom: 1.5rem;">1. Detail Pengirim</h3>
        
        <div class="form-group">
            <label for="name">Nama Lengkap / Perusahaan</label>
            <input type="text" id="name" name="name" value="{{ old('name', $booking->name) }}" required placeholder="Contoh: PT ABC Indonesia" />
        </div>
        
        <div class="form-group">
            <label for="phone">Nomor HP/WhatsApp</label>
            <input type="tel" id="phone" name="phone" value="{{ old('phone', $booking->phone) }}" required placeholder="Contoh: 081234567890" />
        </div>
        
        <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.2rem; color: white; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 0.5rem; margin-bottom: 1.5rem; margin-top: 2rem;">2. Rute & Detail Kargo</h3>

        <div class="form-row">
            <div class="form-group">
                <label for="origin">Alamat Penjemputan (Asal)</label>
                <textarea id="origin" name="origin" required placeholder="Detail alamat asal penjemputan">{{ old('origin', $booking->origin) }}</textarea>
            </div>
            
            <div class="form-group">
                <label for="destination">Alamat Tujuan (Destinasi)</label>
                <textarea id="destination" name="destination" required placeholder="Detail alamat tujuan pengiriman">{{ old('destination', $booking->destination) }}</textarea>
            </div>
        </div>
        
        <div class="form-row">
            <div class="form-group">
                <label for="truck_type">Jenis Truk / Layanan</label>
                <select id="truck_type" name="truck_type">
                    <option value="Thermo 4 Roda" {{ old('truck_type', $booking->truck_type) == 'Thermo 4 Roda' ? 'selected' : '' }}>Thermo 4 Roda</option>
                    <option value="Thermo 6 Roda" {{ old('truck_type', $booking->truck_type) == 'Thermo 6 Roda' ? 'selected' : '' }}>Thermo 6 Roda</option>
                    <option value="Fuso Pendingin" {{ old('truck_type', $booking->truck_type) == 'Fuso Pendingin' ? 'selected' : '' }}>Fuso Pendingin</option>
                    <option value="Truk Khusus Farmasi" {{ old('truck_type', $booking->truck_type) == 'Truk Khusus Farmasi' ? 'selected' : '' }}>Truk Khusus Farmasi (Suhu Ketat)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="date">Tanggal Pengiriman</label>
                <input type="date" id="date" name="date" value="{{ old('date', $booking->date->format('Y-m-d')) }}" required />
            </div>
        </div>

        <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.2rem; color: white; border-bottom: 1px solid rgba(255,255,255,0.05); padding-bottom: 0.5rem; margin-bottom: 1.5rem; margin-top: 2rem;">3. Status & Penugasan Armada</h3>

        <div class="form-row">
            <div class="form-group">
                <label for="status">Status Pengiriman</label>
                <select id="status" name="status">
                    <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>Menunggu Persetujuan (Pending)</option>
                    <option value="approved" {{ old('status', $booking->status) == 'approved' ? 'selected' : '' }}>Pemesanan Disetujui (Approved)</option>
                    <option value="in_transit" {{ old('status', $booking->status) == 'in_transit' ? 'selected' : '' }}>Dalam Perjalanan (In Transit)</option>
                    <option value="completed" {{ old('status', $booking->status) == 'completed' ? 'selected' : '' }}>Selesai Terkirim (Completed)</option>
                    <option value="cancelled" {{ old('status', $booking->status) == 'cancelled' ? 'selected' : '' }}>Dibatalkan (Cancelled)</option>
                </select>
            </div>
            
            <div class="form-group">
                <label for="driver_name">Nama Pengemudi (Sopir)</label>
                <input type="text" id="driver_name" name="driver_name" value="{{ old('driver_name', $booking->driver_name) }}" placeholder="Contoh: Budi Santoso" />
            </div>
        </div>

        <div class="form-row">
            <div class="form-group">
                <label for="plate_number">Nomor Polisi (Plat Nomor)</label>
                <input type="text" id="plate_number" name="plate_number" value="{{ old('plate_number', $booking->plate_number) }}" placeholder="Contoh: B 1234 CDG" />
            </div>
            
            <div class="form-group">
                <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 1rem;">
                    <div>
                        <label for="tracking_lat">Lintang GPS (Latitude)</label>
                        <input type="text" id="tracking_lat" name="tracking_lat" value="{{ old('tracking_lat', $booking->tracking_lat) }}" placeholder="Contoh: -6.2088" />
                    </div>
                    <div>
                        <label for="tracking_lng">Bujur GPS (Longitude)</label>
                        <input type="text" id="tracking_lng" name="tracking_lng" value="{{ old('tracking_lng', $booking->tracking_lng) }}" placeholder="Contoh: 106.8456" />
                    </div>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="notes">Catatan Tambahan (Internal/Instruksi Suhu)</label>
            <textarea id="notes" name="notes" placeholder="Catatan opsional dari admin atau permintaan khusus pelanggan...">{{ old('notes', $booking->notes) }}</textarea>
        </div>

        <button type="submit" class="btn btn-accent btn-wide mt-4" style="font-size: 1rem;">Perbarui Detail Booking</button>
    </form>
</div>

<!-- GPS Helpers Card -->
<div class="admin-card" style="margin-top: 2rem;">
    <h4 style="font-family: 'Outfit', sans-serif; color: white; margin-bottom: 0.5rem;">💡 Tips Live Tracking</h4>
    <p style="color: var(--text-muted); font-size: 0.9rem; line-height: 1.5;">
        Untuk melakukan tracking live, masukkan koordinat Latitude & Longitude lokasi terkini armada. Berikut contoh koordinat kota-kota besar di Indonesia yang bisa Anda gunakan untuk testing:
    </p>
    <ul style="color: var(--text-muted); font-size: 0.85rem; margin-top: 0.75rem; list-style: inside; line-height: 1.6;">
        <li><strong>Jakarta (SCBD)</strong>: <code style="color: var(--secondary); font-family: monospace;">-6.2238</code>, <code style="color: var(--secondary); font-family: monospace;">106.8122</code></li>
        <li><strong>Bandung</strong>: <code style="color: var(--secondary); font-family: monospace;">-6.9175</code>, <code style="color: var(--secondary); font-family: monospace;">107.6191</code></li>
        <li><strong>Cirebon</strong>: <code style="color: var(--secondary); font-family: monospace;">-6.7320</code>, <code style="color: var(--secondary); font-family: monospace;">108.5523</code></li>
        <li><strong>Semarang</strong>: <code style="color: var(--secondary); font-family: monospace;">-6.9667</code>, <code style="color: var(--secondary); font-family: monospace;">110.4167</code></li>
        <li><strong>Surabaya</strong>: <code style="color: var(--secondary); font-family: monospace;">-7.2575</code>, <code style="color: var(--secondary); font-family: monospace;">112.7521</code></li>
    </ul>
</div>
@endsection
