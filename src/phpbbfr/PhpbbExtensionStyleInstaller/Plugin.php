<?php

namespace phpbbfr\PhpbbExtensionStyleInstaller;

use Composer\Plugin\PluginInterface;
use Composer\Composer;
use Composer\IO\IOInterface;

class Plugin implements PluginInterface
{
    public function activate(Composer $composer, IOInterface $io)
    {
        $installer = new Installer($io, $composer);
        $composer->getInstallationManager()->addInstaller($installer);
    }
}
