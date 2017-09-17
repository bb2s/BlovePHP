<?php
namespace app\admin\model;

use think\Model;
class Role extends Model
{
	protected $table = "__ADMIN_ROLE__";
	protected $autoWriteTimestamp = true;

	/**
     * 检查访问权限
     * @param int $id 需要检查的节点ID，默认检查当前操作节点
     * @param bool $url 是否为节点url，默认为节点id
     * @author 蔡伟明 <314013107@qq.com>
     * @return bool
     */
    public static function checkAuth($id = 0, $url = false)
    {
        // 当前用户的角色
        $role = session('user_auth.role');

        // id为1的是超级管理员，或者角色为1的，拥有最高权限
        if (session('user_auth.uid') == '1' || $role == '1') {
            return true;
        }

        // 获取当前用户的权限
        $menu_auth = session('role_menu_auth');

        // 检查权限
        if ($menu_auth) {
            if ($id !== 0) {
                return $url === false ? isset($menu_auth[$id]) : in_array($id, $menu_auth);
            }
            // 获取当前操作的id
            $location = MenuModel::getLocation();
            $action   = end($location);

            return $url === false ? isset($menu_auth[$action['id']]) : in_array($action['url_value'], $menu_auth);
        }

        // 其他情况一律没有权限
        return false;
    }

}