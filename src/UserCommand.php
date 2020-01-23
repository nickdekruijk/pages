<?php

namespace NickDeKruijk\Pages;

use Illuminate\Console\Command;
use App\User;

class UserCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'pages:install {--model=Page : Model name (only changes filename, you need to change the class name inside the php file yourself)} {--table=pages : Table name for migration (only changes filename, you need to change the class and table name inside the php file yourself)} {--controller=PageController : Controller name (only changes filename, you need to change the class name inside the php file yourself)} {--force : Overwrite files if they exist}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Create a Page model, pages table migration and PageController";

    private function deleteFile($file)
    {
        if (file_exists(base_path($file))) {
            unlink(base_path($file));
            $this->info('Deleted <fg=yellow>[' . $file . ']');
        }
    }

    private function copyFile($source, $destination, $sourcePrefix = '/vendor/nickdekruijk/pages/src/')
    {
        $source = $sourcePrefix . $source;
        if (file_exists(base_path($destination)) && !$this->option('force')) {
            $this->info('Skipping <fg=yellow>[' . $destination . ']');
        } else {
            copy(base_path($source), base_path($destination));
            $this->info('Copied File <fg=yellow>[' . $source . ']<fg=green> To <fg=yellow>[' . $destination . ']');
        }
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Set migration file name
        $migrationFile = 'migrations/' . date('Y_m_d_His') . '_create_' . $this->option('table') . '_table.php';
        // Check if there is a create_pages_table migration already, if so, use that as migration name
        $migrationDir = opendir(database_path('migrations'));
        while ($file = readdir($migrationDir)) {
            if (substr($file, 18) == 'create_' . $this->option('table') . '_table.php') {
                $migrationFile = 'migrations/' . $file;
            }
        }
        closedir($migrationDir);
        // Copy migration
        $this->copyFile('migrations/create_pages_table.php', 'database/' . $migrationFile);

        // Copy other files
        $this->copyFile('Page.php', 'app/' . $this->option('model') . '.php');
        $this->copyFile('PageController.php', 'app/Http/Controllers/' . $this->option('controller') . '.php');
        $this->copyFile('views/main.blade.php', 'resources/views/main.blade.php');
        $this->copyFile('views/page.blade.php', 'resources/views/page.blade.php');
        if (!is_dir(base_path('resources/css'))) {
            mkdir(base_path('resources/css'));
        }
        $this->copyFile('views/utility.css', 'resources/css/utility.css');
        $this->copyFile('views/styles.scss', 'resources/css/styles.scss');
        $this->copyFile('views/scripts.js', 'resources/js/scripts.js');
        $this->copyFile('config.php', 'config/admin.php', 'vendor/nickdekruijk/admin/src/');

        // Create media folder inside public
        $mediaFolder = public_path('media');
        if (is_dir($mediaFolder)) {
            $this->info('Skipping Folder <fg=yellow>[public/media]');
        } elseif (file_exists($mediaFolder)) {
            $this->error('[public/media] is a file!');
        } else {
            mkdir($mediaFolder);
            $this->info('Created Folder <fg=yellow>[public/media]');
        }

        // Copy media/.gitignore
        if (is_dir($mediaFolder)) {
            $this->copyFile('media/.gitignore', 'public/media/.gitignore');
        }

        // Delete unused default Laravel js/sass/views
        $this->deleteFile('resources/js/app.js');
        $this->deleteFile('resources/js/bootstrap.js');
        $this->deleteFile('resources/sass/app.scss');
        $this->deleteFile('resources/views/welcome.blade.php');
        @rmdir(base_path('resources/sass/'));
    }
}
