<?php

function wpgva_classLoader($className)
{
    $className = ltrim($className, '\\');
    $fileName  = '';
    $namespace = '';
    if ($lastNsPos = strripos($className, '\\'))
    {
        $namespace = substr($className, 0, $lastNsPos);
        $className = substr($className, $lastNsPos + 1);
    }

    $namespace = str_replace('Wpgva', 'wpgva16', $namespace);

    $namespace = str_replace('\\', DIRECTORY_SEPARATOR , $namespace);

    $fileName .= WP_PLUGIN_DIR
        . DIRECTORY_SEPARATOR . $namespace
        . DIRECTORY_SEPARATOR
        . $className
        . '.php';

    // check if the file exists
    if (file_exists($fileName))
    {
        require_once $fileName;
    }

}
spl_autoload_register('wpgva_classLoader');