<?php

use App\Models\Basic\Basic;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class BasicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        Basic::insert([
        ['name' => 'logo', 'value' => '1465483977.8192.png'],
        ['name' => 'site_name', 'value' => 'Lara Blog'],
        ['name' => 'tag_name', 'value' => 'Secure Blogging System'],
        ['name' => 'contact', 'value' => "<h2>Lara Blog</h2>
                <p>New Hamfare</p>
                <div>120, new Banker's row</div>
                <p>Dhaka</p>
                <p>Bangladesh</p>"],
        ['name' => 'twitter', 'value' => 'http://twitter.com/xcoder'],
        ['name' => 'instagram', 'value' => 'https://www.instagram.com/'],
        ['name' => 'linkedin', 'value' => 'https://www.linkedin.com/'],
        ['name' => 'facebook', 'value' => 'http://facebook.com/xcoder'],
        ['name' => 'google-plus', 'value' => 'https://plus.google.com/'],
        ['name' => 'copyright', 'value' => 'copyright@xcoder.io All Right Reserved'],
        ['name' => 'services_head', 'value' => 'Lara Services'],
        ['name' => 'services', 'value' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."],
        ['name' => 'about', 'value' => "Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged."],
        ['name' => 'disqus', 'value' => "larablogs"],
        ['name' => 'banner','value' => '<img class="img-responsive img-rounded" src="/images/banner.png" alt="banner" width="100%" height="30px"/>'],
        ['name' => 'sidebar','value' => '<img class="img-responsive img-rounded" src="/images/sidebar.png" alt="banner" width="100%" height="30px"/>'],
        ['name' => 'single','value' => '<img style="margin-top:50px" class="img-responsive img-rounded" src="/images/banner.png" alt="banner" width="100%"/>']
        ]);
    }
}
