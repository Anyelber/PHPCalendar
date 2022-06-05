<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit2e688c582e63317c6e98ca2d3bdc9bd7
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'AnySlehider\\PHPCalendary\\' => 25,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'AnySlehider\\PHPCalendary\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit2e688c582e63317c6e98ca2d3bdc9bd7::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit2e688c582e63317c6e98ca2d3bdc9bd7::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit2e688c582e63317c6e98ca2d3bdc9bd7::$classMap;

        }, null, ClassLoader::class);
    }
}