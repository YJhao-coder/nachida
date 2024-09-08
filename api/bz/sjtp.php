<?php  
// 作者：小白初梦
// QQ:3596200633
// 随机的图片链接数组  
$imageLinks = [  
    'https://ak-d.tripcdn.com/images/0Z008424x8u23hvv623EF.jpg',  
    'https://ak-d.tripcdn.com/images/0Z040424x8u27h1lg933D.jpg',  
    'https://ak-d.tripcdn.com/images/0Z06f424x8u27855yE5FD.jpg',  
    'https://ak-d.tripcdn.com/images/0Z00h424x8u27acubB78D.jpg',  
    'https://ak-d.tripcdn.com/images/0Z018424x8u275lqw708D.jpg',  
    'https://ak-d.tripcdn.com/images/0Z00l424x8u27h1lv760B.jpg',  
    'https://ak-d.tripcdn.com/images/0Z028424x8u27gylk92B2.jpg',  
];  
  
// 确保链接数组不为空  
if (empty($imageLinks)) {  
    http_response_code(404);  
    echo "没有可用的图片链接";  
    exit;  
}  
  
// 随机选择一个图片链接  
$randomLink = $imageLinks[array_rand($imageLinks)];  
  
// 设置响应头，指示这是一个图片  
$imageInfo = getimagesize($randomLink);  
$imageMimeType = $imageInfo['mime'];  
header('Content-Type: ' . $imageMimeType);  
  
// 输出重定向到随机图片链接的头部  
header('Location: ' . $randomLink);  
exit;