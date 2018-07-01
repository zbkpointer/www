<!doctype html>
<html>

<head>
<meta charset="utf-8">
<title>警报信息数据库</title>
<style>
	#head{
		margin:0px auto;
		width:260px;
		height:40px;
		text-align:center;
	
		
		
	}
	#head h2{
		margin-bottem:0px;
	}
	#middle{
		
		height:630px;
		
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
    span{
        color: #1E90FF;
    }
    .alertState span{
        color: red;
    }
	#bottem{
		margin:5px auto;
		width:260px;
		text-align:center;
		
	}
	a{
		
		text-decoration:none;
	}

</style>
</head>
<body>

	<div id="head" ><h2>报警信息数据库</h2></div>
	<div id="middle">
	<table  border="1" cellspacing="0" cellpadding="0">
		<tr >
			<th >序号</th>
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
			
			
			//limit要求参数  
			$length=15;  
			$pagenum=@$_GET['page']?$_GET['page']:1;  
			  
			//数据总行数  
			$sqltot="select id from alertinformation";
			$result=$conn->query($sqltot);
			$arrtot=$result->num_rows;  
			$pagetot=ceil($arrtot/$length);  
		  
			//限制页数  
			if($pagenum>=$pagetot){  
				$pagenum=$pagetot;  
			}  
			$offset=($pagenum-1)*$length;  
			
			
			
			//查询数据表中的数据
			$sql="select * from alertinformation order by id limit {$offset},{$length}"; 
			//$sql = "SELECT * FROM alertinformation ";
			$result=$conn->query($sql);
			
			
			if($result->num_rows>0){
				
				// 输出数据
				while($row = $result->fetch_assoc()) { 
				
				echo "<tr>";		
				echo "<td>".$row["id"]."</td>";
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
				echo "</tr>";		
				}
			} else {
				echo "0 结果";
				}						
			
	?>
	</table>
	</div>
	<div id="bottem">
		<?php
			//计算上一页和下一页  
			$prevpage=$pagenum-1;  
			$nextpage=$pagenum+1;  
			echo "<a href='alertBase.php?page={$prevpage}'>上一页</a>"." 第{$pagenum}/{$pagetot}页 "."<a href='alertBase.php?page={$nextpage}'>下一页</a>"; 
			echo "<br/>";
			//echo "This is line {_LINE_} of file {_FILE_}";
			mysqli_close($conn); // 关闭mysql连接
			
		?>
		
	</div>
</body>

</html>