[![Latest Stable Version](https://poser.pugx.org/larapages/pages/v/stable)](https://packagist.org/packages/larapages/pages)
[![Latest Unstable Version](https://poser.pugx.org/larapages/pages/v/unstable)](https://packagist.org/packages/larapages/pages)
[![Monthly Downloads](https://poser.pugx.org/larapages/pages/d/monthly)](https://packagist.org/packages/larapages/pages)
[![Total Downloads](https://poser.pugx.org/larapages/pages/downloads)](https://packagist.org/packages/larapages/pages)
[![License](https://poser.pugx.org/larapages/pages/license)](https://packagist.org/packages/larapages/pages)

# LaraPages/Pages
A Laravel 5.5+ Page model, migration and controller. It can be used as a foundation for a website with navigation and a footer. A basic view is also included.

## Installation
To install the package use

`composer require larapages/pages`

## Configuration
After installing for the first time publish the config file with 

`php artisan vendor:publish --tag=config --provider="LaraPages\Pages\ServiceProvider"` 

A default config file called `pages.php` will be available in your Laravel `app/config` folder. See this file for more details.

### Run Migration
You need to run `php artisan migrate` to create the pages table.

### Add Routes
Add `Page::routes();` to your `routes/web.php` file.

### Dummy data
You can add some sample pages by running `php artisan db:seed --class=LaraPages\\Pages\\PageSeeder`.

## License
LaraPages is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).