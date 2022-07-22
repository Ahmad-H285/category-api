<?php

namespace Database\Seeders;

use App\Models\Ad;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ads')->insert([
            'type' => 'paid',
            'title' => 'Buy one get one',
            'description' => 'Buy your first t-shirt get the other for free for a limited time',
            'category' => 1,
            'tags' => 'clothes,t-shirts',
            'advertiser' => 1
        ]);

        DB::table('ads')->insert([
            'type' => 'free',
            'title' => 'Get first for free',
            'description' => 'Get first item for free',
            'category' => 2,
            'tags' => 'clothes,t-shirts',
            'advertiser' => 2
        ]);
    }
}
