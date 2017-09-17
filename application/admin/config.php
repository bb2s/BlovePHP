<?php
//admin模块专用配置文件

return [
	'admin_name'	=>	'admin',
	'admin_pwd'		=>	'123456',

	'system_color'	=> 'city',

	'top_menu_all'	=>	[
		    1 => [
			    'id'	 => 1,
			    'pid'	 => 0,
			    'module'	 =>  "admin",
			    'title'	 => "首页",
			    'url_value'	 =>  "/admin.php/admin/index/index.html",
			    'url_type'	 =>  "module_admin",
			    'url_target'	 => "_self",
			    'icon'	 =>  "fa fa-fw fa-home",
			    'params'	 => "",
			    'controller'	 => "index",
			    'action'	 => "index",
			],

			4 => [
			    'id'	 => 4,
			    'pid'	 => 0,
			    'module'	 =>  "admin",
			    'title'	 =>  "系统",
			    'url_value'	 =>  "/admin.php/admin/system/index.html",
			    'url_type'	 =>  "module_admin",
			    'url_target'	 =>  "_self",
			    'icon'	 =>  "fa fa-fw fa-gear",
			    'params'	 =>  "",
			    'controller'	 =>  "system",
			    'action'	 =>  "index",
			],
			68 => [
			    'id' => 68,
			    'pid' => 0,
			    'module' =>  "user",
			    'title' =>  "用户",
			    'url_value' =>  "/admin.php/user/index/index.html",
			    'url_type' =>  "module_admin",
			    'url_target' =>  "_self",
			    'icon' =>  "fa fa-fw fa-user",
			    'params' =>  "",
			    'controller' =>  "index",
			    'action' =>  "index",
  			],
		  	214 => [
			    'id' => 214,
			    'pid' => 0,
			    'module' =>  "cms",
			    'title' =>  "门户",
			    'url_value' =>  "/admin.php/cms/index/index.html",
			    'url_type' =>  "module_admin",
			    'url_target' =>  "_self",
			    'icon' =>  "fa fa-fw fa-newspaper-o",
			    'params' =>  "",
			    'controller' =>  "index",
			    'action' =>  "index",
		  	],

	],


];