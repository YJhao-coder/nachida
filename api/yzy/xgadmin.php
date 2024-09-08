<?php
@($zh=$_GET['zh']);
@($mm=$_GET['mm']);
if($zh=="" || $mm==""){
  die("alert('没有输入要修改的账号或密码！');window.location.replace('../../admin/wzsz.php');</script>");
}
include "../../nahida_bz/mysql.php";
if(isset($_COOKIE['nahida_mm'])){
  $sql = "select * from admin";
  $nahida = $Mysql->query($sql);
  $my_sj= $nahida->fetch_all()[0];
  if($_COOKIE['nahida_mm']!=$my_sj[1]){
    die("<script>alert('没有操作权限！'); window.location.replace('../../admin/index.html');</script>");
  }
  //存在;
}else{
  die("<script>alert('没有操作权限！'); window.location.replace('../../admin/index.html');</script>");
  //不存在;
}
$sql= "update admin set nc='{$zh}',mm='{$mm}' where 1;";
$nahida = $Mysql->query($sql);
if($nahida){
	die("<script>alert('账号和密码修改成功！'); window.location.replace('../../admin/wzsz.php');</script>");
}else{
	die("<script>alert('账号和密码修改失败！'); window.location.replace('../../admin/wzsz.php');</script>");
}
?>