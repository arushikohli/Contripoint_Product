<?php

// scoper-autoload.php @generated by PhpScoper

$loader = require_once __DIR__.'/autoload.php';

// Exposed classes. For more information see:
// https://github.com/humbug/php-scoper/blob/master/docs/configuration.md#exposing-classes
if (!class_exists('SplClassLoader', false) && !interface_exists('SplClassLoader', false) && !trait_exists('SplClassLoader', false)) {
    spl_autoload_call('NSquared\SSA\Vendor\SplClassLoader');
}

return $loader;