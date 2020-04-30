<?php

namespace phpbbfr\PhpbbExtensionStyleInstaller;

use Composer\Installer\LibraryInstaller;
use Composer\Package\PackageInterface;

class Installer extends LibraryInstaller
{
    public function getInstallPath(PackageInterface $package)
    {
        $extra = $package->getExtra();
        $name = explode('/', $package->getName())[1];

        if (!preg_match('#^([a-z0-9]+)-([a-z0-9]+)-style-(.+)$#', $name, $matches))
        {
            throw new \InvalidArgumentException('Invalid phpbb-extension-style composer package.');
        }

        $extension = isset($extra['phpbb-extension']) ? $extra['phpbb-extension'] : $matches[1] . '/' . $matches[2] ;
        $style = isset($extra['phpbb-style']) ? $extra['phpbb-style'] : $matches[3];

        return sprintf('ext/%s/styles/%s', $extension, $style);
    }

    public function supports($packageType)
    {
        return $packageType == 'phpbb-extension-style';
    }
}
