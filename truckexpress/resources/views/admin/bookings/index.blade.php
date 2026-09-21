@extends('admin.layout')

@section('title', 'Kelola Pemesanan - Admin Mukir Logistics')

@section('admin_content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem; flex-wrap: wrap; gap: 1rem;">
    <div>
        <h2 style="font-family: 'Outfit', sans-serif; font-size: 2rem; color: white; margin: 0;">Kelola Pemesanan</h2>
        <p style="color: var(--text-muted); margin: 0;">Daftar lengkap semua pemesanan truk oleh pelanggan.</p>
    </div>
    <div>
        <a href="{{ route('admin.bookings.create') }}" class="btn btn-accent" style="padding: 0.75rem 1.5rem; font-size: 0.95rem; border-radius: 8px;">
            ＋ Buat Booking Manual
        </a>
    </div>
</div>

<!-- Search & Filter Card -->
<div class="admin-card" style="padding: 1.5rem;">
    <form action="{{ route('admin.bookings.index') }}" method="GET" style="display: flex; gap: 1rem; flex-wrap: wrap; align-items: center;">
        <div style="flex: 1; min-width: 250px;">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan nama atau kode TRX-..." style="width: 100%; padding: 0.75rem; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: white;" />
        </div>
        
        <div style="width: 200px;">
            <select name="status" style="width: 100%; padding: 0.75rem; background: rgba(255,255,255,0.05); border: 1px solid rgba(255,255,255,0.1); border-radius: 8px; color: white;">
                <option value="">-- Semua Status --</option>
                <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Menunggu</option>
                <option value="approved" {{ request('status') == 'approved' ? 'selected' : '' }}>Disetujui</option>
                <option value="in_transit" {{ request('status') == 'in_transit' ? 'selected' : '' }}>Dalam Perjalanan</option>
                <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Selesai</option>
                <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Dibatalkan</option>
            </select>
        </div>
        
        <div style="display: flex; gap: 0.5rem;">
            <button type="submit" class="btn btn-accent" style="padding: 0.7rem 1.5rem; border-radius: 8px; font-size: 0.9rem;">Filter & Cari</button>
            @if(request('search') || request('status'))
                <a href="{{ route('admin.bookings.index') }}" class="btn btn-outline" style="padding: 0.7rem 1.5rem; border-radius: 8px; font-size: 0.9rem;">Reset</a>
            @endif
        </div>
    </form>
</div>

<!-- Main Table Card -->
<div class="admin-card">
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
                @forelse($bookings as $booking)
                    <tr>
                        <td style="font-family: monospace; font-weight: bold; color: var(--secondary);">{{ $booking->tracking_code }}</td>
                        <td>
                            <strong style="color: white;">{{ $booking->name }}</strong>
                            <div style="font-size: 0.8rem; color: var(--text-muted);">{{ $booking->phone }}</div>
                        </td>
                        <td>
                            <div style="font-size: 0.85rem;">Asal: {{ Str::limit($booking->origin, 45) }}</div>
                            <div style="font-size: 0.85rem; color: var(--text-muted);">Tujuan: {{ Str::limit($booking->destination, 45) }}</div>
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
                            <div style="display: flex; gap: 0.5rem; justify-content: flex-end;">
                                <a href="{{ route('admin.bookings.edit', $booking->id) }}" class="btn btn-primary" style="padding: 0.4rem 0.8rem; font-size: 0.8rem; border-radius: 6px;">
                                    Detail / Edit
                                </a>
                                
                                <form action="{{ route('admin.bookings.destroy', $booking->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesanan {{ $booking->tracking_code }} ini?');" style="display: inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-outline" style="padding: 0.4rem 0.8rem; font-size: 0.8rem; border-radius: 6px; border-color: rgba(239,68,68,0.4); color: #fca5a5; background: transparent;" onmouseover="this.style.background='rgba(239,68,68,0.1)'" onmouseout="this.style.background='transparent'">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" style="text-align: center; color: var(--text-muted); padding: 3rem;">Pemesanan tidak ditemukan.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <!-- Pagination links -->
    @if ($bookings->hasPages())
        <div style="margin-top: 2rem; display: flex; justify-content: center; gap: 0.25rem;">
            {{ $bookings->links('pagination::simple-bootstrap-4') }}
        </div>
    @endif
</div>
@endsection
