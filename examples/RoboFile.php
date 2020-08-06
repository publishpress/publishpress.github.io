<?php

/**
 * This is project's console commands configuration for Robo task runner.
 *
 * @see http://robo.li/
 */
class RoboFile extends \PublishPressBuilder\PackageBuilderTasks
{
    public function __construct()
    {
        parent::__construct();

        $this->setVersionConstantName('PUBLISHPRESS_PLUGIN_VERSION');

        $this->appendToFileToIgnore(
            [
                'webpack.config.js',
                'vendor/publishpress/wordpress-version-notices/.gitignore',
                'vendor/publishpress/wordpress-version-notices/README.md',
                'vendor/publishpress/wordpress-version-notices/bin',
                'vendor/publishpress/wordpress-version-notices/codeception.dist.yml',
                'vendor/publishpress/wordpress-version-notices/codeception.yml',
                'vendor/publishpress/wordpress-version-notices/tests',
            ]
        );
    }
}
