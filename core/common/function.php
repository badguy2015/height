<?php

    function p($var)
    {
        if(is_bool($var)){
            var_dump($var);
        }elseif(is_null($var)){
            var_dump(null);
        }else{
            echo "<pre style='position:relative;z-index:999;padding:10px;border-radius:5px;background:#ccc;border:1px solid #aaa;font-zize:14px;line-height:18px;opacity:0.9;'>".print_r($var,true)."</pre>";
        }
    }

    /**
     * 判断是否为post
     */

    function is_post()
    {
        return isset($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD'])=='POST';
    }

    /**
     * 判断是否为get
     */

    function is_get()
    {
        return isset($_SERVER['REQUEST_METHOD']) && strtoupper($_SERVER['REQUEST_METHOD'])=='GET';
    }

    /**
     * 判断是否为ajax
     */

    function is_ajax()
    {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH'])=='XMLHTTPREQUEST';
    }

    /**
     * 判断是否为命令行模式
     */

    function is_cli()
    {
        return (PHP_SAPI === 'cli' OR defined('STDIN'));
    }