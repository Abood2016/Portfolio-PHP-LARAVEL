<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Auth;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $settings = Setting::create([
            'site_title' => 'Web development',
            'job_title' => 'PHP-LARAVEL-DEVELOPER',
            'location' => 'Palestine , Gaza-Strip',
            'twitter_url' => 'https://twitter.com/AbedElR74857478',
            'linkdin_url' => 'https://twitter.com/AbedElR74857478',
            'facebook_url' => 'https://twitter.com/AbedElR74857478',
            'about' => 'lurem ipsum',

        ]);
    }
}
