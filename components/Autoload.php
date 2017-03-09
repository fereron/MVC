<?php

class Loader
{

    function loadClass($class_name)
    {
        $array_paths = array(
        '/models/',
        '/components/'
    );

        foreach ($array_paths as $paths) {
            $paths = ROOT . $paths . $class_name . '.php';
            if (is_file($paths)) {
                include_once $paths;
            }
        }

    }

}