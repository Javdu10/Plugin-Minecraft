<?php

namespace Azuriom\Plugin\Minecraft\Providers;

use Azuriom\Models\User;
use Azuriom\Providers\GameServiceProvider;
use Azuriom\Plugin\Minecraft\Observers\UserObserver;
use Azuriom\Plugin\Minecraft\Games\MinecraftOnlineGame;
use Azuriom\Extensions\Plugin\BasePluginServiceProvider;
use Azuriom\Plugin\Minecraft\Games\MinecraftBedrockGame;
use Azuriom\Plugin\Minecraft\Games\MinecraftOfflineGame;
use Azuriom\Plugin\Minecraft\Middlewares\IsGameInstalled;

class MinecraftServiceProvider extends BasePluginServiceProvider
{
    /**
     * The plugin's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        IsGameInstalled::class,
    ];

    /**
     * The plugin's route middleware groups.
     *
     * @var array
     */
    protected $middlewareGroups = [];

    /**
     * The plugin's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        // 'example' => \Azuriom\Plugin\Minecraft\Middleware\ExampleRouteMiddleware::class,
    ];

    /**
     * The policy mappings for this plugin.
     *
     * @var array
     */
    protected $policies = [
        // User::class => UserPolicy::class,
    ];

    /**
     * Register any plugin services.
     *
     * @return void
     */
    public function register()
    {
        require_once __DIR__.'/../../vendor/autoload.php';

        $this->registerMiddlewares();

        GameServiceProvider::registerGames([
            'mc-online' => MinecraftOnlineGame::class,
            'mc-offline' => MinecraftOfflineGame::class,
            'mc-bedrock' => MinecraftBedrockGame::class,
        ]);
    }

    /**
     * Bootstrap any plugin services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->registerPolicies();

        $this->loadViews();

        $this->loadTranslations();

        $this->loadMigrations();

        $this->registerRouteDescriptions();

        $this->registerAdminNavigation();

        $this->registerUserNavigation();

        User::observe(UserObserver::class);
    }

    /**
     * Returns the routes that should be able to be added to the navbar.
     *
     * @return array
     */
    protected function routeDescriptions()
    {
        return [
            //
        ];
    }

    /**
     * Return the admin navigations routes to register in the dashboard.
     *
     * @return array
     */
    protected function adminNavigation()
    {
        return [
            'minecraft' => [
                'name' => 'Minecraft',
                'type' => 'dropdown',
                'icon' => 'fas fa-gamepad',
                'route' => 'minecraft.admin.*',
                'items' => [
                    'minecraft.admin.settings' => 'Settings',
                ],
            ],
        ];
    }

    /**
     * Return the user navigations routes to register in the user menu.
     *
     * @return array
     */
    protected function userNavigation()
    {
        return [
            //
        ];
    }
}
