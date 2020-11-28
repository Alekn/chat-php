<?php

class Conectar {

    public static function make($config) {
        try {
            return new PDO(
                $config['connection'].';dbname='.$config['name'].';charset='.$config['charset'],
                $config['username'],
                $config['password'],
                $config['options']
            );
        } catch(PDOException $e) {
            die($e->getMessage());
        }
    }
}