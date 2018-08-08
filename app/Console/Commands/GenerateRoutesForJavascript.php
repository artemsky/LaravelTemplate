<?php

namespace App\Console\Commands;

use File;
use Illuminate\Routing\Router;
use Illuminate\Console\Command;

class GenerateRoutesForJavascript extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'routes:generate {--path=}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Generate json routes object for javascript integration';

    protected $router;


    /**
     * GenerateRoutesForJavascript constructor.
     * @param Router $router
     */
    public function __construct(Router $router)
    {
        parent::__construct();

        $this->router = $router;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $path = $this->option('path') ?? env('ROUTES_JSON_PATH') ??  'resources/assets/js/common/routes.json';

        $exclude = [
            'debugbar'
        ];

        $routes = [];

        foreach ($this->router->getRoutes() as $route) {
            $name = $route->getName();
            if (strlen($name) && !str_contains($name, $exclude)) {
                $routes[$name] = $route->uri();
            }
        }
        File::put($path, json_encode($routes, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_FORCE_OBJECT));

        return;
    }
}
