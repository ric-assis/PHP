<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit15f038ef6758b8e9816ae46c4ec4af65
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PagSeguro\\' => 10,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PagSeguro\\' => 
        array (
            0 => __DIR__ . '/..' . '/pagseguro/pagseguro-php-sdk/source',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit15f038ef6758b8e9816ae46c4ec4af65::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit15f038ef6758b8e9816ae46c4ec4af65::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
