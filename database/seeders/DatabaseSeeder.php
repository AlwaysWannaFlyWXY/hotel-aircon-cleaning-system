<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $rooms = [];
        $timestamp = now();

        foreach (range(18, 31) as $floor) {
            foreach (range(1, 43) as $roomSuffix) {
                if ($roomSuffix === 4) {
                    continue;
                }

                $rooms[] = [
                    'number' => sprintf('%d%02d', $floor, $roomSuffix),
                    'floor' => $floor,
                    'status' => 'not_yet',
                    'created_at' => $timestamp,
                    'updated_at' => $timestamp,
                ];
            }
        }

        DB::table('rooms')->insertOrIgnore($rooms);
    }
}
