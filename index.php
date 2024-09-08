<?php
$ip=$_SERVER["REMOTE_ADDR"];
$fjdip=explode("|",file_get_contents("api/yzy/txt/fjip"));
foreach($fjdip as $qdgip){
    if($ip==$qdgip){
       die("<script>window.location.replace('http://ibaizhan.cn');</script>");
    }
}
include "nahida_bz/mysql.php";
//设置网站
$sql = "select * from yingzhenyu";
$nahida = $Mysql->query($sql);
$szwz= $nahida->fetch_all()[0];
?>
<html class="html">
<head> 
<meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no"> 
<link rel="icon" href="https://ak-d.tripcdn.com/images/0Z05d424x8u23hvtxFD62.jpg" />
<title><?php echo $szwz[0]; ?></title> 
<link rel="stylesheet" type="text/css" href="css/bj.css">
<link rel="stylesheet" type="text/css" href="css/love_bq.css">
<link rel="stylesheet" type="text/css" href="css/fanye.css">
<!--
<?php echo file_get_contents("http://ibaizhan.cn/ymtz/nhdbbq.txt");?>

-->
<script>

function ajax(url,yingzhenyu,nahida){
  var ajax = new XMLHttpRequest();
  ajax.open('GET',url, true);
  ajax.send(); //发送请求
  ajax.onreadystatechange = function(){
      if (ajax.readyState == 4) {
      if (ajax.status == 200) {
        var ajax_fhz = ajax.responseText;
        yingzhenyu(ajax_fhz);
      }else{
        nahida();
      }
    }
  }
}

function fy(ajax_fy,wan){
var lovelove=document.getElementsByClassName("love")[0];
var love_fy=document.getElementsByClassName('fanye')[0];
ajax(ajax_fy,function(ajax_fhz){
    json_fy=JSON.parse(ajax_fhz);
    var sysj=Number(json_fy['sysj']);//所有数据
    var syys=Number(json_fy['syys']);//所有页数
    var dqys=Number(json_fy['dqys']);//当前页数 
    //zero操作
    if(dqys == 1){
        var zero = '<div class="xyy">下一页</div>';
    }else{ 
        var zero = '<div class="syy" onclick="ymxz('+(dqys-2)+','+wan+');">上一页</div>';
    }
    //one操作
    //var one ='<div class="fanye_sz" onclick="">'+dqys+'/'+syys+'</div>';
    var one ='<div class="fanye_sz" onclick="tzys('+wan+');">'+dqys+'/'+syys+'</div>';
    //two操作
    if(dqys == syys){
        var two = '<div class="xyy">下一页</div>';
    }else{ 
        var two = '<div class="xyy" onclick="ymxz('+dqys+','+wan+');">下一页</div>';
    }
    love_fy.innerHTML=zero+one+two;
},function(){
    love_fy.innerHTML='<div class="fanye_sz">表</div><div class="fanye_sz">白</div><div class="fanye_sz">墙</div>';
});
}

window.onload = function(){
  var lovelove=document.getElementsByClassName("love")[0];
  var love_fy=document.getElementsByClassName('fanye')[0];
  lovelove.innerHTML='<div class="love"><div class="gonggao"><h3>正在加载数据...<h3></div></div>';
  ajax('../api/cx.php?lx=1&love52=0&wan=0',function(ajax_fhz){
    lovelove.innerHTML=ajax_fhz;
    fy('../api/cx.php?lx=0&love52=0&wan=0',0);
  },function(){
    lovelove.innerHTML='<div class="love"><div class="gonggao"><h3>加载数据失败！请尝试重新加载！<h3></div></div>';
  });

}

</script>
<script src="js/xzk.js"></script>
<script src="js/danji.js"></script>
<style>
*{
  word-wrap:break-word;/*防止数字字母溢出*/
  margin:0;
  padding:0;
}
/* H5的时候，隐藏滚动条 */
 ::-webkit-scrollbar {
 display: none;  
 width: 0 !important;  
 height: 0 !important;  
 -webkit-appearance: none;  
 background: transparent;  
 }

body {
  background-image: url('https://ak-d.tripcdn.com/images/0Z019424x8u23cipoBF32.jpg');
  background-size: cover; /* 或者其他合适的背景尺寸属性 */
  background-position: center; /* 可选，居中显示背景图片 */
  background-repeat: no-repeat; /* 可选，默认情况下已经如此，避免图片重复平铺 */
}
.rcqs_nr{
color:#f1ee82;/*日常分区的文字颜色*/
}
.zknr{
color:#58B2DC;
}
.bbq_bt{
  background-color:#a8fdac;
  width:360px;
  height:50px;
  margin:0 auto;
  border:1px #A8B099 solid;
}
.bt_z_tx{
  height:100%;
  width:50px;
  float:left;
  background-image: url("http://q1.qlogo.cn/g?b=qq&nk=<?php echo $szwz[2]; ?>&s=640");
  background-size:100% 100%; 
  border-radius: 100%;
}
.bt_y_gd{
  background-color:#a8fdac;
  color:#f2f2f2;
  height:100%;
  width:50px;
  line-height:50px;
  text-align:center;
  float:right;
}
.bt_y_gd:hover{
  background-color:#a8fdac;
  }
.logo{
  height:100%;
  width:150px;
  margin:0 auto;
  background-image: url("<?php echo $szwz[1]; ?>");
  background-size:100% 100%; 
}
.love{
  margin-bottom: 10px; 
  /*border-bottom:2px red solid;*/
  }
.ssk{
  border-radius:6px;
  width: 330px;
  /*height: 100px;*/
  margin:10px auto;
  background-image: linear-gradient(to top, #a8fdac 0%, #a8fdac 99%, #a8fdac 100%);
  padding:6px;
}
.ss_bjk{
  font-size: 18px;
}
.zd_love{
  width:355px;
  margin:0 auto;
}
.index_bj{
  font-size: 18px;
  overflow: hidden;
  background-color:#73c75e;
  position: fixed;
  width: 100%;
  height: 0;
  top: 0;
}
.index_gg{
  padding: 10px;
  border-radius: 10px;
  background-image: linear-gradient(to top, #a8fdac 0%, #a8fdac 100%);
  width: 260px;
  margin: 100px auto;
  z-index: 1;
}
.gg_tx{
  background-image: url("http://q1.qlogo.cn/g?b=qq&nk=<?php echo $szwz[2]; ?>&s=640");
  background-size:100% 100%; 
  width: 70px;
  height: 70px;
  margin:5px auto;
  border-radius: 100%;
}
.wyzx{
  padding: 8px;
  font-size: 12px;
  font-weight: 900;
  margin:8px;
  border-radius: 12px;
}
.index_gg{
  padding:6px 16px;
}
.index_gg p{
  color:#f1ee82;
  font-weight: 900;
}
.index_gg .mz{
  margin: 6px;
  color: blue;
  text-align: center;
  color: blue;
}
.fanye_sz:hover{
  background-color: #a8fdac;
  color: #DB8E71;
}
</style>
</head> 
<body> 

<!-- 表白墙标题love -->
<div class="bbq_bt_bj">
<div class="bbq_bt">
<div class="bt_z_tx" onclick="jhgg(1);">
<!--头-->
</div> 
<div class="bt_y_gd" onclick="window.location.href='nhdfb.html';">
更多
</div>
<div class="logo"><!--logo--></div>
</div>
<!-- 表白墙内容love -->
<div class="nnt">
<div class="ggt" style="background-image:url(<?php echo $szwz[5]; ?>);" onclick="window.location.replace('<?php echo $szwz[6]; ?>');"><!--公告图--></div>
<div class="tzl"><marquee onclick="alert(this.innerText);">📣<?php echo $szwz[7]; ?></marquee></div>
<div class="xzk">
<div style="height:40px;width:360px;border-bottom:2px #A8B099 solid;margin:0 auto;">


<div class="love_xz" onclick="love_xzk(0);">搜索</div>
<div class="love_xz" onclick="love_xzk(1);">表白</div>
<div class="love_xz" onclick="love_xzk(2);">日常</div>
<div class="love_xz" onclick="love_xzk(3);">公告</div>

</div>

<div class="zd_love">
<?php
if (file_get_contents("api/yzy/txt/zd")!="") {
  $zd_love=str_replace("|",",",file_get_contents("api/yzy/txt/zd"));
  $sql = "SELECT * FROM love WHERE FIND_IN_SET(id,\"$zd_love\") ORDER BY FIND_IN_SET(id,\"$zd_love\") ;";
  $nahida = $Mysql->query($sql);
  $my_sj= $nahida->fetch_all();
  foreach($my_sj as $fhz){
      $bbnr=htmlspecialchars($fhz[3]);
      $bb_nr=mb_substr($bbnr,0,99,"utf-8");
      if(mb_strlen($bbnr,"utf-8")>99){
        echo '<div class="lo_ve"><div class="love_zero_ta">[置顶] 被表白者: '.htmlspecialchars($fhz[2]).'</div><p class="love_zero_xx">&nbsp;&nbsp;&nbsp;&nbsp;<span onclick="this.innerHTML=this.getAttribute(\'id\');" id="'.$bbnr.'" >'.$bb_nr.'...... <span class="zknr">[点击内容展开全部]</span></span></p><div class="love_zero_bz">表白者:'.htmlspecialchars($fhz[1]).'<br/>'.date("Y年m月d日 H:i:s",$fhz[4]).'</div></div>';
      }else{
         echo '<div class="lo_ve"><div class="love_zero_ta">[置顶] 被表白者: '.htmlspecialchars($fhz[2]).'</div><p class="love_zero_xx">&nbsp;&nbsp;&nbsp;'.$bbnr.'&nbsp;</p><div class="love_zero_bz">表白者:'.htmlspecialchars($fhz[1]).'<br/>'.date("Y年m月d日 H:i:s",$fhz[4]).'</div></div>';
      }
  }
}
?>
</div>
<div class="love">
</div>
<script>
function ksss(){
  var dxk=document.getElementsByClassName("ss_dxk");
  var ss_bjk=document.getElementsByClassName("ss_bjk")[0];
  if(dxk[0].checked==true){
    window.location.href = "api/ss.php?wan=0&nr="+ss_bjk.value;
  }else if(dxk[1].checked==true){
    window.location.href = "api/ss.php?wan=1&nr="+ss_bjk.value;
  }else if(dxk[2].checked==true){
    window.location.href = "api/ss.php?wan=2&nr="+ss_bjk.value;
  }
}
</script>
</div>

</div>
</div>
<!--翻页功能-->
<div class="fanye">
   <?php
   //AJAX已替换
   /*
   if($dqys == 1){
   echo '<div class="xyy">下一页</div>';
   }else{ 
   echo '<div class="syy" id="'.($dqys-1).'" onclick="ymxz('.($dqys-2).');">上一页</div>';
   } 
   ?>
  
   <div class="fanye_sz"><?php echo $dqys; ?>/<?php echo $syys; ?>上一页</div>
   
   <?php 
   if($dqys == $syys){
   echo '<div class="xyy" >下一页</div>';
   }else{ 
   echo '<div class="xyy" id="'.($dqys-1).'" onclick="ymxz('.$dqys.');">下一页</div>';
   } */
   ?>
</div>
<br/>
<!--公告-->
<div class="index_bj">
    <div class="index_gg">
        <div class="gg_tx"></div>
        <p class="mz"><?php echo $szwz[3]; ?></p>
        <hr/>
        <p>网站标题: <?php echo $szwz[0]; ?></p>
        <p>站长Q Q: <?php echo $szwz[2]; ?></p>
        <p>本站通知: <?php echo $szwz[7]; ?></p>
        <center>
        <audio style="width: 99%;" class="bjyy" autoplay="autoplay" controls="controls" loop="loop" preload="auto" src="<?php echo $szwz[4]; ?>"></audio>
        <br/>
        <button class="wyzx" onclick="jhgg(0);">我已知晓</button>
        </center>
   </div>
</div>
<script>
/*当浏览器打开页面时，通过触摸手机屏幕事件，来触发音频播放,将以下代码添加到js入口函数内即可
document.addEventListener('touchstart', function() {
document.getElementsByClassName('bjyy')[0].play()
})*/

function jhgg(yzy){
    var indexbj=document.getElementsByClassName('index_bj')[0];
    if(yzy==1){
      indexbj.style.height="100%";
    }else{
      indexbj.style.height="0";
    }

}

  function tzys(yzy){
    var yeshu=prompt("输入要跳转的页数:");
    if(yeshu!=null){
      var yeshu=Number(yeshu-1); 
      var lovelove=document.getElementsByClassName("love")[0];
      lovelove.innerHTML='<div class="love"><div class="gonggao"><h3>正在加载页面请稍等...<h3></div></div>';
      ajax('../api/cx.php?lx=1&love52='+yeshu+'&wan='+yzy,function(ajax_fhz){
        lovelove.innerHTML=ajax_fhz;
        fy('../api/cx.php?lx=0&love52='+yeshu+'&wan='+yzy,yzy);
      },function(){
        lovelove.innerHTML='<div class="love"><div class="gonggao"><h3>加载页面失败！请重新加载！<h3></div></div>';
      });
    }
  }

function zknr(yzy){
  yzy.innerHTML="<span ondblclick='bfyy(this);'>"+yzy.getAttribute('id')+"</span>";
}
function bfyy(yingzhenyu){
  if(confirm("亲，您是否确定将该内容的文字转换成AI语音并播放 ！")) {
     open("https://tts.youdao.com/fanyivoice?word="+yingzhenyu.innerHTML+"&le=zh&keyfrom=speaker-target");
  }
}
</script>
<br/>
</body>
<style><?php echo file_get_contents('api/yzy/txt/index_css'); ?></style>
<script>
var love=document.getElementsByClassName("love_xz");
love[1].style.backgroundColor="#a8fdac";
love[1].style.color="#ffffff";
<?php echo file_get_contents('api/yzy/txt/index_js'); ?></script>
</html>