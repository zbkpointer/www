<!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<title>警报信息提醒界面</title>
<script>
	window.onload=function(){
		
		var obtnImg = document.getElementById("button_img");
		var oSpan = document.getElementsByTagName("span");
		var oAudio = document.getElementsByTagName("audio");
		var my_josn = {"contion":false};
		
		
		obtnImg.onclick=function(){
			obtnImg.src="./image/yes.jpg";//改变按钮图片
			my_josn.contion=true;
			oSpan[0].style.color="black";//改变字体颜色
			oSpan[0].innerHTML="已处理";
			oAudio[0].pause();//暂停播放声音
			//alert(my_josn.contion);
			
			
			
			
		}
	function submitData() { 
		// jquery 表单提交 
		$("#submitform").ajaxSubmit(function(message) { 
		// 对于表单提交成功后处理，message为提交页面saveReport.htm的返回内容 
		}); 

		return false; // 必须返回false，否则表单会自己再做一次提交操作，并且页面跳转 
	} 
		
	}
</script>
<style>

	#head{
		background:black;
		height:240px;
		text-align:center;
		
		
	}
	#middle{
		
		margin:0px auto;
		
	}
    table{
        text-align: center;
		
		margin:0px auto;


    }

    table tr th{
        width: 100px;
        height: 40px;
        font-family: 宋体;
        font-weight: bolder;
        font-size: 20px;
    }
    table tr td{
        width: 100px;
        height: 35px;
        font-size: 20px;
        font-weight: lighter;

    }
    .tableCell{
        height: 20px;
        width: 230px;
    }
	
	.alertState span{
        color: red;
    }
   
    span{
        color:red;
    }
	
	#bottem{
		margin-top:50px;
		text-align:center;
	}

</style>
</head>
<body>

	<audio  autoplay="autoplay" loop="loop">
	<source src="./sound/alert.mp3" type="audio/mpeg"></source>
	<source src="./sound/alert.ogg" type="audio/ogg"></source>
	</audio>
	<!--[if lte IE 8]>
        <embed id="a_player_ie8" type="audio/mpeg" src="./sound/alert.mp3" autostart="false"></embed>    
    <![endif]-->

	
	<div id="head">
	<img src="./image/alert.gif"  width="280px" height="240px"/>
	</div>
	
	
	<div id="middle">	
	<table  border="1" cellspacing="0" cellpadding="0">

		<tr >
			
			<th >楼栋</th>
			<th >单元</th>
			<th >房间</th>
			<th >警报类型</th>
			<th >级别</th>
			<th class="tableCell">时间</th>
			<th>状态</th>
		</tr>
		
	<?php
		  
			require_once "mysql_conn.php";
			
			echo "<br>";
			//查询数据表中的数据
			$sql = "SELECT * FROM alertinformation order by id desc limit 1";
			$result=$conn->query($sql);
			
			if($result->num_rows>0){
				while($row = $result->fetch_assoc()) { 
				
				echo "<tr>";		
				echo "<td>".$row["idofbuilding"]."</td>";
				echo "<td>".$row["cellofbuilding"]."</td>";
				echo "<td>".$row["idofroom"]."</td>";
				echo "<td>".$row["alertcategory"]."</td>";
				echo "<td>".$row["alertlevel"]."</td>";
				echo "<td>".$row["alerttime"]."</td>";			
				
				if($row["alertstatus"]=="未处理"){
					echo "<td class="."alertState"."><span>".$row["alertstatus"]."</span></td>";
				}else{
					echo "<td>".$row["alertstatus"]."</td>";
				}
				$time = $row["alertstamp"];
				echo "</tr>";
				
				$result->close();
				}
			} else {
				echo "0 结果";
				}
			
			
	?>
	</table>
	</div>
	<div id="bottem">
		<!-- 空iframe，用于协助处理form提交后不进行页面跳转的问题 -->
		<iframe id="iframe_display" name="iframe_display" style="display: none;"></iframe>

		<form  id="submitform" method="post" action="update.php" target="iframe_display" >
		<?php echo "<input type='hidden' name='timestamp' value={$time}>" ?>
		<button type="submit"  ><img id="button_img" src="./image/ensure.jpg"  width="280px" height="240px"/></button>
		</form>
		<?php
			
			
			
			//$sql = "UPDATE alertinformation set alertstatus='已处理' where alertstamp={$time} ";//采用芯片或者连续
			
			//$conn->query($sql);
			//echo $conn->error;
			
			mysqli_close($conn); // 关闭mysql连接
			
		?>
	</div>
</body>

</html>