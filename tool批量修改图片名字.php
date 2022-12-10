<?php
$dir = __DIR__."\man\\";
//图片文件夹
$list = scandir($dir);
foreach ($list as $item) {
    if(!in_array($item,['.','..'])){
        $arr = explode(".", $item);
        $origin_name = $arr[0].".".$arr[1];
        copy($dir.$origin_name.'.png',$dir.explode("_",$origin_name)[0]."_".explode("_",$origin_name)[1].'.png');
        unlink($dir.$origin_name.'.png');
    }
}
