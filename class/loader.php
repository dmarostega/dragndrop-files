<?php

//namespace App\Loader;

class Loader{
    private static $fields;

    public static function  add(){
        if(self::$fields === null){
            self::$fields = array();
        }
        array_push(self::$fields, $_GET);
    }

    public static function get(){
        return self::$fields;
    }
}

