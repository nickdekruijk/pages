[![Latest Stable Version](https://poser.pugx.org/nickdekruijk/pages/v/stable)](https://packagist.org/packages/nickdekruijk/pages)
[![Latest Unstable Version](https://poser.pugx.org/nickdekruijk/pages/v/unstable)](https://packagist.org/packages/nickdekruijk/pages)
[![Monthly Downloads](https://poser.pugx.org/nickdekruijk/pages/d/monthly)](https://packagist.org/packages/nickdekruijk/pages)
[![Total Downloads](https://poser.pugx.org/nickdekruijk/pages/downloads)](https://packagist.org/packages/nickdekruijk/pages)
[![License](https://poser.pugx.org/nickdekruijk/pages/license)](https://packagist.org/packages/nickdekruijk/pages)

# Pages
A Laravel 5.5+ Page model, migration and controller. It can be used as a foundation for a website with navigation and a footer. A basic view is also included.

## Installation
To install the package use

`composer require nickdekruijk/pages`

## Usage
First of all let Laravel generate a Page model, migration and PageController using
`php artisan make:model -cm Page`
Open the new controller file at `app/Http/Controllers/PageController.php` and let it extend \NickDeKruijk\Pages\PageController
```php
class PageController extends \NickDeKruijk\Pages\PageController
```
Open the new model file at `app/Page.php` file and let it extend \NickDeKruijk\Pages\Page
```php
class Page extends \NickDeKruijk\Pages\Page
```
Open the migration file at `database/migrations/yyyy_mm_dd_hhmmss_create_pages_table.php` and add something like this between the default $table->increments('id') and $table->timestamps() lines:
```php
            $table->integer('parent')->nullable()->unsigned();
            $table->boolean('active')->default(1);
            $table->boolean('menuitem')->default(1);
            $table->boolean('home')->default(0);
            $table->string('view', 100)->nullable();
            $table->string('title');
            $table->string('head')->nullable();
            $table->string('html_title', 65)->nullable();
            $table->string('keywords')->nullable();
            $table->string('slug', 100)->nullable();
            $table->text('description')->nullable();
            $table->date('date')->nullable();
            $table->longText('images')->nullable();
            $table->string('background')->nullable();
            $table->string('video_id', 100)->nullable();
            $table->longText('body')->nullable();
            $table->integer('sort')->default(0)->unsigned();

            $table->softDeletes();

            $table->index(['active', 'parent', 'sort']);
            $table->foreign('parent')->references('id')->on('pages');
```

### Run Migration
You need to run `php artisan migrate` to create the pages table.

### Add Routes
Add `Route::get('{any}', 'PageController@route')->where('any', '(.*)');` to your `routes/web.php` file.

### Dummy data
You can add some sample pages by running `php artisan db:seed --class=NickDeKruijk\\Pages\\PageSeeder`.

## License
Admin is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
