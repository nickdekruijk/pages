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

## Configuration
After installing for the first time publish the config file with 

`php artisan vendor:publish --tag=config --provider="NickDeKruijk\Pages\ServiceProvider"` 

A default config file called `pages.php` will be available in your Laravel `app/config` folder. See this file for more details.

### Run Migration
You need to run `php artisan migrate` to create the pages table.

### Add Routes
Add `Page::routes();` to your `routes/web.php` file.

### Dummy data
You can add some sample pages by running `php artisan db:seed --class=NickDeKruijk\\Pages\\PageSeeder`.

## License
Admin is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
