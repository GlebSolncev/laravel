<?php
/**
 * academy
 * Created by: 5-HT.
 * Date: 18.11.2019 16:59
 *
 * ${PARAM_DOC}
 * ${THROWS_DOC}
 */

if(!function_exists('str_random')) {
    function str_random($length = 10)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
}