<?php

namespace App\Console\Commands\Build\Development;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Storage;

class Stress extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'build:development:stress';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It clean the database and enter 5 millions of data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->line('');
        $this->info('- Migrating');
        $this->line('');

        $exitCode = $this->call('migrate:refresh');

        if ($exitCode > 0) return $exitCode;

        $this->line('');
        $this->info('- Generating Passport Encryption Keys');
        $this->line('');
        $exitCode = $this->call('passport:install', [
            '--force' => true
        ]);

        if ($exitCode > 0) return $exitCode;

        $this->line('');
        $this->info('- Inserting stressful data');
        $this->line('');
        $exitCode = $this->call('db:seed', [
            '--class' => 'StressDatabaseSeeder'
        ]);

        if ($exitCode > 0) return $exitCode;

        return $exitCode;
    }
}
