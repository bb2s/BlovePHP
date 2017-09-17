<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
use think\Db;

if (!function_exists('parse_attr')) {
    /**
     * 解析配置
     * @param string $value 配置值
     * @return array|string
     */
    function parse_attr($value = '') {
        $array = preg_split('/[,;\r\n]+/', trim($value, ",;\r\n"));
        if (strpos($value, ':')) {
            $value  = array();
            foreach ($array as $val) {
                list($k, $v) = explode(':', $val);
                $value[$k]   = $v;
            }
        } else {
            $value = $array;
        }
        return $value;
    }
}

if (!function_exists('is_login')){
    //判断是否登录
    function is_login()
    {
        return model('common/user')->isLogin();
    }
}
if (!function_exists('hook')) {
    /**
     * 监听钩子
     * @param string $name 钩子名称
     * @param mixed  $params 传入参数
     * @param mixed  $extra  额外参数
     * @param bool   $once   只获取一个有效返回值
     * @author 蔡伟明 <314013107@qq.com>
     * @alter 小乌 <82950492@qq.com>
     */
    function hook($name = '', $params = null, $extra = null, $once = false) {
        \think\Hook::listen($name, $params, $extra, $once);
    }
}
if (!function_exists('admin_url')) {
    /**
     * 生成后台入口url
     * @param string        $url 路由地址
     * @param string|array  $vars 变量
     * @param bool|string   $suffix 生成的URL后缀
     * @param bool|string   $domain 域名
     * @author 小乌 <82950492@qq.com>
     * @return string
     */
    function admin_url($url = '', $vars = '', $suffix = true, $domain = false) {
        $url = url($url, $vars, $suffix, $domain);
        if (defined('ENTRANCE') && ENTRANCE == 'admin') {
            return $url;
        } else {
            return preg_replace('/\/index.php/', '/'.ADMIN_FILE, $url);
        }
    }
}
if (!function_exists('get_avatar')) {
    /**
     * 获取用户头像路径
     * @param int $uid 用户id
     * @author 蔡伟明 <314013107@qq.com>
     * @alter 小乌 <82950492@qq.com>
     * @return string
     */
    function get_avatar($uid = 0)
    {
        $avatar = Db::name('admin_user')->where('id', $uid)->value('avatar');
        // $path = model('admin/attachment')->getFilePath($avatar);
        // if (!$path) {
        //     return config('public_static_path').'admin/img/avatar.jpg';
        // }
        // return $path;
            return config('public_static_path').'admin/img/avatar.jpg';
        
    }
}