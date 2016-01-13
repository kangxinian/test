<?php
namespace Admin\Logic;
use Think\Model;
/**
 * 用户
 */

class UserLogic extends Model {

	/*
	 * 后台添加
	 * */
	public function adminadd($data) {
		$user = D('User');
		$adminuser = D('AdminUser');
		if($user -> plus($data) ){
			$tid = $user->where('uname = "%s"',$data['uname'])->field("uname,user_id")->find();
			$data['user_id'] = $tid['user_id'];
			$adminuser->plus($data);
			return TRUE;
		}
		return FALSE;
	}
	
	public function homeadd($data) {
	    $user = D('User');
	    $homeuser = D('HomeUser');
	    if($user -> plus($data) ){
	        $tid = $user->where('uname = "%s"',$data['uname'])->field("uname,user_id")->find();
	        $data['user_id'] = $tid['user_id'];
	        $homeuser->plus($data);
	        return TRUE;
	    }
	    return FALSE;
	}
	public function bossadd($data) {
	    $user = D('User');
	    $bossuser = D('BossUser');
	    if($user -> plus($data) ){
	        $tid = $user->where('uname = "%s"',$data['uname'])->field("uname,user_id")->find();
	        $data['user_id'] = $tid['user_id'];
	        $bossuser->plus($data);
	        return TRUE;
	    }
	    return FALSE;
	}
	public function staffadd($data) {
	    $user = D('User');
	    $staffuser = D('StaffUser');
	    if($user -> plus($data) ){
	        $tid = $user->where('uname = "%s"',$data['uname'])->field("uname,user_id")->find();
	        $data['user_id'] = $tid['user_id'];
	        $staffuser->plus($data);
	        return TRUE;
	    }
	    return FALSE;
	}
	
	/*
	 * 后台修改
	 * */
	public function adminedit($data) {
	    $user = D('User');
	    $adminuser = D('AdminUser');
	     
	    $tid = $adminuser->where('id = "%d"',$data['id'])->field("id,user_id")->find();
	    $data['user_id'] = $tid['user_id'];
	     
	    if($user -> edit($data)|| $adminuser->edit($data) )return TRUE;
	    return FALSE;
	     
	}
	public function bossedit($data) {
	    $user = D('User');
	    $bossuser = D('BossUser');
	
	    $tid = $bossuser->where('id = "%d"',$data['id'])->field("id,user_id")->find();
	    $data['user_id'] = $tid['user_id'];
	
	    if($user -> edit($data)|| $bossuser->edit($data) )return TRUE;
	    return FALSE;
	
	}
	public function homeedit($data) {
	    $user = D('User');
	    $homeuser = D('HomeUser');
	     
	    $tid = $homeuser->where('id = "%d"',$data['id'])->field("id,user_id")->find();
	    $data['user_id'] = $tid['user_id'];
	     
	    if($homeuser -> edit($data)||$user->edit($data) )return TRUE;
	    return FALSE;
	}
	public function staffedit($data) {
	    $user = D('User');
	    $staffuser = D('StaffUser');
	
	    $tid = $staffuser->where('id = "%d"',$data['id'])->field("id,user_id")->find();
	    $data['user_id'] = $tid['user_id'];
	
	    if($staffuser -> edit($data)||$user->edit($data) )return TRUE;
	    return FALSE;
	}
	
}
