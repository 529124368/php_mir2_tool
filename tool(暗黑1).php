<?php
$dir = __DIR__ . "\man\\";
$dir_copy = __DIR__ . "\man_copy\\";

//图片文件夹
$list = scandir($dir);
$sum = 0;
$sub_sum_fangwei = 0;
$sub_sum_zhenshu = 0;
$jude = 9;
$type = "stand";
foreach ($list as $item) {
    if (!in_array($item, ['.', '..'])) {
        $arr = explode(".", $item);
        $origin_name = reset($arr);
        if ($sub_sum_zhenshu > $jude) {
            $sub_sum_zhenshu = 0;
        }

        if (
            $sum == 10 || $sum == 20 || $sum == 30 || $sum == 40 || $sum == 50 || $sum == 60 || $sum == 70  || $sum == 100 || $sum == 120
            || $sum == 140 || $sum == 160 || $sum == 180 || $sum == 200 || $sum == 220 || $sum == 248 || $sum == 256 || $sum == 264 || $sum == 272 || $sum == 280
            || $sum == 288 || $sum == 296
        ) {
            $sub_sum_fangwei++;
        }

        //跑步图片
        if ($sum == 80) {
            $sub_sum_fangwei = 0;
            $jude = 19;
            $type = "attack";
        }
        //攻击图片
        if ($sum == 240) {
            $sub_sum_fangwei = 0;
            $jude = 7;
            $type = "run";
        }


        copy($dir . $origin_name . '.png', $dir_copy . $sub_sum_fangwei . '_' . $type . '_' . $sub_sum_zhenshu . '.png');
        $sub_sum_zhenshu++;
        $sum++;
    }
}
