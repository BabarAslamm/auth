<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1d972f483d3be25d61f872475ac0597f
{
    public static $prefixLengthsPsr4 = array (
        'I' => 
        array (
            'Insyghts\\Authentication\\' => 24,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Insyghts\\Authentication\\' => 
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit1d972f483d3be25d61f872475ac0597f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1d972f483d3be25d61f872475ac0597f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1d972f483d3be25d61f872475ac0597f::$classMap;

        }, null, ClassLoader::class);
    }
}
