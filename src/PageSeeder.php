<?php

namespace LaraPages\Pages;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function lorem($faker, $p = null) {
            $l = '';
            if (!$p) $p = mt_rand(3,5);
            for($i=1; $i<=$p; $i++)
                $l.='<p>'.$faker->paragraph(mt_rand(4,10)).'</p>';
            return $l;
        }
        $faker = Faker::create();
        Page::truncate();
        Page::create([ 'body' => lorem($faker), 'title' => 'Home', 'slug' => '/', 'background' => 'photos/1024x768.jpg|Background caption', 'pictures' => "photos/1024x768.jpg|Beach|Test\nphotos/402809_ojo.jpg|Eye\nphotos/788639_67311638.jpg|Leafs\nphotos/Road.jpg"]);
        Page::create([ 'body' => lorem($faker), 'title' => 'About']);
        $products = Page::create([ 'body' => lorem($faker), 'title' => 'Products']);
        Page::create([ 'body' => lorem($faker), 'parent' => $products->id, 'title' => 'Product A']);
        $b = Page::create([ 'body' => lorem($faker), 'parent' => $products->id, 'title' => 'Product B']);
        Page::create([ 'body' => lorem($faker), 'parent' => $b->id, 'title' => 'Product B.1', 'menuitem' => false]);
        Page::create([ 'body' => lorem($faker), 'parent' => $b->id, 'title' => 'Product B.2', 'menuitem' => false, 'active' => false]);
        Page::create([ 'body' => lorem($faker), 'parent' => $b->id, 'title' => 'Product B.3', 'menuitem' => false, 'home' => true]);
        Page::create([ 'body' => lorem($faker), 'parent' => $products->id, 'title' => 'Product C']);
        Page::create([ 'body' => lorem($faker), 'title' => 'Contact']);
    }
}
