<?php
	define ("TRUE",6);
	echo TRUE;
	echo "你好".TRUE."你好";
	echo "<br>";
	
	$user1 = new Users();
	echo "<br>";
	$user1->My_Id();
	echo "<br>";
	echo $user1->Id==NULL?"不存在":"存在";
	echo "<br>";
	print_r($user1);
	
	
	
	class Users{
		public $Id,$Name,$Sex;
		
		function My_Id(){
		//global $Id;
		$Id = 1;
		echo $Id;
		}
		
		
		
	}
	
	
?>