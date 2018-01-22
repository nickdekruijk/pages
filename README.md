# LaraPages/Pages
A Laravel 5 Page model, migration and controller. It can be used as a foundation for a website with navigation and a footer. A basic view is also included.

## Installation
To install the package use

`composer require larapages/pages`

### Run Migration
You need to run `php artisan migrate` to create the pages table.

### Add Routes
Add `Page::routes();` to your `routes/web.php` file.

### Dummy data
You can add some sample pages by running `php artisan db:seed --class=LaraPages\\Pages\\PageSeeder`.

## License
LaraPages is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).