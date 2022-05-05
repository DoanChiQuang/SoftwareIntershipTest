<?php
    function findMAX5($arr) {
        $nArr = quick_sort($arr);
        $condition = count($nArr) - 5;
        echo '[';
        for($i=count($nArr)-1; $i>=$condition; $i--) {
            if($i==$condition) {
                echo $nArr[$i];
            }            
            else
                echo $nArr[$i].",";
        }
        echo ']';
    }
    function quick_sort($arr) {
        if(count($arr)<=1) {
            return $arr;
        }
        $pivot = $arr[0];
        $arrLeft = [];
        $arrRight = [];        
        for($i=1; $i<count($arr); $i++) {
            if($arr[$i] < $pivot) {
                $arrLeft[] = $arr[$i];
            }
            else {
                $arrRight[] = $arr[$i];
            }
        }
        return (
            array_merge(quick_sort($arrLeft),array($pivot),quick_sort($arrRight))
        );
    }
    // Test case 1
    echo '<h4>Test case 1:</h4>';
    findMAX5([3,4,5,3,2,3,10,11]);    
    // Test case 2
    echo '<h4>Test case 2:</h4>';
    findMAX5([14,12,38,17,10,36,12,29,45,34,48,22]);    
    // Test case 3
    echo '<h4>Test case 3:</h4>';
    findMAX5([10,11,2,30,22,6,8,9,11,12,22]);    
?>