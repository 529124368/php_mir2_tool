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

