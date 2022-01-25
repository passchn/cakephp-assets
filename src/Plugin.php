<?php
declare(strict_types=1);

namespace Assets;

use Cake\Core\BasePlugin;
use Cake\Core\Configure;
use Cake\Core\PluginApplicationInterface;

/**
 * Plugin for Assets
 */
class Plugin extends BasePlugin
{
    /**
     * Load all the plugin configuration and bootstrap logic.
     *
     * The host application is provided as an argument. This allows you to load
     * additional plugin dependencies, or attach events.
     *
     * @param \Cake\Core\PluginApplicationInterface $app The host application
     * @return void
     */
    public function bootstrap(PluginApplicationInterface $app): void
    {
        parent::bootstrap($app);

        $configs = [
            'Assets.app_assets',
            'app_assets',
            'app',
        ];

        foreach ($configs as $config) {
            try {
                Configure::load($config);
            } catch (\Exception $e) {
                continue;
            }
        }

        $app->addPlugin(self::class);
    }
}
