@extends('layouts.app')

@title('Booking Truk Pendingin - Mukir Logistics')

@section('content')
<div class="page-container page-booking">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Form <span class="text-gradient">Booking</span></h2>
            <p class="section-subtitle">Isi form di bawah ini. Data Anda akan disimpan dan dapat diproses melalui WhatsApp dengan cepat.</p>
        </div>
        
        <div class="booking-card">
            <!-- Display Validation Errors -->
            @if ($errors->any())
                <div style="background: rgba(239, 68, 68, 0.1); border: 1px solid rgba(239, 68, 68, 0.4); padding: 1.5rem; border-radius: 10px; margin-bottom: 2rem; color: #fca5a5;">
                    <strong style="display: block; margin-bottom: 0.5rem; font-family: 'Outfit', sans-serif;">Oops! Terjadi kesalahan input:</strong>
                    <ul style="list-style: inside; font-size: 0.95rem; line-height: 1.5;">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form class="booking-form" action="{{ route('booking.submit') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="name">Nama Lengkap / Perusahaan</label>
                    <input type="text" id="name" name="name" value="{{ old('name') }}" required placeholder="Masukkan nama Anda atau nama perusahaan" />
                </div>
                
                <div class="form-group">
                    <label for="phone">Nomor HP/WhatsApp</label>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required placeholder="Contoh: 081234567890" />
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="origin">Alamat Penjemputan (Asal)</label>
                        <textarea id="origin" name="origin" required placeholder="Detail alamat asal penjemputan barang">{{ old('origin') }}</textarea>
                    </div>
                    
                    <div class="form-group">
                        <label for="destination">Alamat Tujuan (Destinasi)</label>
                        <textarea id="destination" name="destination" required placeholder="Detail alamat tujuan pengiriman barang">{{ old('destination') }}</textarea>
                    </div>
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="truckType">Jenis Truk / Layanan</label>
                        <select id="truckType" name="truck_type">
                            <option value="Thermo 4 Roda" {{ old('truck_type') == 'Thermo 4 Roda' ? 'selected' : '' }}>Thermo 4 Roda (CDD Termo)</option>
                            <option value="Thermo 6 Roda" {{ old('truck_type') == 'Thermo 6 Roda' ? 'selected' : '' }}>Thermo 6 Roda (Fuso Termo Medium)</option>
                            <option value="Fuso Pendingin" {{ old('truck_type') == 'Fuso Pendingin' ? 'selected' : '' }}>Fuso Pendingin (Kapasitas Besar)</option>
                            <option value="Truk Khusus Farmasi" {{ old('truck_type') == 'Truk Khusus Farmasi' ? 'selected' : '' }}>Truk Khusus Farmasi (Kontrol Suhu Ketat)</option>
                        </select>
                    </div>
                    
                    <div class="form-group">
                        <label for="date">Tanggal Pengiriman</label>
                        <input type="date" id="date" name="date" value="{{ old('date', date('Y-m-d')) }}" required />
                    </div>
                </div>
                
                <button type="submit" class="btn btn-accent btn-wide mt-4">Kirim & Buat Pesanan</button>
            </form>
        </div>
    </div>
</div>
@endsection
