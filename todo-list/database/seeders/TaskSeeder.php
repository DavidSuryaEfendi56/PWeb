<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TaskSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('tasks')->insert([
            [
                'title' => 'Submit laporan bulanan',
                'type' => 'Work',
                'description' => 'Kumpulkan laporan keuangan bulan ini',
                'due_date' => '2025-07-20',
                'priority' => 'High',
                'location' => 'Office',
                'reminder_at' => Carbon::parse('2025-07-19 10:00'),
                'is_urgent' => true,
                'notes' => 'Harus selesai sebelum meeting',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Olahraga pagi',
                'type' => 'Health',
                'description' => 'Jalan kaki 30 menit di taman',
                'due_date' => '2025-07-16',
                'priority' => 'Medium',
                'location' => 'Taman Kota',
                'reminder_at' => Carbon::parse('2025-07-16 06:00'),
                'is_urgent' => false,
                'notes' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Belanja mingguan',
                'type' => 'Personal',
                'description' => 'Beli sayur, buah, dan kebutuhan rumah',
                'due_date' => '2025-07-17',
                'priority' => 'Low',
                'location' => 'Pasar Tradisional',
                'reminder_at' => Carbon::parse('2025-07-17 08:30'),
                'is_urgent' => false,
                'notes' => 'Cek promo di aplikasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Meeting dengan klien',
                'type' => 'Work',
                'description' => 'Bahas proposal proyek baru',
                'due_date' => '2025-07-18',
                'priority' => 'High',
                'location' => 'Zoom',
                'reminder_at' => Carbon::parse('2025-07-18 14:00'),
                'is_urgent' => true,
                'notes' => 'Siapkan presentasi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Periksa kesehatan rutin',
                'type' => 'Health',
                'description' => 'Medical check-up tahunan',
                'due_date' => '2025-07-22',
                'priority' => 'Medium',
                'location' => 'Rumah Sakit',
                'reminder_at' => Carbon::parse('2025-07-22 09:00'),
                'is_urgent' => false,
                'notes' => '',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
