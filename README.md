[![Latest Stable Version](https://poser.pugx.org/nickdekruijk/pages/v/stable)](https://packagist.org/packages/nickdekruijk/pages)
[![Latest Unstable Version](https://poser.pugx.org/nickdekruijk/pages/v/unstable)](https://packagist.org/packages/nickdekruijk/pages)
[![Monthly Downloads](https://poser.pugx.org/nickdekruijk/pages/d/monthly)](https://packagist.org/packages/nickdekruijk/pages)
[![Total Downloads](https://poser.pugx.org/nickdekruijk/pages/downloads)](https://packagist.org/packages/nickdekruijk/pages)
[![License](https://poser.pugx.org/nickdekruijk/pages/license)](https://packagist.org/packages/nickdekruijk/pages)

# Pages
A Laravel 6 Page model, migration and controller. It can be used as a foundation for a website. A basic view with navigation and a footer is also included.

## Installation
After a clean Laravel 6.x installation and configuring your database install the package with:

`composer require --dev nickdekruijk/pages`

Depending on your project you may need some or all of these packages too (remove what you don't need):

`composer require nickdekruijk/admin nickdekruijk/settings nickdekruijk/minify doctrine/dbal laravel/helpers arcanedev/laravel-lang`

Then run the following command to create a Page model, PageController, migration and media folder. Add `-h` to see more options on how to change the default names.

`php artisan pages:install`

Review the new `database/migrations/yyyy_mm_dd_hhmmss_create_pages_table.php` migration file and adapt to your needs, then run the migration to create the pages table with:

`php artisan migrate`

### Create admin user
Create a user with admin privileges using:

`php artisan admin:user user@domain.com`

### Add Routes
Add `Route::get('{any}', 'PageController@route')->where('any', '(.*)');` to your `routes/web.php` file.

### Dummy data
You can add some sample pages by running `php artisan db:seed --class=NickDeKruijk\\Pages\\PageSeeder`

## License
Admin is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
