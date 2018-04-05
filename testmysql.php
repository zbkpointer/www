<?php
        $host = "127.0.0.1"; //mysql主机地址
        $user = "root"; //mysql 登录账户
        $pwd = "199387"; //mysql登录密码
        $conn = new mysqli($host, $user, $pwd); //连接数据库
        if (!$conn) {//判断
            echo '连接数据库失败: ' . mysql_error();
        }
        echo "mysql 连接成功！";
        mysqli_close($conn); // 关闭mysql连接
?>