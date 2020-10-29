<?php

namespace App\Console\Commands\Build\Production;

use Illuminate\Console\Command;

class Refresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'build:production:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'It clean the database and the file storage disk and enter the real minimum production data';

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
     * @return int
     */
    public function handle()
    {
        if (!$this->confirm('You are about to destroy the production data, do you wish to continue?')) return 1;

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
        $this->info('- Inserting production information');
        $this->line('');
        
        $exitCode = $this->call('db:seed', [
            '--class' => 'ProductionDatabaseSeeder'
        ]);
        if ($exitCode > 0) return $exitCode;

        return $exitCode;
    }
}
