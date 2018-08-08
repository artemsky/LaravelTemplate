<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Yaml\Yaml;

class GenerateEnv extends Command
{
    /**
     * The base path of the Laravel installation.
     *
     * @var string
     */
    protected $basePath;

    /**
     * The name of the project folder.
     *
     * @var string
     */
    protected $projectName;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'env:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize env configuration';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();

        $this->basePath = getcwd();
        $this->projectName = basename($this->basePath);
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    public function handle()
    {
        if (file_exists($this->basePath. "/.env")) {
            if ($this->choice(".env already exists. Wanna force creation?",
                ['Yes', 'No'], 1) === 'No') {
                return false;
            }
        }

        copy('.env.example', '.env');
        $this->call('key:generate');

        echo ".env successfully created";

        return true;
    }
}
