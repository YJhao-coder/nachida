<?php
$ip = $_SERVER["REMOTE_ADDR"];
$wan = (int)$_GET['wan'];
$text1 = $_GET['mz1'];
$text2 = $_GET['mz2'];
$text = $_GET['text'];
include "../nahida_bz/mysql.php";

if ($wan >= 0 && $wan <= 2) {
    //cookie判断
    if ($_COOKIE["time-cookie"] == 'yingzhenyu-yes') {
        $ipjg = file_get_contents("yzy/txt/jg");
        echo $ipjg . '分钟内只能发布一次哦，时间未到！';
        exit();
    }

    if ($wan == 0) {
        $wgc_nr = $text1 . $text2 . $text;
    } else {
        $wgc_nr = $text2 . $text;
    }

    $wgc = file_get_contents("yzy/txt/wgc");
    if ($wgc != "") {
        $wgc_fl = explode("|", $wgc);
        foreach ($wgc_fl as $wgcy) {
            $wgcjc = substr_count($wgc_nr, $wgcy);
            if ($wgcjc > 0) {
                echo "\"$wgcy\" 敏感违规词，发布失败！";
                exit();
            }
        }
    } else {
        echo "管理员没有指定任何违规词，无非发布任何数据！";
        exit();
    }

    $fjdip = explode("|", file_get_contents("yzy/txt/fjip"));
    foreach ($fjdip as $qdgip) {
        if ($ip == $qdgip) {
            echo "你当前没有任何权限发布内容！";
            exit();
        }
    }

    $sql = "select * from love_ip ORDER BY id DESC;";
    $nahida = $Mysql->query($sql);
    $my_sj = $nahida->fetch_all();
    if (!isset($my_sj[0])) {
        //记录IP
        $ip_sql = "INSERT INTO love_ip(id,name,ip,time) VALUES (null,'{$text2}','{$ip}','" . time() . "');";
        $jlip = $Mysql->query($ip_sql);
        if (!$jlip) {
            echo '记录IP失败，无法执行添加操作！';
            exit();
        }
    } else {
        foreach ($my_sj as $ipjl) {
            if ($ipjl[2] == $ip) {
                //判断时间
                $scjs = (int) ((time() - $ipjl[3]) / 60);
                $ipjg = file_get_contents("yzy/txt/jg");

                if ($scjs < $ipjg) {
                    echo '你只能在' . abs($ipjg - $scjs) . '分钟后才能发布，时间未到！';
                    //戏耍普通攻击者3次，小白戏耍无限次，高手1次。
                    $jg_m = abs($ipjg - $scjs) * 60;
                    setcookie("time-cookie", 'yingzhenyu-yes', time() + (int) ($jg_m), '/');
                    exit();
                } else {
                    $name = $text2;
                    if ($wan == 0) {
                        if ($name == "") {
                            $name = "匿名";
                        }
                    } else {
                        if ($name == "") {
                            echo '您还没输入昵称！';
                            exit();
                        }
                    }
                    $sql = "update love_ip set name='{$name}',time='" . time() . "' where ip='{$ip}';";
                    $jlip = $Mysql->query($sql);
                    if (!$jlip) {
                        echo '修改记录IP时间失败，无法执行添加操作！';
                        exit();
                    }
                    break;
                }
            } else {
                continue;
            }
        }
        if (!isset($name)) {
            $name = $text2;
            if ($wan == 0) {
                if ($name == "") {
                    $name = "匿名";
                }
            } else {
                if ($name == "") {
                    echo '您还没输入昵称！';
                    exit();
                }
            }
            //记录IP
            $ip_sql = "INSERT INTO love_ip(id,name,ip,time) VALUES (null,'{$name}','{$ip}','" . time() . "');";
            $jlip = $Mysql->query($ip_sql);
            if (!$jlip) {
                echo '记录IP失败，无法执行添加操作！';
                exit();
            }
        }
    }
}
$text1 = str_replace(array("\r\n", "\r", "\n"), "", $text1);
$text2 = str_replace(array("\r\n", "\r", "\n"), "", $text2);
$text = str_replace(array("\r\n", "\r", "\n"), "", $text);
if ($text == "") {
    echo '您要发布的内容，没有任何输入！！！';
    exit();
}
//防止sql注入
$text1 = mysqli_real_escape_string($Mysql, $text1);
$text2 = mysqli_real_escape_string($Mysql, $text2);
$text = mysqli_real_escape_string($Mysql, $text);

if ($wan == 0) { //表白墙标签
    if ($text1 == "") {
        echo '对方的昵称还没有输入！！！';
        exit();
    }
    if ($text2 == "") {
        $text2 = "匿名";
    }
    $wan = "love";
    $sql = "INSERT INTO {$wan}(id, ta,i,love,time)  VALUES (null,'{$text2}','{$text1}','{$text}','" . time() . "');";
} elseif ($wan == 1) { //日常标签
    if ($text1 != "") {
        if (filter_var($text1, FILTER_VALIDATE_URL) == false) {
            echo '您输入的图片链接不合法，无法发送！';
            exit();
        }
    }
    if ($text2 == "") { //此处不会被执行，但我就是不想删除此处代码
        echo '您的昵称还没有输入！！！';
        exit();
    }
    $wan = "nahida";
    $sql = "INSERT INTO {$wan}(id,tplj,name,nahida,time) VALUES (null,'{$text1}','{$text2}','{$text}','" . time() . "');";
} elseif ($wan == 2) { //公告标签
    if (isset($_COOKIE['nahida_mm'])) {
        $sql = "select * from admin";
        $nahida = $Mysql->query($sql);
        $my_sj = $nahida->fetch_all()[0];
        if ($_COOKIE['nahida_mm'] != $my_sj[1]) {
            die("");
        }
        //存在；
    } else {
        die("");
        //不存在；
    }
    $wan = "root";
    $sql = "INSERT INTO {$wan}(id,root,time) VALUES (null,'{$text}'," . time() . ");";
} else {
    die("('操作失败'); window.location.replace('index.php');");
}