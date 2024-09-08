<?php
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
  
  @($wzbt=$_GET['wzbt']);
  @($wztb=$_GET['wztb']);
  @($zzqq=$_GET['zzqq']);
  @($zznc=$_GET['zznc']);
  @($bjyy=$_GET['bjyy']);
  @($sydt=$_GET['sydt']);
  @($dttz=$_GET['dttz']);
  @($sytz=$_GET['sytz']);
  $sql= "update yingzhenyu set wzbt='{$wzbt}',wztb='{$wztb}',zzqq='{$zzqq}',zznc='{$zznc}',bjyy='{$bjyy}',sytp='{$sydt}',sttz='{$dttz}',sytz='{$sytz}' where 1;";
  //echo "$sql";
  $nahida = $Mysql->query($sql);
  if($nahida){
  	die("<script>alert('网站信息修改成功！'); window.location.replace('../../admin/wzsz.php');</script>");
  }else{
  	die("<script>alert('网站信息修改失败！'); window.location.replace('../../admin/wzsz.php');</script>");
  }
?>