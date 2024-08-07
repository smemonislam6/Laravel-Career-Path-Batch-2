<?php

// autoload_real.php @generated by Composer

class ComposerAutoloaderInitf3fd25e1079742dd93432bbe6d5ffadc
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

        spl_autoload_register(array('ComposerAutoloaderInitf3fd25e1079742dd93432bbe6d5ffadc', 'loadClassLoader'), true, true);
        self::$loader = $loader = new \Composer\Autoload\ClassLoader(\dirname(__DIR__));
        spl_autoload_unregister(array('ComposerAutoloaderInitf3fd25e1079742dd93432bbe6d5ffadc', 'loadClassLoader'));

        require __DIR__ . '/autoload_static.php';
        call_user_func(\Composer\Autoload\ComposerStaticInitf3fd25e1079742dd93432bbe6d5ffadc::getInitializer($loader));

        $loader->register(true);

        return $loader;
    }
}
