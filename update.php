<?php

	require_once "mysql_conn.php";
			
	
	if(isset($_POST['timestamp'])){	
		$time=$_POST['timestamp'];
	}else{
		echo "没有提交数据";
	}
	
	echo "<br>";
	$sql = "UPDATE alertinformation set alertstatus='已处理' where alertstamp={$time} ";//采用芯片或者连续
			
	$conn->query($sql);
	echo $conn->error;
	mysqli_close($conn);
?>