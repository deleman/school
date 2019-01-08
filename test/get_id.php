<?php
require_once ('./../lib/database.php');
$db = new Database();
 function get_user_id($name,$lname,$number,$db){
//     $sql = "SELECT * FROM users";
//     $db->query($sql);
//    return $db->resultSet();
$sql = "SELECT id FROM users WHERE name=:name and fname=:lname and number=:num";
        $db->query($sql);
        $db->bind(':name',$name,PDO::PARAM_STR);
        $db->bind(':lname',$lname,PDO::PARAM_STR);
        $db->bind(':num',$number);
        $data =$db->resultSet();
    foreach ($data as $key => $value) {
        echo ($value->id).'<br >';  
    }
        
}

$r = get_user_id('محمد','راوند',950238032,$db);
