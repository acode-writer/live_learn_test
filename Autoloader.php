<?php

class Autoloader {
    
    static function register() {
         spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    static function autoload($className) {
        $folders = ["./","./models/","./contollers/","./dao/"];
        foreach ($folders as  $folder) {
            $fileName = $folder."".$className.".php";
            if(file_exists($fileName)){
                require_once($fileName);
            }
        }
    }

}