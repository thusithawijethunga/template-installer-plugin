<?php

namespace Thusitha;

use Composer\Package\PackageInterface;
use Composer\Installer\LibraryInstaller;

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
}
