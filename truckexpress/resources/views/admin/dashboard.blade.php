@extends('admin.layout')

@section('title', 'Dashboard Admin - Mukir Logistics')

@section('admin_content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
    <div>
        <h2 style="font-family: 'Outfit', sans-serif; font-size: 2rem; color: white; margin: 0;">Dashboard</h2>
        <p style="color: var(--text-muted); margin: 0;">Ringkasan aktivitas operasional pengiriman barang.</p>
    </div>
    <div>
        <a href="{{ route('admin.bookings.create') }}" class="btn btn-accent" style="padding: 0.75rem 1.5rem; font-size: 0.95rem; border-radius: 8px;">
            ＋ Buat Booking Manual
        </a>
    </div>
</div>

<!-- Stats Grid -->
<div class="stats-grid">
    <div class="stat-card" style="border-top: 4px solid var(--secondary);">
        <h4>Total Pesanan</h4>
        <div class="value">{{ $stats['total'] }}</div>
    </div>
    
    <div class="stat-card" style="border-top: 4px solid #eab308;">
        <h4>Menunggu</h4>
        <div class="value" style="color: #fef08a;">{{ $stats['pending'] }}</div>
    </div>
    
    <div class="stat-card" style="border-top: 4px solid #3b82f6;">
        <h4>Disetujui</h4>
        <div class="value" style="color: #bfdbfe;">{{ $stats['approved'] }}</div>
    </div>
    
    <div class="stat-card" style="border-top: 4px solid #06b6d4;">
        <h4>Dalam Rute</h4>
        <div class="value" style="color: #cffafe;">{{ $stats['in_transit'] }}</div>
    </div>
    
    <div class="stat-card" style="border-top: 4px solid #10b981;">
        <h4>Selesai</h4>
        <div class="value" style="color: #a7f3d0;">{{ $stats['completed'] }}</div>
    </div>
</div>

<!-- Recent Bookings Table Card -->
<div class="admin-card">
    <h3 style="font-family: 'Outfit', sans-serif; font-size: 1.3rem; color: white; margin-bottom: 1.5rem; display: flex; align-items: center; justify-content: space-between;">
        <span>📦 Pesanan Terbaru</span>
        <a href="{{ route('admin.bookings.index') }}" style="color: var(--secondary); font-size: 0.85rem; text-decoration: none;">Lihat Semua &rarr;</a>
    </h3>
    
    <div style="overflow-x: auto;">
        <table class="admin-table">
            <thead>
                <tr>
                    <th>Kode</th>
                    <th>Nama/Perusahaan</th>
                    <th>Rute</th>
                    <th>Tipe Truk</th>
                    <th>Tanggal Kirim</th>
                    <th>Status</th>
                    <th style="text-align: right;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($recentBookings as $booking)
                    <tr>
                        <td style="font-family: monospace; font-weight: bold; color: var(--secondary);">{{ $booking->tracking_code }}</td>
                        <td>
                            <strong style="color: white;">{{ $booking->name }}</strong>
                            <div style="font-size: 0.8rem; color: var(--text-muted);">{{ $booking->phone }}</div>
                        </td>
                        <td>
                            <div style="font-size: 0.9rem;">Asal: {{ Str::limit($booking->origin, 40) }}</div>
                            <div style="font-size: 0.9rem; color: var(--text-muted);">Tujuan: {{ Str::limit($booking->destination, 40) }}</div>
                        </td>
                        <td>{{ $booking->truck_type }}</td>
                        <td>{{ $booking->date->format('d M Y') }}</td>
                        <td>
                            @if($booking->status == 'pending')
                                <span class="badge badge-pending">Menunggu</span>
                            @elseif($booking->status == 'approved')
                                <span class="badge badge-approved">Disetujui</span>
                            @elseif($booking->status == 'in_transit')
                                <span class="badge badge-transit">Dalam Rute</span>
                            @elseif($booking->status == 'completed')
                                <span class="badge badge-completed">Selesai</span>
                            @elseif($booking->status == 'cancelled')
                                <span class="badge badge-cancelled">Batal</span>
                            @endif
                        </td>
                        <td style="text-align: right;">
                            <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-primary" style="padding: 0.4rem 0.8rem; font-size: 0.8rem; border-radius: 6px;">
                                Detail / Edit
                            </a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 2rem;">Belum ada pesanan masuk.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
