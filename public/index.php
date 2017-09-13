<?php
// +----------------------------------------------------------------------
// | 蓝色PHP框架 [ BlovePHP ]
// +----------------------------------------------------------------------
// | Copyright (c) 2016-2017 http://www.ewe.com.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: bb2 <bebetoohh@gmail.com>
// +----------------------------------------------------------------------

// [ PHP版本检测 ]
header("Content-type: text/html; charset=utf-8");
if(version_compare(PHP_VERSION,'5.5','<')){
	die('PHP版本太低，最少需要PHP5.5，请升级PHP版本');
}
// [ 应用入口文件 ]

// 定义应用目录
define('APP_PATH', __DIR__ . '/../application/');
// 加载框架引导文件
require __DIR__ . '/../thinkphp/start.php';
