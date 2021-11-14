<?php
// $dir = __DIR__."\man\\";
// $dir_copy = __DIR__."\man_copy\\";


$dir = __DIR__."\weapon\\";
$dir_copy = __DIR__."\weapon_copy\\";
//图片文件夹
$list = scandir($dir);
$sum = 0;
$sub_sum_fangwei = 0;
$sub_sum_zhenshu= 0;
$jude = 5;
$type = "stand";
foreach ($list as $item) {
    if(!in_array($item,['.','..'])){
        $arr = explode(".", $item);
        $origin_name = reset($arr);
        if($sub_sum_zhenshu > $jude) {
            $sub_sum_zhenshu = 0;
        }

        //传奇5素材的场合
        //站立图片
        if($sum == 6 || $sum == 12 || $sum == 18 || $sum == 24 || $sum == 30 || $sum == 36 || $sum == 42  || $sum == 56 || $sum == 64 
        || $sum == 72 || $sum == 80 || $sum == 88 || $sum == 96 || $sum == 104 || $sum == 118 || $sum == 124 || $sum == 130 || $sum == 136 || $sum == 142 
        || $sum == 148 || $sum == 154) {
            $sub_sum_fangwei++;
        }
        
        //跑步图片
        if($sum == 48) {
            $sub_sum_fangwei = 0;
            $jude = 7;
            $type = "run";
        }
        //攻击图片
        if($sum == 112) {
            $sub_sum_fangwei = 0;
            $jude = 5;
            $type = "attack";
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
