<?php

namespace Database\Seeders;

use App\Models\Advertiser;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdvertiserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $advertisers = [
            [
                'name'  => 'Pull & Bear',
                'email' => 'pullandbear@gmail.com'
            ],
            [
                'name'  => 'Stradivary',
                'email' => 'strad@gmail.com'
            ],
            [
                'name'  => 'Defacto',
                'email' => 'defacto@gmail.com'
            ]
        ];

        foreach ($advertisers as $advertiser) {
            Advertiser::create([
                'name'  => $advertiser['name'],
                'email' => $advertiser['email']
            ]);
        }
    }
}
