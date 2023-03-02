<?php

namespace Thusitha;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;
use ZipArchive;

class TemplateInstaller extends LibraryInstaller
{
    /**
     * @inheritDoc
     */
    public function getInstallPath(PackageInterface $package)
    {
        $prefix = substr($package->getPrettyName(), 0, 17);
        if ('thusitha/package-' !== $prefix) {
            throw new \InvalidArgumentException(
                'Unable to install template, thusitha packages '
                    . 'should always start their package name with '
                    . '"thusitha/package-"'
            );
        }

        $location = 'src/Modules/' . ucfirst(substr($package->getPrettyName(), 17));

        return $location;
    }

    /**
     * @inheritDoc
     */
    public function supports($packageType)
    {
        return 'laravel-plugin' === $packageType;
    }

    public function qdownload(string $packageName, string $version, string $installPath): void
    {
        // Construct the URL for the WordPress plugin ZIP file.
        //$url = sprintf('https://downloads.wordpress.org/plugin/%1$s.%2$s.zip', $packageName, $version);
        //echo $url;

        // Download the ZIP file.
        // $tempFile = tempnam(sys_get_temp_dir(), 'wp_plugin');
        // file_put_contents($tempFile, file_get_contents($url));

        // // Unzip the ZIP file to the installation path.
        // $zip = new ZipArchive();
        // $zip->open($tempFile);
        // $zip->extractTo($installPath);
        // $zip->close();

        // // Remove the temporary ZIP file.
        // unlink($tempFile);
    }
}
