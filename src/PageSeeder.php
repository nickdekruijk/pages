<?php

namespace LaraPages\Pages;

use Illuminate\Database\Seeder;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Page::truncate();
        Page::create([ 'title' => 'Home', 'slug' => '/' ]);
        Page::create([ 'title' => 'About']);
        $products = Page::create([ 'title' => 'Products']);
        Page::create([ 'parent' => $products->id, 'title' => 'Product A']);
        $b = Page::create([ 'parent' => $products->id, 'title' => 'Product B']);
        Page::create([ 'parent' => $b->id, 'title' => 'Product B.1', 'menuitem' => false]);
        Page::create([ 'parent' => $b->id, 'title' => 'Product B.2', 'menuitem' => false, 'active' => false]);
        Page::create([ 'parent' => $b->id, 'title' => 'Product B.3', 'menuitem' => false, 'home' => true]);
        Page::create([ 'parent' => $products->id, 'title' => 'Product C']);
        Page::create([ 'title' => 'Contact']);
    }
}
