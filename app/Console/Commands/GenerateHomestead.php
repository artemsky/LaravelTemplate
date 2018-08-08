<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Yaml\Yaml;

class GenerateHomestead extends Command
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
    protected $signature = 'homestead:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Initialize homestead configuration';

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
        if (file_exists($this->basePath. "/Homestead.yaml")) {
            if ($this->choice("Homestead config already exists. Wanna force creation?",
                ['Yes', 'No'], 1) === 'No') {
                return false;
            }
        }

        $content = Yaml::parse(file_get_contents('Homestead.yaml.example'));

        $ip = $this->ask('Enter IP Address:', '192.168.56.101');

        $ram = $this->ask('Enter RAM:', 2048);
        $host = $this->ask('Enter Hostname:', $content['sites'][0]['map'] ?? 'homestead.test');
        $database = $this->ask('Enter Database name:', $content['databases'][0]);

        $content['ip'] = $ip;
        $content['memory'] = $ram;
        $content['sites'][0]['map'] = $host;
        $content['folders'][0]['map'] = $this->basePath;
        $content['databases'][0] = $database;
        $content['name'] = $content['hostname'] = mb_strtolower($this->projectName);

        file_put_contents($this->basePath. "/Homestead.yaml", Yaml::dump($content, 3));

        echo "Homestead.yaml successfully created";

        return true;
    }
}
