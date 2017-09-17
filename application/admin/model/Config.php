<?php
namespace app\admin\model;

use think\Model;

class Config extends Model
{
	protected $table = '__ADMIN_CONFIG__';
	// protected $table = '__ADMIN_USER__'; // 不需要表前缀
	// protected $table = 'dp_admin_user'; // 需要表前缀
	// protected $name = 'admin_user'; // 不需要表前缀

	//自动写入时间戳
	protected $autoWriteTimestamp = true;

	public function getConfig($name = '')
	{
		$configs = self::column('value,type','name');
		$result = [];
		foreach ($configs as $config) {
			switch($config['type']){
				case 'array':
					$result[$config['name']] = parse_attr($config['value']);
					break;
				case 'checkbox':
					if($config['value'] != ''){
						$result[$config['name']] = explode(',', $config['value']);
					}else{
						$result[$config['name']] = [];
					}
					break;
				default:
					$result[$config['name']] = $config['value'];
					break;
			}
		}
		return $name != '' ? $result[$name] : $result;
	}
}