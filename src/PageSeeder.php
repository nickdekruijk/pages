<?php

namespace NickDeKruijk\Pages;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        function lorem($faker, $p = null)
        {
            $l = '';
            if (!$p) $p = mt_rand(3, 5);
            for ($i = 1; $i <= $p; $i++)
                $l .= '<p>' . $faker->paragraph(mt_rand(4, 10)) . '</p>';
            return $l;
        }

        $faker = Faker::create();

        Page::truncate();
        Page::create(['body' => lorem($faker), 'title' => 'Home', 'slug' => '/']);
        Page::create(['body' => lorem($faker), 'title' => 'About']);
        $products = Page::create(['body' => lorem($faker), 'title' => 'Products']);
        Page::create(['body' => lorem($faker), 'parent' => $products->id, 'title' => 'Product A', 'menuitem' => false, 'home' => true]);
        Page::create(['body' => lorem($faker), 'parent' => $products->id, 'title' => 'Product B', 'menuitem' => false]);
        Page::create(['body' => lorem($faker), 'parent' => $products->id, 'title' => 'Product C', 'menuitem' => false]);
        Page::create(['body' => lorem($faker), 'title' => 'Contact']);
    }
}
