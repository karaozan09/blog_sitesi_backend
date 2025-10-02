<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FooterSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('settings')->insert([
            [
                'id'            => 1,
                'logo'          => '',
                'background_image' => '',
                'footer_title'  => '',
                'footer_text'   => 'Tüm Hakları Saklıdır',
                'email'         => 'karaozanb@gmail.com',
                'phone_number'  => '0544 112 2323',
                'address'       => 'Burj Khalifa/Çelik Malikanesi',
                'created_at'    => now(),
                'updated_at'    => now(),
            ],
        ]);
    }
}
