<?php
$dir = __DIR__ . "\man\\";
$dir_copy = __DIR__ . "\man_copy\\";

//图片文件夹
$list = scandir($dir);
$sum = 0;
$sub_sum_fangwei = 0;
$sub_sum_zhenshu = 0;
$jude = 19;
$type = "sk2";
foreach ($list as $item) {
    if (!in_array($item, ['.', '..'])) {
        $arr = explode(".", $item);
        $origin_name = reset($arr);
        if ($sub_sum_zhenshu > $jude) {
            $sub_sum_zhenshu = 0;
        }

        if (
            $sum == 20 || $sum == 40 || $sum == 60 || $sum == 80 || $sum == 100 || $sum == 120 || $sum == 140  || $sum == 160
        ) {
            $sub_sum_fangwei++;
        }


        copy($dir . $origin_name . '.png', $dir_copy . $sub_sum_fangwei . '_' . $type . '_' . $sub_sum_zhenshu . '.png');
        $sub_sum_zhenshu++;
        $sum++;
    }
}
