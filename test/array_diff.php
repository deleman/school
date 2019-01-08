<?php
echo $_session['user_id'];
$input =[3,2,1];
$main=[1,3,0,0,0,0,0,0,0,0];

function solve($input,$main){
    $in = count($input);
    $mi = count($main);
    $rem =$mi-$in;
    if($rem){
        for($i=0;$i<$in;$i++){
            $main[$i] = $input[$i];
        }
        return $main;
    }
}
echo '<pre>';
print_r($input);
print_r($main);
print_r(solve($input,$main));
