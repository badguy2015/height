<?php

namespace core\lib;

Class route
{
    static public $instance;
    public $module;
    public $controller;
    public $action;

    private function __construct()
    {
        /**
         * 1.隐藏index.php
         * 2.获取URL 参数部份
         * 3.返回对应的控制器和方法
         * 4./home/user/login/name/root/password/123 对应 /module/controller/action/params
         */
        $defaultRoute = \core\lib\config::getall('route')['default'];
        $uri = $_SERVER['REQUEST_URI'];
        if(isset($uri) && $uri!=='/'){
            // 路由模式一: /home/testForm/testSomeElement?name=zs&sex=1
            if($strpos = strpos($uri,'?')){
                $uri = substr($uri,0,$strpos);

                $uri = ltrim($uri,'/');
                $uriArr = explode('/',$uri);
                $this->module = ucfirst($uriArr[0]);
                if(isset($uriArr[1])){
                    $this->controller = ucfirst($uriArr[1]);
                    if(isset($uriArr[2])){
                        $this->action = lcfirst(($uriArr[2]));
                        // GET参数会自动传入变量$_GET,无需要额外处理。
//                        for($i=3;$i<count($uriArr);$i=$i+2) {
//                            if(isset($uriArr[$i+1])) {
//                                $_GET[$uriArr[$i]] = $uriArr[$i+1];
//                            }
//                        }
                    }else{
                        $this->action = lcfirst($defaultRoute['action']);
                    }
                }else{
                    $this->controller = ucfirst($defaultRoute['controller']);
                    $this->action = lcfirst($defaultRoute['action']);
                }
            }else{
                // 路由模式二: /home/testForm/testSomeElement/name=zs/sex=1
                $uri = ltrim($uri,'/');
                $uriArr = explode('/',$uri);
                $this->module = ucfirst($uriArr[0]);
                if(isset($uriArr[1])){
                    $this->controller = ucfirst($uriArr[1]);
                    if(isset($uriArr[2])){
                        $this->action = lcfirst(($uriArr[2]));
                        // GET参数会自动传入变量$_GET,无需要额外处理。
//                        for($i=3;$i<count($uriArr);$i=$i+2) {
//                            if(isset($uriArr[$i+1])) {
//                                $_GET[$uriArr[$i]] = $uriArr[$i+1];
//                            }
//                        }
                    }else{
                        $this->action = lcfirst($defaultRoute['action']);
                    }
                }else{
                    $this->controller = ucfirst($defaultRoute['controller']);
                    $this->action = lcfirst($defaultRoute['action']);
                }
            }
        }else{
            $this->module = ucfirst(defaultRoute['module']);
            $this->controller = ucfirst(defaultRoute['controller']);
            $this->action = lcfirst($defaultRoute['action']);
        }
    }
    private function __clone(){}
    public static function getInstance()
    {
        //检测当前类属性$instance是否已经保存了当前类的实例
        if (self::$instance == null) {
            //如果没有,则创建当前类的实例
            self::$instance = new self();
        }
        //如果已经有了当前类实例,就直接返回,不要重复创建类实例
        return self::$instance;
    }

}
