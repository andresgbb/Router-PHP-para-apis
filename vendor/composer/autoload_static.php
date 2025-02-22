<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit74df7dcb57cecc0aa00fe8f0f1c990ad
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit74df7dcb57cecc0aa00fe8f0f1c990ad::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit74df7dcb57cecc0aa00fe8f0f1c990ad::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit74df7dcb57cecc0aa00fe8f0f1c990ad::$classMap;

        }, null, ClassLoader::class);
    }
}
