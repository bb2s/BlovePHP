<?php
namespace app\common\behavior;

use app\admin\model\Config as ConfigModel;
use app\admin\model\Module as ModuleModel;
class Config
{
	public function run(&$params)
	{
		// 获取入口目录
        $base_file = request()->baseFile();
        $base_dir  = substr($base_file, 0, strripos($base_file, '/') + 1);
		define('PUBLIC_PATH', $base_dir. 'public/');
		
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

		$view_replace_str = [

            // 静态资源目录
            '__STATIC__'    =>	'/static',
            '__ADMIN_JS__'	=>	'/static/admin/js',
            '__ADMIN_CSS__'	=>	'/static/admin/css',
            '__ADMIN_IMG__'	=>	'/static/admin/img',
            '__LIBS__'		=>	'/static/libs',
        ];
        config('view_replace_str',$view_replace_str);

        //从数据库中读取系统配置
        $system_config = cache('system_config');
        if(!$system_config){
        	$ConfigModel = new ConfigModel();
            $system_config = $ConfigModel->getConfig();

        	//所有模型配置,即cms等模型的配置
        	$module_config = ModuleModel::where('config','neq','')->column('config','name');
        	foreach($module_config as $module_name=>$config){
        		$system_config[strtolower($module_name).'_config'] = json_encode($config ,true);
        	}
        }

        //设置配置信息
        config($system_config);

	}
}