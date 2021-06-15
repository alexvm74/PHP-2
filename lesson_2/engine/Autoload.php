<?php


class Autoload
{

    function loadClass($className)
    {
        //var_dump($className);
        $className = str_replace("app\\", "../", $className);
        $className = str_replace("\\", "/", $className);
        //var_dump($className);
        //die();

        $fileName = "{$className}.php";
        var_dump($fileName);

        if (file_exists($fileName)) {
            include $fileName;
        }
    }
}
