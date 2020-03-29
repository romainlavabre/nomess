<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit216efa20afc043915ee921ce091cfdc2
{
    public static $files = array (
        'bd9634f2d41831496de0d3dfe4c94881' => __DIR__ . '/..' . '/symfony/polyfill-php56/bootstrap.php',
        '7cca0da9604df282f16d129f538c9833' => __DIR__ . '/..' . '/digitalnature/php-ref/ref.php',
        'b33e3d135e5d9e47d845c576147bda89' => __DIR__ . '/..' . '/php-di/php-di/src/functions.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Web\\' => 4,
        ),
        'S' => 
        array (
            'Symfony\\Polyfill\\Util\\' => 22,
            'Symfony\\Polyfill\\Php56\\' => 23,
            'SuperClosure\\' => 13,
        ),
        'P' => 
        array (
            'Psr\\Container\\' => 14,
            'PhpParser\\' => 10,
            'PhpDocReader\\' => 13,
        ),
        'N' => 
        array (
            'NoMess\\Tools\\' => 13,
            'NoMess\\Core\\' => 12,
        ),
        'I' => 
        array (
            'Invoker\\' => 8,
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Lexer\\' => 22,
            'Doctrine\\Common\\Annotations\\' => 28,
            'DI\\' => 3,
        ),
        'A' => 
        array (
            'App\\Tables\\' => 11,
            'App\\Modules\\' => 12,
            'App\\Controllers\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Web\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../Web',
        ),
        'Symfony\\Polyfill\\Util\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-util',
        ),
        'Symfony\\Polyfill\\Php56\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/polyfill-php56',
        ),
        'SuperClosure\\' => 
        array (
            0 => __DIR__ . '/..' . '/jeremeamia/superclosure/src',
        ),
        'Psr\\Container\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/container/src',
        ),
        'PhpParser\\' => 
        array (
            0 => __DIR__ . '/..' . '/nikic/php-parser/lib/PhpParser',
        ),
        'PhpDocReader\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/phpdoc-reader/src/PhpDocReader',
        ),
        'NoMess\\Tools\\' => 
        array (
            0 => __DIR__ . '/../..' . '/../Tools/bin/tools',
        ),
        'NoMess\\Core\\' => 
        array (
            0 => __DIR__ . '/..' . '/NoMess',
        ),
        'Invoker\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/invoker/src',
        ),
        'Doctrine\\Common\\Lexer\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/lexer/lib/Doctrine/Common/Lexer',
        ),
        'Doctrine\\Common\\Annotations\\' => 
        array (
            0 => __DIR__ . '/..' . '/doctrine/annotations/lib/Doctrine/Common/Annotations',
        ),
        'DI\\' => 
        array (
            0 => __DIR__ . '/..' . '/php-di/php-di/src',
        ),
        'App\\Tables\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Tables',
        ),
        'App\\Modules\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Modules',
        ),
        'App\\Controllers\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src/Controllers',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit216efa20afc043915ee921ce091cfdc2::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit216efa20afc043915ee921ce091cfdc2::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
