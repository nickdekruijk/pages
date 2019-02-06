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

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Copy Page.php model
        $modelFile = base_path('app/' . $this->option('model') . '.php');
        if (file_exists($modelFile) && !$this->option('force')) {
            $this->error($modelFile . ' exists');
        } else {
            copy(__DIR__ . '/Page.php', $modelFile);
            $this->info('Created ' . $modelFile);
        }

        // Set migration file name
        $migrationFile = database_path('migrations/' . date('Y_m_d_His') . '_create_' . $this->option('table') . '_table.php');
        // Check if there is a create_pages_table migration already, if so, use that as migration name
        $migrationDir = opendir(database_path('migrations'));
        while($file = readdir($migrationDir)) {
            if (substr($file, 18) == 'create_' . $this->option('table') . '_table.php') {
                $migrationFile = database_path('migrations/' . $file);
            }
        }
        closedir($migrationDir);
        // Copy migration file
        if (file_exists($migrationFile) && !$this->option('force')) {
            $this->error($migrationFile . ' exists');
        } else {
            copy(__DIR__ . '/migrations/create_pages_table.php', $migrationFile);
            $this->info('Created ' . $migrationFile);
        }

        // Copy PageController.php
        $controllerFile = base_path('app/Http/Controllers/' . $this->option('controller') . '.php');
        if (file_exists($controllerFile) && !$this->option('force')) {
            $this->error($controllerFile . ' exists');
        } else {
            copy(__DIR__ . '/PageController.php', $controllerFile);
            $this->info('Created ' . $controllerFile);
        }
    }
}
