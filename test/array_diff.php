<?php
// echo $_session['user_id'];
// $input =[3,2,1];
// $main=[1,3,0,0,0,0,0,0,0,0];

// function solve($input,$main){
//     $in = count($input);
//     $mi = count($main);
//     $rem =$mi-$in;
//     if($rem){
//         for($i=0;$i<$in;$i++){
//             $main[$i] = $input[$i];
//         }
//         return $main;
//     }
// }
// echo '<pre>';
// print_r($input);
// print_r($main);
// print_r(solve($input,$main));



$user =[4,2,3,1,2];
$main=[1,2,3,0,0,0,0,0,0,0];
$count =count($user);
echo $count;
for($i=$count-1;$i<count($main);$i++){
    array_push($user,0);
}
echo '<pre>';
print_r($user);

echo '<hr >';
print_r($user);
$b=$user;
print_r($b);
array_push($b,4);
array_push($b,6);
print_r($b);

