传奇素材

用PHP进行进行批量修改图片素材名字。

达到效果
->0_stand_0 0_stand_1...
->0_run_0 0_run_1...
->0_attack_0 0_attack_1...

```PHP

<?php
$dirs = new RecursiveIteratorIterator(new RecursiveDirectoryIterator("C:\\xampp\\htdocs"), RecursiveIteratorIterator::SELF_FIRST);
$regIts = new RegexIterator($dirs, '/^.+\.php$/i');
$count=0;
foreach($regIts as $k=>$p){
	opcache_compile_file($p);
}
echo $count;
?>
```
php安装
./configure --prefix=/root/download/php8 --enable-fpm  --with-curl  --enable-gd --enable-mbstring  --enable-mysqlnd --with-pdo-mysql=mysqlnd


```PHP
$img = imagecreatetruecolor(100, 40);
$black = imagecolorallocate($img, 0x00, 0x00, 0x00);
$green = imagecolorallocate($img, 0x00, 0xFF, 0x00);
$white = imagecolorallocate($img, 0xFF, 0xFF, 0xFF);
imagefill($img, 0, 0, $white);    //绘制底色为白色
//绘制随机的验证码
$code = '';
$key="QWERTYUIOPASDFGHJKLZXCVBNMqwertyuiopasdfghjklzxcvbnm0123456789";
$code = $key[rand(0, strlen($key)-1)].$key[rand(0, strlen($key)-1)].$key[rand(0, strlen($key)-1)].$key[rand(0, strlen($key)-1)];
imagestring($img, 6, 13, 10, $code, $green);
//加入噪点干扰
for ($i = 0; $i < 50; $i++) {
    imagesetpixel($img, rand(0, 100), rand(0, 100), $black);
    imagesetpixel($img, rand(0, 100), rand(0, 100), $green);
}
//输出验证码
header("content-type: image/png");
imagepng($img);
imagedestroy($img);

php extends study web site
->https://www.php.cn/php-weizijiaocheng-392678.html
->https://segmentfault.com/a/1190000007571341
->https://wiki.php.net/rfc/fast_zpp
->https://github.com/gaohuia/php-src-comment
->https://github.com/pangudashu/php7-internal
->https://qiita.com/d_nishiyama85/items/98f901dcc848a79c81fb
->https://net-newbie.com/phpext/b-gdb.html
->https://yangxikun.com/tags.html#PHP%E6%89%A9%E5%B1%95-ref
->https://net-newbie.com/phpext/7-zval.html#id2
->https://www.kancloud.cn/nickbai/php7/363323
->https://blog.csdn.net/rorntuck7/article/details/86307015
->https://blog.icodef.com/2018/09/25/1508

get all static web page
->https://bazhan.wang/





