<?php
$dir = __DIR__."\man\\";
$dir_copy = __DIR__."\man_copy\\";
//图片文件夹
$list = scandir($dir);
$sum = 0;
$sub_sum_fangwei = 0;
$sub_sum_zhenshu= 0;
$jude = 10;
$type = "attack";
foreach ($list as $item) {
    if(!in_array($item,['.','..'])){
        $arr = explode(".", $item);
        $origin_name = reset($arr);
        if($sub_sum_zhenshu > $jude-1) {
            $sub_sum_zhenshu = 0;
        }
        //暗黑2的素材
        if($sum % $jude == 0 && $sum!=0) {
            $sub_sum_fangwei++;
        }
        
        var_dump("+++++++++++++方位++++++++++++++");
        var_dump($dir_copy.$sub_sum_fangwei);
        var_dump("+++++++++++++帧数++++++++++++++");
        var_dump($sub_sum_zhenshu);
        copy($dir.$origin_name.'.png',$dir_copy.$sub_sum_fangwei.'_'.$type.'_'.$sub_sum_zhenshu.'.png');
        $sub_sum_zhenshu++;
        $sum++;
    }
}
