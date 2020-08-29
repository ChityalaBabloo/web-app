<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit0e8ccb8b617c3e4c4e2c393ed46fe103
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
            $loader->prefixLengthsPsr4 = ComposerStaticInit0e8ccb8b617c3e4c4e2c393ed46fe103::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit0e8ccb8b617c3e4c4e2c393ed46fe103::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
