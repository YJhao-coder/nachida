create table love(
id int primary key auto_increment,
ta varchar(6) not null comment '被表白名',
i varchar(6) not null comment '表白名',
love varchar(255) not null comment '表白内容',
time int not null comment '表白时间'
)charset utf8;

create table nahida(
id int primary key auto_increment,
tplj varchar(255) not null comment '图片链接',
name varchar(6) not null comment '日常人名',
nahida varchar(255) not null comment '日常内容',
time int not null comment '发布时间'
)charset utf8;

create table root(
id int primary key auto_increment,
root text not null comment '公告内容',
time int not null comment '发布时间'
)charset utf8;

create table love_ip(
id int primary key auto_increment,
name varchar(6) not null comment '记录昵称',
ip varchar(16) not null comment 'IP地址',
time int not null comment '记录时间'
)charset utf8;

create table yingzhenyu(
wzbt varchar(10) not null comment '网站标题',
wztb varchar(255) not null comment '网站图标',
zzqq varchar(10) not null comment '站长QQ',
zznc varchar(10) not null comment '站长昵称',
bjyy varchar(255) not null comment '背景音乐',
sytp varchar(255) not null comment '首页图片',
sttz varchar(255) not null comment '首图跳转',
sytz varchar(255) not null comment '首页通知'
)charset utf8;


INSERT INTO yingzhenyu(wzbt,wztb,zzqq,zznc,bjyy,sytp,sttz,sytz) VALUES ("小草神表白墙","","3596200633","小白初梦","https://cccimg.com/view.php/6b397ba359b09e0749fd0df5a9975c4f.mp3
","/api/bz/sjtp.php","http://ibaizhan.cn/","这里是小草神表白墙，欢迎您来表白！by：小白初梦");


create table admin(
nc varchar(255) not null comment '管理员昵称',
mm varchar(255) not null comment '管理员密码'
)charset utf8;

INSERT INTO admin(nc,mm) VALUES ('admin','123456');