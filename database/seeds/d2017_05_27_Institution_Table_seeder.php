<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class d2017_05_27_Institution_Table_seeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('institutions')->insert([
            'institution_name' => 'Dakota State University',
            'logo' => 'https://onlinelearningconsortium.org/wp-content/themes/olc/assets/img/logo.png',
            'website' => 'http://onlinelearningconsortium.org/',
            'ipeds_id' => 1141,
            'description' => 'orem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra congue suscipit. Pellentesque augue sem, venenatis bibendum ullamcorper vitae, fermentum eu urna. Nunc sit amet justo quis lorem pretium fermentum. Curabitur vel interdum purus. Ut nec nulla enim. Nulla vestibulum mattis consectetur. Donec ac pellentesque nunc. Ut commodo porttitor ante, ut mollis libero congue id. Sed suscipit hendrerit facilisis. Aliquam erat volutpat. Aliquam efficitur tincidunt blandit. Praesent consectetur at tellus sit amet scelerisque.',
            'system_id' => 1,
            'admin_id' => 2,
            ]);
        DB::table('institutions')->insert([
            'institution_name' => 'Austin Peay State University',
            'logo' => 'https://onlinelearningconsortium.org/wp-content/themes/olc/assets/img/logo.png',
            'website' => 'http://onlinelearningconsortium.org/',
            'ipeds_id' => 1145,
            'description' => 'orem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra congue suscipit. Pellentesque augue sem, venenatis bibendum ullamcorper vitae, fermentum eu urna. Nunc sit amet justo quis lorem pretium fermentum. Curabitur vel interdum purus. Ut nec nulla enim. Nulla vestibulum mattis consectetur. Donec ac pellentesque nunc. Ut commodo porttitor ante, ut mollis libero congue id. Sed suscipit hendrerit facilisis. Aliquam erat volutpat. Aliquam efficitur tincidunt blandit. Praesent consectetur at tellus sit amet scelerisque.',
            'system_id' => 2,
            'admin_id' => 3,
        ]);
        DB::table('institutions')->insert([
            'institution_name' => 'Ford Motor Corporation HR',
            'logo' => 'https://onlinelearningconsortium.org/wp-content/themes/olc/assets/img/logo.png',
            'website' => 'http://onlinelearningconsortium.org/',
            'ipeds_id' => 1197,
            'description' => 'orem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam viverra congue suscipit. Pellentesque augue sem, venenatis bibendum ullamcorper vitae, fermentum eu urna. Nunc sit amet justo quis lorem pretium fermentum. Curabitur vel interdum purus. Ut nec nulla enim. Nulla vestibulum mattis consectetur. Donec ac pellentesque nunc. Ut commodo porttitor ante, ut mollis libero congue id. Sed suscipit hendrerit facilisis. Aliquam erat volutpat. Aliquam efficitur tincidunt blandit. Praesent consectetur at tellus sit amet scelerisque.',
            'system_id' => 3,
            'admin_id' => 4,
        ]);
    }
}
