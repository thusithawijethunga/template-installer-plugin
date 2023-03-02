<?php

namespace Thusitha;

use Composer\Composer;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class TemplateInstallerPlugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        echo '...................................................' . PHP_EOL;
        echo 'Hi, I am Installer' . PHP_EOL;
        echo '...................................................' . PHP_EOL;

        $installer = new TemplateInstaller($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);

        // set the package name of the WordPress plugin to download
        //$packageName = 'w3-total-cache';
        // set the version of the WordPress plugin to download
        //$version = '0.9.7.5';
        // set the installation path for the downloaded WordPress plugin
        // $installPath = 'vendor/wp-plugins/w3-total-cache';
        //$installer->qdownload($packageName, $version, $installPath);
    }

    public function deactivate(Composer $composer, IOInterface $io)
    {
    }

    public function uninstall(Composer $composer, IOInterface $io)
    {
    }
}
