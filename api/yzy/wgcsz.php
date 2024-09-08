<?php
include "../../nahida_bz/mysql.php";
if(isset($_COOKIE['nahida_mm'])){
  $sql = "select * from admin";
  $nahida = $Mysql->query($sql);
  $my_sj= $nahida->fetch_all()[0];
  if($_COOKIE['nahida_mm']!=$my_sj[1]){
    die("没有操作权限！");
  }
  //存在;
}else{
  die("没有操作权限！");
  //不存在;
}
@($wgclx=(int)$_GET['wglx']);
if($wgclx==0){
	echo file_get_contents("txt/wgc");
}else if($wgclx==1){
	@($wgc=$_GET['wgc']);
	$wgcwj=fopen("txt/wgc","w");
	fwrite($wgcwj,$wgc);
	echo "已经保存设置违规词语！！！";
	fclose($wgcwj);
}
?>