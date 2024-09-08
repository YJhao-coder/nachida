<?php
$ljdz = "localhost";
$account = "数据库账号";
$pass_world = "数据库密码";
$databases = "要使用的数据库名字";

// 使用mysqli_connect()函数连接数据库
$Mysql = mysqli_connect($ljdz, $account, $pass_world, $databases);

// 检查连接是否成功
if (!$Mysql) {
    die("MYSQL数据库连接错误! 检查数据库配置文件，网当前错误返回： " . mysqli_connect_error());
} else {
    // 设置字符集为utf8
    $Mysql->set_charset("utf8");
}
?>