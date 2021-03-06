<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticIniteb8513f540c208f3b72a6ec625cf9609
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

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticIniteb8513f540c208f3b72a6ec625cf9609::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticIniteb8513f540c208f3b72a6ec625cf9609::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticIniteb8513f540c208f3b72a6ec625cf9609::$classMap;

        }, null, ClassLoader::class);
    }
}
