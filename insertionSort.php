<?php
/**
 * Created by PhpStorm.
 * User: zhanghengyu
<<<<<<< HEAD
 * Date: 2016/7/22
 * Time: 17:42
 */

=======
 * Date: 2016/7/24
 * Time: 17:22
 * 插入排序
 */
>>>>>>> 36f96d7dfaa3a92c4258fe60cbc0c9ec7972f516
function insertionSort(&$arr)
{
    $len = count($arr);
    for ($i = 0; $i < $len; $i++) {
<<<<<<< HEAD
        for ($j = 0; $j < $i; $j++) {
            if($arr[$j]>$arr[$i]){
                
            }
        }
    }
}
=======
        for ($j = $i; $j > 0; $j--) {
            if ($arr[$j] < $arr[$j - 1]) {
                $tmp = $arr[$j];
                $arr[$j] = $arr[$j - 1];
                $arr[$j - 1] = $tmp;
            }
        }
    }
}

$arr = array(9, 2, 232, 12, 1, 3, 53, 17, 7);
insertionSort($arr);
var_dump($arr);
>>>>>>> 36f96d7dfaa3a92c4258fe60cbc0c9ec7972f516
