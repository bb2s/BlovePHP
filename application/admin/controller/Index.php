<?php
namespace app\admin\controller;
use think\Cache;
use think\Db;
/**
 * 后台默认控制器
 * @package app\admin\controller
**/
class Index extends Admin
{
	public function index()
	{
		//仅对权限进行判断，如果权限许可，则允许登录，暂时不需要此功能
		//其他的功能，见其继承的admin.php 
		//admin.php又继承了app\commmon\controller\common
		return $this->fetch();
	}
}