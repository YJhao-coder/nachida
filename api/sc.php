<?php
// 获取GET参数
$id = (int)$_GET['id'];
$wan = (int)$_GET['wan'];

// 根据wan值设置标签
switch ($wan) {
    case 0:
        $wan = "love";
        break;
    case 1:
        $wan = "nahida";
        break;
    case 2:
        $wan = "root";
        break;
    default:
        die("无效的操作");
}

// 包含数据库连接文件
include "../nahida_bz/mysql.php";

// 检查cookie是否存在
if (!isset($_COOKIE['nahida_mm'])) {
    die("您没有操作权限");
}

// 查询数据库
$sql = "select * from admin";
$nahida = $Mysql->query($sql);
$my_sj = $nahida->fetch_all()[0];

// 检查密码是否正确
if ($_COOKIE['nahida_mm'] != $my_sj[1]) {
    die("您没有操作权限");
}

// 删除数据
$sql = "delete from {$wan} where id={$id};";
$nahida = $Mysql->query($sql);

// 判断是否删除成功
if ($nahida) {
    die("删除成功");
} else {
    die("删除失败");
}
?>