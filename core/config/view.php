<?php
return array(
'view_manager' => array(
// TemplateMapResolver允许你直接映射模板名称
// 到指定的模板。下面的映射可以提供主页模板的位置
//  ("application/index/index"), 以及
//  layout ("layout/layout"),错误页面 ("error/index"), 和
// 404 页面 ("error/404"), 将它们解析到视图脚本。
'template_map' => array(
'application/index/index' => __DIR__ .  '/../view/application/index/index.phtml',
'site/layout'             => __DIR__ . '/../view/layout/layout.phtml',
'error/index'             => __DIR__ . '/../view/error/index.phtml',
'error/404'               => __DIR__ . '/../view/error/404.phtml',
),

// TemplatePathStack 存放一个目录数组. 请求的视图脚本目录
// 会以后进先出的顺序被搜索到（为堆栈）。
// 对于快速开发这是个很好的解决方案，
// 但是很可能引入性能的开销
// 由于必要的静态调用的数量。
//
// 以下代码添加指向当前模块的视图目录的实体
// 确保模块间的键不同
// 以保证他们不会被覆盖——或者干脆省略键！
'template_path_stack' => array(
'application' => __DIR__ . '/../view',
),

// 这用于指定默认的模板脚本文件的后缀名。默认为“phtml”。
'default_template_suffix' => 'php',

// 为网站的layout设置模板名。
//
// 默认情况下，MVC默认的渲染策略使用
// 模板名 "layout/layout".
// 这里, 我们让策略使用“site/layout”模板，
//
'layout' => 'site/layout',

// 默认情况下，MVC注册一个“exception strategy”，
// 它会在请求行为发生异常是触发； 它创建了
// 一个自定义的包裹异常的视图模型，并选择一个
// 模板。我们将设置该模板为“error/index”。
//
// 此外，我们还会告诉它我们想要显示异常的堆栈信息；
// 你很可能想默认不去显示。
'display_exceptions' => true,
'exception_template' => 'error/index',

// 另一个MVC默认注册的策略是“route not found”
// 策略。 大体上，这会在（a）不存在任何路由
// 匹配当前路由，（b）路由匹配中指定的控制器
// 不能在服务定位器中找到，（c）路由匹配中指定的
// 控制器没有实现DispatchableInterface
// 接口，（d）控制器设置响应码为404，时被触发。
//
//
// 就像异常策略，这些条件下默认模板是“error”。
// 在这里，我们使用“error/404”
// 模板。
//
// 你可以选择注入404的原因； see the
// various `Application\:\:ERROR_*`_ constants for a list of values.
// 此外，一些404状态产生于路由或派遣时抛出的异常。
// 你可以选择显示这些信息。
//
'display_not_found_reason' => true,
'not_found_template'       => 'error/404',
),
);
