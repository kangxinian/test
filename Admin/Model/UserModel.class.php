<?php
namespace Admin\Model;
use Think\Model;
/**
 * 用户
 */

class UserModel extends Model {

	/*
	 * 自动验证
	 * */
	protected $_validate = array( 
		array('uname', '', '帐号名称已经存在！', 0, 'unique', 1), // 在新增的时候验证name字段是否唯一
	    array('uname', 'require', '帐号名称不能为空！', 1, 'regex', 3),
	    array('uname', '0,32', '帐号名称不能超过32个字符！', 1, 'length', 3),
	    array('password', 'require', '密码不能为空！', 1, 'regex', 3),
	    array('password', '4,15', '密码不能少于4个字符且不能超过15个字符！', 1, 'length', 3),
		array('begintime', 10, '时间戳错误', 0, 'length'), // 验证时间戳长度是否正常
		array('status', array(0, 1), '状态错误', 0, 'in') // 验证状态
	);
	
	/*
	 * 自动完成
	 * */
	protected $_auto = array( 
		array('password', 'md5', 3, 'function'), // 对password字段在新增和编辑的时候使md5函数处理
		array('begintime', 'time', 1, 'function'), // 对begin_time字段在新增的时候写入当前时间戳
		array('status', 1, 1) // 新增的时候把status字段设置为1
	);
	
	/*
	 * @ prama {array{uname,password}}
	 * @ return true/false
	 * 添加
	 * */
	 public function plus($data){
	    if($this->where('uname = "%s"',$data['uname'])->find()) return FALSE;
		$this -> uname = $data['uname'];
		$this -> password = md5($data['password']);
		$this -> begintime = date("Y-m-d H:i:s",NOW_TIME);
		$this -> status = 1;
		if( $this -> add()) return TRUE;
		return FALSE;
	 }
	 
	 public function edit($data){
	     
	         $this -> user_id = $data['user_id'];
	         $this -> uname = $data['uname'];
	    	 $this -> password = md5($data['password']);
	         
	        // $this -> status = 1;
	         if($this -> save()) return TRUE;
	         return FALSE;
	         
	     
	     
	     
	 }
}
