<?php
namespace app\admin\model;

use think\Model;
use app\admin\model\role as RoleModel;
class Menu extends Model
{
	protected $table = '__ADMIN_MENU__';

	protected $autoWriteTimestamp = true;

	/**
     * 获取顶部节点
     * @param string $max 最多返回多少个
     * @param string $cache_tag 缓存标签
     * @author 蔡伟明 <314013107@qq.com>
     * @return array
     */
    public static function getTopMenu($max = '', $cache_tag = '')
    {
        $cache_tag .= '_role_'.session('user_auth.role');
        $menus = cache($cache_tag);

        if (!$menus) {
            // 非开发模式，只显示可以显示的菜单
            if (config('develop_mode') == 0) {
                $map['online_hide'] = 0;
            }
            $map['status'] = 1;
            $map['pid']    = 0;
            $menus = self::where($map)->order('sort,id')->limit($max)->column('id,pid,module,title,url_value,url_type,url_target,icon,params');
            foreach ($menus as $key => &$menu) {
                // 没有访问权限的节点不显示
                // if (!RoleModel::checkAuth($menu['id'])) {
                if (RoleModel::checkAuth($menu['id'])) {

                    unset($menus[$key]);
                    continue;
                }
                if ($menu['url_value'] != '' && ($menu['url_type'] == 'module_admin' || $menu['url_type'] == 'module_home')) {
                    $url = explode('/', $menu['url_value']);
                    $menu['controller'] = $url[1];
                    $menu['action']     = $url[2];
                    // $menu['url_value']  = $menu['url_type'] == 'module_admin' ? admin_url($menu['url_value'], $menu['params']) : home_url($menu['url_value'], $menu['params']);
                    $menu['url_value']  = $menu['url_value'];
                }
            }
            // 非开发模式，缓存菜单
            if (config('develop_mode') == 0) {
                cache($cache_tag, $menus);
            }
        }
        
        return $menus;
    }
}