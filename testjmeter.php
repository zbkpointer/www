<?php

	$user_id = $_GET['user_id'];
	file_put_contents('/tmp/1.log', $user_id.PHP_EOL,  FILE_APPEND);
	echo $user_id;



?>