<?php
// $dir = __DIR__."\man\\";
// $dir_copy = __DIR__."\man_copy\\";
// $dir_pianyi = __DIR__."\pianyi\\";
// //图片文件夹
// $list = scandir($dir);
// //坐标文件夹
// $list_zuobiao = scandir($dir_pianyi);
// $sum = 0;
// $sub_sum_fangwei = 0;
// $sub_sum_zhenshu= 0;
// $jude = 9;
// $type = "skillEX";
// foreach ($list as $item) {
//     if(!in_array($item,['.','..'])){
//         $arr = explode(".", $item);
//         $origin_name = reset($arr);
//         if($sub_sum_zhenshu > $jude) {
//             $sub_sum_zhenshu = 0;
//         }
//         //传奇3的素材
//         if($sum == 10 || $sum == 20 || $sum == 30 || $sum == 40 || $sum == 50 || $sum == 60 || $sum == 70) {
//             $sub_sum_fangwei++;
//         }
        
//         var_dump("+++++++++++++方位++++++++++++++");
//         var_dump($dir_copy.$sub_sum_fangwei);
//         var_dump("+++++++++++++帧数++++++++++++++");
//         var_dump($sub_sum_zhenshu);
//         copy($dir.$origin_name.'.png',$dir_copy.$sub_sum_fangwei.'_'.$type.'_'.$sub_sum_zhenshu.'.png');
//         //坐标文件遍历
//         foreach($list_zuobiao as $t) {
//             if(!in_array($t,['.','..'])){
//                 $arr = explode(".", $t);
//                 $file_name = reset($arr);
//                 if($origin_name == $file_name) {
//                     rename($dir_pianyi.$origin_name.'.txt',$dir_pianyi.$sub_sum_fangwei.'_'.$type.'_'.$sub_sum_zhenshu.'.txt');
//                 }
//             }
//         }
//         $sub_sum_zhenshu++;
//         $sum++;
//     }
// }


//坐标文件夹
$dir_pianyi = __DIR__."\pianyi\\";
$list_zuobiao = scandir($dir_pianyi);
$box = [];
foreach($list_zuobiao as $file_name) {
    if(!in_array($file_name,['.','..'])){
        
        $datas = array_filter(explode("\n",str_replace(array("\r"),"",file_get_contents("./pianyi/".$file_name))));
        $file_name_no_txt = reset(explode('.',$file_name));
        $file_name_detail = explode('_',$file_name_no_txt);
        if($box[$file_name_detail[1]][$file_name_detail[0]] == null) {
            $box[$file_name_detail[1]][$file_name_detail[0]] = []; 
        }
        if($datas[0] == null) {
            $left = 0;
        }else {
            $left = $datas[0];
        }
        if($datas[1] == null) {
            $right = 0;
        }else {
            $right = $datas[1];
        }
        array_push($box[$file_name_detail[1]][$file_name_detail[0]] , $left."_".$right);
    }
}
var_dump(json_encode($box));
$dir_pianyi_copy = __DIR__."\json_data.txt";
file_put_contents($dir_pianyi_copy,json_encode($box));
