<?php
/**
 * PSR-0 autoload implementation
 *
 * @param string $className
 */
spl_autoload_register(function ($className) {
    $fileName = $className;

    $fileName = preg_replace('/_/', '/', $fileName);
    $fileName = preg_replace('/\\\\/', '/', $fileName);

    $fileName = __DIR__ . DIRECTORY_SEPARATOR . $fileName . '.php';

    if (file_exists($fileName)) {
        return require $fileName;
    }
});


if (!file_exists(dirname(__DIR__) . '/vendor/autoload.php')) {
    throw new \Parser\Exception('Mismatch vendor/autoload.php. Run `composer install` before using it');
}

require_once dirname(__DIR__) . '/vendor/autoload.php';
require_once __DIR__ . '/di.php';

