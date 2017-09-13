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
		// $admin_pass = Db::name('admin_user')->where('id',1)->value('password');
		return $this->fetch();
	}
}