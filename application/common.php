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