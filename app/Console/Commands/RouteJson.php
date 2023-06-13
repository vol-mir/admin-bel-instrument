<?php

declare(strict_types=1);

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Route;

class RouteJson extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'route:json';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'My route json command';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $routes = $this->generateRoutes();
        $this->writeJson($routes);
    }

    public function generateRoutes(): array
    {
        $routes = [];
        foreach (Route::getRoutes()->getRoutes() as $route) {
            if (is_null($route->getName())) {
                continue;
            }
            if (isset($routes[$route->getName()])) {
                $this->comment('Overwriting duplicate named route: ' . $route->getName());
            }
            $routes[$route->getName()] = '/' . $route->uri();
        }

        return $routes;
    }

    protected function writeJson(array $routes): void
    {
        $filename = 'resources/json/routes.json';

        if (!$handle = fopen($filename, 'w')) {
            $this->error("Cannot open file: $filename");

            return;
        }

        if (fwrite($handle, (string) json_encode($routes)) === false) {
            $this->error("Cannot write to file: $filename");

            return;
        }

        $this->info("Wrote routes to: $filename");

        fclose($handle);
    }
}
