<?php
  @($id=(int)$_GET['id']);
  @($wan=(int)$_GET['wan']);
  @($mz1=$_GET['mz1']);
  @($mz2=$_GET['mz2']);
  @($nr=$_GET['nr']);
  include "../nahida_bz/mysql.php";
if(isset($_COOKIE['nahida_mm'])){
  $sql = "select * from admin";
  $nahida = $Mysql->query($sql);
  $my_sj= $nahida->fetch_all()[0];
  if($_COOKIE['nahida_mm']!=$my_sj[1]){
    die("<script>alert('没有操作权限！'); window.location.replace('../admin/index.html');</script>");
  }
  //存在;
}else{
  die("<script>alert('没有操作权限！'); window.location.replace('../admin/index.html');</script>");
  //不存在;
}
  /*echo $wan."<br/>". $id."<br/>".$mz1."<br/>". $mz2."<br/>".$nr;*/
 if($wan==0){//表白墙标签
  $wan="love";//多余代码可以直接写在下面但我就是想写这里
  $sql= "update {$wan} set ta='{$mz1}',i='{$mz2}',love='{$nr}' where id={$id};";
  $wan=0;
  //echo $sql;
  }elseif($wan==1){//日常标签
  $wan="nahida";
  $sql= "update {$wan} set tplj='{$mz1}',name='{$mz2}',nahida='{$nr}' where id={$id};";
  $wan=1;
  }elseif($wan==2){//公告标签
  $wan="root";
  $sql= "update {$wan} set root='{$nr}' where id={$id};";
  $wan=2;
  }else{
  die("删除操作失败!");
  }
  $nahida = $Mysql->query($sql);
  //$my_sj= $nahida->fetch_all();
  if($nahida){
  die("<script>alert('修改ID{$id}成功！'); window.location.replace('../admin/love_gl.php?wan={$wan}');</script>");
  }else{
  die("<script>alert('修改ID{$id}失败！'); window.location.replace('../admin/love_gl.php?wan={$wan}');</script>");
  }
?>