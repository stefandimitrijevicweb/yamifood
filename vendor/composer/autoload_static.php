<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit97414a21a83699bb03f3fe2f920860cf
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PHPMailer\\PHPMailer\\' => 20,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PHPMailer\\PHPMailer\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpmailer/phpmailer/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit97414a21a83699bb03f3fe2f920860cf::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit97414a21a83699bb03f3fe2f920860cf::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
