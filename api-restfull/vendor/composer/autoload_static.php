<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit3687ced6af6ded3d5f5c2ecb93feb5c5
{
    public static $prefixLengthsPsr4 = array (
        'm' => 
        array (
            'model\\' => 6,
        ),
        'c' => 
        array (
            'core\\' => 5,
            'controller\\' => 11,
        ),
        'D' => 
        array (
            'DAO\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'model\\' => 
        array (
            0 => __DIR__ . '/../..' . '/model',
        ),
        'core\\' => 
        array (
            0 => __DIR__ . '/../..' . '/core',
        ),
        'controller\\' => 
        array (
            0 => __DIR__ . '/../..' . '/controller',
        ),
        'DAO\\' => 
        array (
            0 => __DIR__ . '/../..' . '/DAO',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit3687ced6af6ded3d5f5c2ecb93feb5c5::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit3687ced6af6ded3d5f5c2ecb93feb5c5::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
