<?php

class Request {

    public static function uri() {
        return trim(
            parse_url(
                substr($_SERVER['REQUEST_URI'], strlen(
                    dirname($_SERVER['PHP_SELF']))), PHP_URL_PATH)
        );
    }

    public static function method() {
        return  $_SERVER['REQUEST_METHOD'];
    }
    
}