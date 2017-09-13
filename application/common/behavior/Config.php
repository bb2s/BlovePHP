<?php
namespace app\common\behavior;


class Config{
	public function run(&$params)
	{
		//获取当前模块名称
		$module = '';
		$dispatch = request()->dispatch();
		if(isset($dispatch['module'])){
			$module = $dispatch['module'][0];
		}

		//获取入口目录 对于参照系统，因为public root 设置不一样，因此，以下代码是否有用不确定
		$base_file = request()->baseFile();
		$base_dir = substr($base_file,0,strripos($base_file, '/')+1);

		//如果定义了入口为admin，则修改默认的访问控制器层
		if(defined('ENTRANCE') && ENTRANCE == 'admin'){
			define('ADMIN_FILE', substr($base_file, strripos($base_file, '/') + 1));
			echo ADMIN_FILE;
		}

	}
}