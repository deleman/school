<?php
require_once ('./../lib/database.php');
$db = new Database();
 function get_user_id($i,$db){
    $sql="select 1 from books_info where bokk_1=$i or
        bokk_2 =$i or bokk_3=$i or bokk_4=$i or bokk_5=$i or
        bokk_6=$i or bokk_7=$i or bokk_8=$i or bokk_9=$i or bokk_10 =$i";
        $db->query($sql);
        // $db->bind(':name',$name,PDO::PARAM_STR);
        // $db->bind(':lname',$lname,PDO::PARAM_STR);
        // $db->bind(':num',$number);
        $data =$db->resultSet();
        echo '<pre>';
        
        return count(($data));
        
}
$all=Array();
for($i=1;$i<200;$i++){
   $r =get_user_id("$i",$db);
   array_push($all,$r);
}
echo '<pre>';
print_r($all);

