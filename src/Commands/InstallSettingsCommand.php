<?php

namespace Hesto\MultiAuth\Commands;

use Hesto\Core\Commands\AppendContentCommand;
use Symfony\Component\Console\Input\InputOption;


class InstallProviderCommand extends AppendContentCommand
{
    /**
     * The console command name.
     *
     * @var string
     */
    protected $name = 'multi-auth:settings';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install settings in files';

    /**
     * Get the destination path.
     *
     * @return string
     */
    public function getFiles()
    {
        return [
            'guard' => [
                'path' => '/config/auth.php',
                'search' => "'guards' => [",
                'append' => __DIR__ . '/../stubs/config/guards.stub',
            ],
            'provider' => [
                'path' => '/config/auth.php',
                'search' => "'providers' => [",
                'append' => __DIR__ . '/../stubs/config/providers.stub',
            ],
            'kernel' => [
                'path' => '/app/Http/Kernel.php',
                'search' => 'protected $routeMiddleware = [',
                'append' => __DIR__ . '/../stubs/Middleware/Kernel.stub',
            ],
        ];
    }
}
