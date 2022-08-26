<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3465c4c6b0717aacab8d799a1c37436c
{
    public static $fallbackDirsPsr4 = array (
        0 => __DIR__ . '/../..' . '/src',
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->fallbackDirsPsr4 = ComposerStaticInit3465c4c6b0717aacab8d799a1c37436c::$fallbackDirsPsr4;
            $loader->classMap = ComposerStaticInit3465c4c6b0717aacab8d799a1c37436c::$classMap;

        }, null, ClassLoader::class);
    }
}