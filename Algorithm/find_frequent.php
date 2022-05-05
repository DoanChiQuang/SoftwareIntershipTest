<?php
    function findFrequent($arr) {
        $fArr = [];        
        $arrLen = count($arr);
        $arr = ConvertToString($arr);
        while ($arr != []) {            
            $value = array_pop($arr);
            if(linerSearch($arr,$value)==1) {
                $fArr[] = $value;
            }
        }
        foreach($fArr as $value) {
            echo $value." ";
        }        
    }
    function linerSearch($arr, $value) {
        $arrLen = count($arr);
        for($i=0; $i<$arrLen; $i++) {
            if($arr[$i] == $value) {
                return 1;
            }            
        }
        return 0;
    }
    function ConvertToString($arr) {
        $arrLen = count($arr);        
        for($i=0; $i<$arrLen; $i++) {
            if(gettype($arr[$i])=="NULL") {
                $arr[$i] = "null";
            }
            else if(gettype($arr[$i])=="boolean" && $arr[$i]==1) {
                $arr[$i] = "true";
            }
            else if(gettype($arr[$i])=="boolean") {
                $arr[$i] = "false";
            }
        }
        return $arr;
    }  
    // Test case 1
    echo '<h4>Test case 1:</h4>';
    findFrequent([3, 7, 3]);
    // Test case 2
    echo '<h4>Test case 2:</h4>';
    findFrequent([null, "hello", true, null]);
    // Test case 3
    echo '<h4>Test case 3:</h4>';
    findFrequent([false, "up", "down", "left", "right", true, false]);
?>