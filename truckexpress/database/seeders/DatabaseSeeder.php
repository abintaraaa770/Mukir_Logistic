<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Booking;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Seed Admin User
        User::updateOrCreate(
            ['email' => 'admin@mukirlogistics.com'],
            [
                'name' => 'Administrator',
                'password' => Hash::make('password123'),
            ]
        );

        // 2. Seed Mock Bookings
        Booking::create([
            'tracking_code' => 'TRX-83719',
            'name' => 'PT Indofood CBP',
            'phone' => '081122334455',
            'origin' => 'Pabrik Cikarang, Bekasi, Jawa Barat',
            'destination' => 'Gudang Distribusi, Bandung, Jawa Barat',
            'truck_type' => 'Thermo 6 Roda',
            'date' => now()->addDays(2),
            'status' => 'pending',
            'notes' => 'Harap suhu pendingin dijaga ketat di kisaran 2-8 derajat celcius.',
        ]);

        Booking::create([
            'tracking_code' => 'TRX-10928',
            'name' => 'Kimia Farma Tbk',
            'phone' => '085678901234',
            'origin' => 'Kawasan Industri Pulogadung, Jakarta Timur',
            'destination' => 'Rumah Sakit Umum Daerah, Surakarta, Jawa Tengah',
            'truck_type' => 'Truk Khusus Farmasi',
            'date' => now()->subDays(1),
            'status' => 'in_transit',
            'driver_name' => 'Hendro Prasetyo',
            'plate_number' => 'B 9201 SQA',
            'tracking_lat' => -6.914744, // Coordinates near Bandung
            'tracking_lng' => 107.609810,
            'notes' => 'Pengiriman vaksin BCG, suhu chiller harus di 4 derajat celcius.',
        ]);

        Booking::create([
            'tracking_code' => 'TRX-55421',
            'name' => 'PT Unilever Indonesia',
            'phone' => '081299887766',
            'origin' => 'Kawasan Industri Jababeka, Bekasi',
            'destination' => 'Supermarket Utama, Jakarta Pusat',
            'truck_type' => 'Thermo 4 Roda',
            'date' => now()->subDays(3),
            'status' => 'completed',
            'driver_name' => 'Agus Subagyo',
            'plate_number' => 'B 3821 KLA',
            'notes' => 'Pengiriman es krim Wall\'s selesai dengan aman tanpa kendala suhu.',
        ]);

        Booking::create([
            'tracking_code' => 'TRX-99887',
            'name' => 'CV Makmur Jaya',
            'phone' => '081344556677',
            'origin' => 'Pasar Induk Kramat Jati, Jakarta',
            'destination' => 'Gudang Buah Segar, Bogor',
            'truck_type' => 'Thermo 4 Roda',
            'date' => now()->addDays(5),
            'status' => 'approved',
            'driver_name' => 'Rian Hidayat',
            'plate_number' => 'F 1122 CC',
            'notes' => 'Buah-buahan segar import.',
        ]);
    }
}
