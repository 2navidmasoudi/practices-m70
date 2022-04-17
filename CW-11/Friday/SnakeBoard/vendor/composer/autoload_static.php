<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit446d4ff39f08a7c25d6be22e479e6092
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static $prefixesPsr0 = array (
        'L' => 
        array (
            'LucidFrame\\' => 
            array (
                0 => __DIR__ . '/..' . '/phplucidframe/console-table/src',
            ),
            'LucidFrameTest\\' => 
            array (
                0 => __DIR__ . '/..' . '/phplucidframe/console-table/tests',
            ),
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInit446d4ff39f08a7c25d6be22e479e6092::$fallbackDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit446d4ff39f08a7c25d6be22e479e6092::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit446d4ff39f08a7c25d6be22e479e6092::$classMap;

        }, null, ClassLoader::class);
    }
}