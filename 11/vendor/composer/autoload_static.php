<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit03ca26c052f574120bc3a3c5621cc4f1
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'Psr\\Log\\' => 8,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Psr\\Log\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/log/Psr/Log',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit03ca26c052f574120bc3a3c5621cc4f1::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit03ca26c052f574120bc3a3c5621cc4f1::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}