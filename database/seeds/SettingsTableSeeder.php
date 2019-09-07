<?php

use Illuminate\Database\Seeder;
use App\Setting;
class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'site_name'     => 'Book Store',
            'contact_number'=> '+20 0111 783 5451',
            'contact_email' => 'ahemdhegazy214@gmail.com',
            'address'       => 'Eqy - Sohag - gehena',
            'about'       => 'This is my lorm text '
        ]);
    }
}
