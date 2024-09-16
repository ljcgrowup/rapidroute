<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInite83a44c08693e4b11f1829a607b7931e
{
    public static $prefixLengthsPsr4 = array (
        'R' => 
        array (
            'RapidRoute\\' => 11,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'RapidRoute\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInite83a44c08693e4b11f1829a607b7931e::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInite83a44c08693e4b11f1829a607b7931e::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInite83a44c08693e4b11f1829a607b7931e::$classMap;

        }, null, ClassLoader::class);
    }
}