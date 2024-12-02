<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitc38bfb1c163b9db7aa86d2298470e274
{
    private static $loader;

    public static function loadClassLoader($class)
    {
        if ('Composer\Autoload\ClassLoader' === $class) {
            require __DIR__ . '/ClassLoader.php';
        }
    }

    /**
     * @return \Composer\Autoload\ClassLoader
     */
    public static function getLoader()
    {
        if (null !== self::$loader) {
            return self::$loader;
        }

        spl_autoload_register(array('ComposerAutoloaderInitc38bfb1c163b9db7aa86d2298470e274', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitc38bfb1c163b9db7aa86d2298470e274', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitc38bfb1c163b9db7aa86d2298470e274::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}