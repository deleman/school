<?php
require_once('./lib/database.php');

class submit{
    private $pdo;
    private $sql="select";
    private $main =[1,2,3,null,null,null,null,null,null,null,null];
    public function __construct(){
        $this->pdo= new Database();
    }
    //insert info to the database
    public function insert_info($info){
        print_r($info);
        $info = $this->solve($info['a'],$this->main);
        $sql = "INSERT INTO `books_info` (`user_id`,`term_name`, `bokk_1`, `bokk_2`, `bokk_3`, `bokk_4`, `bokk_5`, `bokk_6`, `bokk_7`, `bokk_8`, `bokk_9`, `bokk_10`) VALUES (:user_id,:term_name,:b_1,:b_2, :b_3, :b_4, :b_5, :b_6, :b_7, :b_8, :b_9, :b_10)";
        // $sql = "INSERT INTO `books_info` (`id`, `user_id`, `bokk_1`, `bokk_2`, `bokk_3`) VALUES (:id, :user_id,:ba, :bb, :bc)";
        try{
        $this->pdo->query($sql);
        $this->pdo->bind(':user_id',$_SESSION['user_id'],PDO::PARAM_INT);
        $this->pdo->bind(':term_name','',PDO::PARAM_INT);
        $this->pdo->bind(':b_1',$this->main[0],PDO::PARAM_INT);
        $this->pdo->bind(':b_2',$this->main[1],PDO::PARAM_INT);
        $this->pdo->bind(':b_3',$this->main[2],PDO::PARAM_INT);
        $this->pdo->bind(':b_4',$this->main[3],PDO::PARAM_INT);
        $this->pdo->bind(':b_5',$this->main[4],PDO::PARAM_INT);
        $this->pdo->bind(':b_6',$this->main[5],PDO::PARAM_INT);
        $this->pdo->bind(':b_7',$this->main[6],PDO::PARAM_INT);
        $this->pdo->bind(':b_8',$this->main[7],PDO::PARAM_INT);
        $this->pdo->bind(':b_9',$this->main[8],PDO::PARAM_INT);
        $this->pdo->bind(':b_10',$this->main[9],PDO::PARAM_INT);
        if($this->pdo->execute()){
            echo 'ture';
        }else{
            echo 'false';
        }
    }catch (PDOException $e) {
       echo $e->getMessage(); 
        }
        echo '<pre>';
        /* print_r($info);
        print_r($info[a]);  
        $this->sql += $this->solve_problom($info[a][2]); 
        echo $this->sql; */

    }
    public function solve_problom($problem){
        for($i=0;$i<=300;$i++){
            if($i == $problem){
                return "mybook". $i;
            }
        }
    }
    //get info from books_info 
    //show code selected by user
    public function show_info(){
        $sql = "SELECT * FROM books_info WHERE user_id = :user_id";
        $this->pdo->query($sql);
        $this->pdo->bind(':user_id',$_SESSION['user_id']);
        $result = $this->pdo->resultSet();
        $info = Array();
        foreach ($result as $key => $value) {
           
            array_push($info,$value->id);
            
            if($value->bokk_1){
                array_push($info,$value->bokk_1);
            }
            if($value->bokk_2){
                array_push($info,$value->bokk_2);  
            }
            if($value->bokk_3){
                array_push($info,$value->bokk_3);  
            }
            if($value->bokk_4){
                array_push($info,$value->bokk_4);
            }
            if($value->bokk_5){
                array_push($info,$value->bokk_5);
            }
            if($value->bokk_6){
                array_push($info,$value->bokk_6);
            }
            if($value->bokk_7){
                array_push($info,$value->bokk_7);
            }
            if($value->bokk_8){
                array_push($info,$value->bokk_8);
            }
            if($value->bokk_9){
                array_push($info,$value->bokk_9);
            }
            if($value->bokk_10){
                array_push($info,$value->bokk_10);    
            }

            
        }
        return ($info);
    }
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
    function return_book_name($book_id){
        $sql = "SELECT * FROM books_info WHERE user_id = :user_id";
        $this->pdo->query($sql);
        $this->pdo->bind(':user_id',$_SESSION['user_id']);
        $result = $this->pdo->resultSet();
    }
        
}



