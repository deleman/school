<?php
require_once('./../lib/database.php');


 //your are inserted before
            //should update it
            // $term_name =array_shift($info['a']);
            // $main=$info['a'];
            // $count_info =count($info['a']);
            // for($i=$count_info;$i<count($base);$i++){
            //     array_push($main,0);
            // }

            $pdo = new Database();
            $main=[1,3,1,0,0,0,0,0,0,0];
            // $info = $solve($info['a'],$main);
            $sql = "UPDATE `books_info` SET `term_name`=:term_name,`bokk_1`=:b_1,`bokk_2`=:b_2,
            `bokk_3`=:b_3,`bokk_4`=:b_4,
            `bokk_5`=:b_5,`bokk_6`=:b_6,`bokk_7`=:b_7, `bokk_8`=:b_8,
            `bokk_9`=:b_9,`bokk_10`=:b_10 WHERE `user_id`=:user_id
            ";
            // $sql = "INSERT INTO `books_info` (`id`, `user_id`, `bokk_1`, `bokk_2`, `bokk_3`) VALUES (:id, :user_id,:ba, :bb, :bc)";
            try{
            $pdo->query($sql);
            $pdo->bind(':term_name','year_94_95',PDO::PARAM_STR);
            $pdo->bind(':b_1',$main[0],PDO::PARAM_INT);
            $pdo->bind(':b_2',$main[1],PDO::PARAM_INT);
            $pdo->bind(':b_3',$main[2],PDO::PARAM_INT);
            $pdo->bind(':b_4',$main[3],PDO::PARAM_INT);
            $pdo->bind(':b_5',$main[4],PDO::PARAM_INT);
            $pdo->bind(':b_6',$main[5],PDO::PARAM_INT);
            $pdo->bind(':b_7',$main[6],PDO::PARAM_INT);
            $pdo->bind(':b_8',$main[7],PDO::PARAM_INT);
            $pdo->bind(':b_9',$main[8],PDO::PARAM_INT);
            $pdo->bind(':b_10',$main[9],PDO::PARAM_INT);
            $pdo->bind(':user_id',2,PDO::PARAM_INT);

            if($pdo->execute()){
                echo 'ture';
            }else{
                echo 'false';
            }
        }catch (PDOException $e) {
        //    echo $e->getMessage(); 
            }