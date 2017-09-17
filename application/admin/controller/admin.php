<?php
namespace app\admin\controller;

use app\common\controller\Common;
use think\Db;
use app\admin\model\menu as MenuModel;

class Admin extends Common
{
	protected function _initialize()
	{
        // 在这里放置管理员信息
        
		//判断是否登录，并定义 用户ID常量
		// define('UID') or define('UID' $this->isLogin());

		//设置当前角色菜单节点权限，该函数在common.php中定义
		// role_auth();

		//检查权限

		//设置分页参数

		//后台公共模板
		$this->assign('_admin_base_layout',config('admin_base_layout'));//在config.php中定义，好像没什么用
        
		//当前配色方案
		$this->assign('system_color',config('system_color'));//在数据库中定义,在behavior\config.php 中获取并设置
		//如果不是ajax请求，则读取菜单
		if(!$this->request->isAjax()){
			// 读取全部顶级菜单
            $this->assign('_top_menus_all', config('top_menus_all'));
            // 获取侧边栏菜单
            $this->assign('_sidebar_menus', MenuModel::getSidebarMenu());
            // 获取面包屑导航
            $this->assign('_location', MenuModel::getLocation('', true));
            // 构建侧栏
            $settings = [
                [
                    'title'   => '站点开关',
                    'tips'    => '站点关闭后将不能访问',
                    'checked' => Db::name('admin_config')->where('id', 1)->value('value'),
                    'table'   => 'admin_config',
                    'id'      => 1,
                    'field'   => 'value'
                ]
            ];
            ZBuilder::make('aside')
                ->addBlock('switch', '系统设置', $settings);
        }

        // 输出弹出层参数
        $this->assign('_pop', $this->request->param('_pop'));
		
		
	}
}