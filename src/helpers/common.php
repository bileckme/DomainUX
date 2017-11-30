<?php

use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Session;

if (!function_exists('format_phone_number')) {
    /**
     * @param $phone
     * @return bool|mixed|string
     */
    function format_phone_number($phone)
    {
        if (!isset($phone{3})) {
            return '';
        }
        $phone = preg_replace("/[^0-9]/", "", $phone);
        $length = strlen($phone);
        switch ($length) {
            case 10:
                $phone = substr($phone, 1, strlen($phone));

                return preg_replace("/([0-9]{2})([0-9]{3})([0-9]{4})/", "+27 ($1) $2-$3", $phone);
                break;
            case 11:
                return preg_replace("/([0-9]{2})([0-9]{2})([0-9]{3})([0-9]{4})/", "+$1 ($2) $3-$4", $phone);
                break;
            default:
                return $phone;
                break;
        }
    }
}

if (!function_exists('config')) {
    /**
     * @param $name
     *
     * @return mixed
     */
    function config($name)
    {
        return Config::get($name);
    }
}

if (!function_exists('session')) {
    /**
     * @param $session
     *
     * @return string|null
     */
    function session($session)
    {
        if (!Session::has($session)) {
            return null;
        }

        return Session::get($session);
    }
}

if (!function_exists('get_dropdown_list')) {
    /**
     * @param string $class
     * @param string $label
     * @param string $index
     *
     * @return array
     */
    function get_dropdown_list($class, $label, $index) {
        return ['-- select --'] + $class::all()->lists($label, $index);
    }
}

if (!function_exists('cdd'))
{
    /**
     * Dump the passed variables and end the script.
     *
     * @param  dynamic  mixed
     * @return void
     */
    function cdd()
    {
        array_map(function($x) { echo '<pre>'; var_dump($x); echo '</pre>'; }, func_get_args()); die;
    }
}

if (!function_exists('app')){

    /**
     * Gets the laravel application instance
     * @param string $abstract
     * @return mixed
     */
    function app($abstract){
        return App::make($abstract);
    }
}

if (!function_exists('flash')){

    /**
     * Outputs a flash message
     * @param $title
     * @param $message
     * @param string $level
     * @return mixed
     */
    function flash($title, $message, $level = 'info'){
        $flash = app(Absolem\Http\Flash::class);
        if (!func_num_args())
        {
            return $flash;
        }
        $response = null;
        switch($level){
            default:
            case 'info':
                $response = $flash->info($title, $message);
                break;
            case 'success':
                $response = $flash->success($title, $message);
                break;
            case 'warning':
                $response = $flash->warning($title, $message);
                break;
            case 'error':
                $response = $flash->error($title, $message);
                break;
            case 'question':
                $response = $flash->question($title, $message);
                break;
            case 'notice':
                $response = $flash->notice($title, $message);
                break;
            case 'overlay':
                $response = $flash->overlay($title, $message);
                break;
        }
        return $response;
    }
}
