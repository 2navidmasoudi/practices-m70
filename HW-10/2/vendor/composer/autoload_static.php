<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit35c0178fce07e46a65be4c5bc325f6c6
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit35c0178fce07e46a65be4c5bc325f6c6::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit35c0178fce07e46a65be4c5bc325f6c6::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit35c0178fce07e46a65be4c5bc325f6c6::$classMap;

        }, null, ClassLoader::class);
    }
}
