<?php
	if(isset($_POST['name'])){
		$name = $_POST['name'];
	}else{
		$name = "(Not entered)";
	}
	echo <<<_END
	<!doctype html>
	<html>
	<head>
		<title>表单学习</title>
	</head>
	<body>
	
	你的名字是：$name <br>
	
	<form  method="post" action="form_learn.php">
	你的名字？
	<br />
	
	<input type="hidden" name="name" value="zbk">
	
	<button type="submit">提交</button>
	</form>


	</body>
		
		
		
		
	</html>
_END
?>