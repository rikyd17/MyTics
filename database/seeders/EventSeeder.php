<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            1 => [
                'title' => 'FARMER MARKET',
                'date' => '20-23 FEBRUARI • 06:00 WIB',
                'location' => 'Kebun Buah dan Sayur',
                'price' => 'Rp 20.000',
                'image' => 'images/1.jpg',
            ],
            2 => [
                'title' => 'Pameran Seni Nasional',
                'date' => '20 April 2023 • 10:00 WIB',
                'location' => 'Gedung Kesenian',
                'price' => 'Rp 150.000',
                'image' => 'images/2.jpg',
            ],
            3 => [
                'title' => 'TECHNOLOGY EVENT',
                'date' => '19 OKTOBER 2025 • 08:00 WIB',
                'location' => 'Tech Center Jakarta',
                'price' => 'Rp 100.000',
                'image' => 'images/3.jpg',
            ],
            4 => [
                'title' => 'RUN AND FUN',
                'date' => '24 April 2025 • 07:00 WIB',
                'location' => 'Alun-alun Kota',
                'price' => 'Rp 30.000',
                'image' => 'images/4.jpg',
            ],
            5 => [
                'title' => 'WINTER FESTIVAL at BANDUNG',
                'date' => '10-12 DESEMBER 2025 • 11:00 WIB',
                'location' => 'Bandung Convention Center',
                'price' => 'Rp 150.000',
                'image' => 'images/5.jpg',
            ],
            6 => [
                'title' => 'Pameran Seni Indonesia',
                'date' => '16 November 2025 • 07:00-15:00 WIB',
                'location' => 'Museum Nasional',
                'price' => 'Rp 25.000',
                'image' => 'images/6.jpg',
            ],
        ];

        foreach ($events as $event) {
            // Parse date and time from the date string
            // Example date string: "20-23 FEBRUARI • 06:00 WIB" or "20 April 2023 • 10:00 WIB"
            $dateStr = $event['date'];
            $timeStr = '00:00:00';

            // Extract time if present
            if (preg_match('/(\d{1,2}:\d{2})/', $dateStr, $matches)) {
                $timeStr = $matches[1] . ':00';
            }

            // Extract date part (remove time and WIB)
            $datePart = preg_replace('/•.*$/', '', $dateStr);
            $datePart = trim($datePart);

            // Attempt to parse datePart to Y-m-d format using Carbon
            try {
                // Replace Indonesian month names with English equivalents for parsing
                $months = [
                    'JANUARI' => 'January',
                    'FEBRUARI' => 'February',
                    'MARET' => 'March',
                    'APRIL' => 'April',
                    'MEI' => 'May',
                    'JUNI' => 'June',
                    'JULI' => 'July',
                    'AGUSTUS' => 'August',
                    'SEPTEMBER' => 'September',
                    'OKTOBER' => 'October',
                    'NOVEMBER' => 'November',
                    'DESEMBER' => 'December',
                ];
                $datePartUpper = strtoupper($datePart);
                foreach ($months as $id => $en) {
                    $datePartUpper = str_replace($id, $en, $datePartUpper);
                }
                // Handle date ranges like "20-23 February"
                if (preg_match('/(\d{1,2})-(\d{1,2}) (.+)/', $datePartUpper, $rangeMatches)) {
                    $day = $rangeMatches[1];
                    $monthYear = $rangeMatches[3];
                    $dateParsed = Carbon::parse($day . ' ' . $monthYear);
                } else {
                    $dateParsed = Carbon::parse($datePartUpper);
                }
                $dateFormatted = $dateParsed->format('Y-m-d');
            } catch (\Exception $e) {
                $dateFormatted = now()->format('Y-m-d');
            }

            // Convert price string "Rp 20.000" to decimal 20000.00
            $priceStr = str_replace(['Rp', '.', ' '], '', $event['price']);
            $priceDecimal = floatval($priceStr);

            DB::table('events')->insert([
                'name' => $event['title'],
                'date' => $dateFormatted,
                'time' => $timeStr,
                'price' => $priceDecimal,
                'location' => $event['location'],
                'image' => $event['image'],
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
