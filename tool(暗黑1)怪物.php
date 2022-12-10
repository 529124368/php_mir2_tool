<?php
$dir = __DIR__ . "\man\\";
$dir_copy = __DIR__ . "\man_copy\\";

//图片文件夹
$list = scandir($dir);
$sum = 0;
$sub_sum_fangwei = 0;
$sub_sum_zhenshu = 0;
$jude = 11;
$type = "attack";
foreach ($list as $item) {
    if (!in_array($item, ['.', '..'])) {
        $arr = explode(".", $item);
        $origin_name = reset($arr);
        if ($sub_sum_zhenshu > $jude) {
            $sub_sum_zhenshu = 0;
        }
        if (
            $sum == 12 || $sum == 24 || $sum == 36 || $sum == 48 || $sum == 60 || $sum == 72 || $sum == 84 || $sum == 112
            || $sum == 128 || $sum == 144 || $sum == 160 || $sum == 176 || $sum == 192 || $sum == 208 || $sum == 235
            || $sum == 246 || $sum == 257 || $sum == 268 || $sum == 279 || $sum == 290 || $sum == 301 || $sum == 336
            || $sum == 360 || $sum == 384 || $sum == 408 || $sum == 432 || $sum == 456 || $sum == 480
        ) {
            $sub_sum_fangwei++;
        }

        //dead
        if ($sum == 96) {
            $sub_sum_fangwei = 0;
            $jude = 15;
            $type = "dead";
        }
        if ($sum == 224) {
            $sub_sum_fangwei = 0;
            $jude = 10;
            $type = "stand";
        }

        if ($sum == 312) {
            $sub_sum_fangwei = 0;
            $jude = 23;
            $type = "run";
        }



        copy($dir . $origin_name . '.png', $dir_copy . $sub_sum_fangwei . '_' . $type . '_' . $sub_sum_zhenshu . '.png');
        $sub_sum_zhenshu++;
        $sum++;
    }
}
