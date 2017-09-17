<?php
namespace app\admin\controller;

use app\common\controller\Common;
class Publics extends Common
{
	Public function login()
	{
		if($this->request->isPost()){
			echo "checkAuth";

		}else{
			// echo "fetch";
			return is_login() ? $this->redirect('admin/index/index') : $this->fetch();
		}
	}
}