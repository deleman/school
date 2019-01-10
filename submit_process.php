<?php
require_once('./lib/database.php');

class submit{
    private $pdo;
    private $sql="select";
    private $base =[1,2,3,null,null,null,null,null,null,null,null];
    private $main =Array();
    private $term_name;
    private $all_id_book=Array();
    private $all_name_book=Array();
    public function __construct(){
        $this->pdo= new Database();
    }
    //insert info to the database
    public function insert_info($info){
        //validate information inserted by user
        //1-user must select
        echo $this->sum_units($info['a']);
        if($this->sum_units($info['a'])>20){
            //alert your unit selected is greater than 20 || show error in modal code 5
            return ['code'=>5,'info'=>'تعداد واحدهای شما بیشتر از 20 است!!'];

        }else{

            if($this->is_repeat_selection($info['a'])){
                //your informaton is not reapret
            }else{
                //your informaion is repeat code 3
                return ['code'=>3,'info'=>'نام کتاب های شما تکراری است!!'];
            }
        }
        $this->term_name=null;
        //function for sum selected unit

        if(count($this->show_info())){
            //your are inserted before
            //should update it
            $this->term_name =array_shift($info['a']);
            $this->main=$info['a'];
            $count_info =count($info['a']);
            for($i=$count_info;$i<count($this->base);$i++){
                array_push($this->main,0);
            }

            // $info = $this->solve($info['a'],$this->main);
            $sql = "UPDATE `books_info` SET `term_name`=:term_name,`bokk_1`=:b_1,`bokk_2`=:b_2,
            `bokk_3`=:b_3,`bokk_4`=:b_4,
            `bokk_5`=:b_5,`bokk_6`=:b_6,`bokk_7`=:b_7, `bokk_8`=:b_8,
            `bokk_9`=:b_9,`bokk_10`=:b_10 WHERE `user_id`=:user_id
            ";
            try{
            $this->pdo->query($sql);
            $this->pdo->bind(':term_name',$this->term_name,PDO::PARAM_STR);
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
            $this->pdo->bind(':user_id',$_SESSION['user_id'],PDO::PARAM_INT);

            if($this->pdo->execute()){
                return ['code'=>4,'info'=>'اطلاعت شما با موفقیت ثبت گردید!!'];               
            }else{
                //code 7
                return ['code'=>7,'info'=>'خطایی در وارد کردن اطلاعات روی داده است!!'];
            }
        }catch (PDOException $e) {
        //    echo $e->getMessage(); 
            }
        }else{
            //you should insert data in to database
            $this->term_name =array_shift($info['a']);
            $this->main=$info['a'];
            $count_info =count($info['a']);
            for($i=$count_info;$i<count($this->base);$i++){
                array_push($this->main,0);
            }
            // $info = $this->solve($info['a'],$this->main);
            $sql = "INSERT INTO `books_info` (`user_id`,`term_name`, `bokk_1`, `bokk_2`, `bokk_3`, `bokk_4`, `bokk_5`, `bokk_6`, `bokk_7`, `bokk_8`, `bokk_9`, `bokk_10`) VALUES (:user_id,:term_name,:b_1,:b_2, :b_3, :b_4, :b_5, :b_6, :b_7, :b_8, :b_9, :b_10)";
            // $sql = "INSERT INTO `books_info` (`id`, `user_id`, `bokk_1`, `bokk_2`, `bokk_3`) VALUES (:id, :user_id,:ba, :bb, :bc)";
            try{
            $this->pdo->query($sql);
            $this->pdo->bind(':user_id',$_SESSION['user_id'],PDO::PARAM_INT);
            $this->pdo->bind(':term_name',$this->term_name,PDO::PARAM_STR);
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
                return ['code'=>4,'info'=>'اطلاعت شما با موفقیت ثبت گردید!!'];
            }else{
                return ['code'=>7,'info'=>'خطایی در وارد کردن اطلاعات روی داده است!!'];
            }
        }catch (PDOException $e) {
        //    echo $e->getMessage(); 
            }
        }

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
        array_shift($info);
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
    //return a book name
    function return_book_name($book_id){
        $book_id = htmlspecialchars(htmlentities(trim($book_id)));
        $this->term_name = htmlspecialchars(htmlentities(trim($this->term_name)));
        $sql = "SELECT * FROM $this->term_name WHERE id = :id";
        $this->pdo->query($sql);
        $this->pdo->bind(':id',$book_id);
        $result = $this->pdo->resultSet();
        return ($result);
    }

    //show all info books in array
    function show_all_book(){
        $all=Array();
        $count = count($this->show_info());
        $info =$this->show_info();
        for($i=0;$i<$count;$i++){
            $r=$this->return_book_name($info[$i]);
            array_push($all,$r);
        }
        return $all;
    }
    //show count user for every book
       public function get_user_id($i){
        $sql="select 1 from books_info where bokk_1=$i or
            bokk_2 =$i or bokk_3=$i or bokk_4=$i or bokk_5=$i or
            bokk_6=$i or bokk_7=$i or bokk_8=$i or bokk_9=$i or bokk_10 =$i";
            $this->pdo->query($sql);
            // $db->bind(':name',$name,PDO::PARAM_STR);
            // $db->bind(':lname',$lname,PDO::PARAM_STR);
            // $db->bind(':num',$number);
            $data =$this->pdo->resultSet();
            return count(($data));
                
        }
        //cycle throw books
        //return a count selecte book in array
        public function get_id_book_count(){
            $this->all_id_book=Array();
            $h=0;
            for($i=1;$i<100;$i++){
                // if(!$this->remove_empty_internal($this->get_user_id($i))){

                // }else{
                    array_push($this->all_id_book,$this->get_user_id($i));
                    $h++;
                // }
            }
            // print_r($this->all_id_book);
            return $this->all_id_book;
        }

        //function for convert code_book to name_book
        //return name of book in a array
        public function get_name_book_count(){
            //print_r($this->all_id_book);
            $this->all_name_book=Array();
            $c=count($this->all_id_book);

            for($i=$c-1;$i>=0;$i--){
                if($this->all_id_book[$i] ==0 || $this->all_id_book==''){
                    array_pop($this->all_id_book);
                }else{
                    break;
                }
            }

            foreach($this->all_id_book as $key => $value){
                
                
                $name = $this->return_book_name($key+1);
                array_push($this->all_name_book,$name);
            }
            return $this->all_name_book;
        }
        public function remove_empty_internal($value) {
            if(!empty($value)){
                if($value != 0){
                    return $value;
                }
            }
        }

        //retrive filted books_info base on selected option by user
        //filter book_info user
        public function filter_user_book_info(){
           $all=Array();
            foreach($this->all_name_book as $key=>$value){
                $show_all=Array();
                foreach($this->all_id_book as $k => $v){
                    if($value[0]->id == $k+1){
                        array_push($show_all,$value[0]->id);
                        array_push($show_all,$value[0]->book_name);
                        array_push($show_all,$v);
                    }
                }
                array_push($all,$show_all);
                
            }
            return $all;
        }
      
    function sum_units($info){
        $this->term_name = array_shift($info);
        $sum=0;
        foreach($info as $key => $value){

            if((($this->return_book_name($value))[0])->Theoretical_unit){
                $sum += ((($this->return_book_name($value))[0])->Theoretical_unit);
            }else{
                if((($this->return_book_name($value))[0])->Practical_unit ){
                    $sum += ((($this->return_book_name($value))[0])->Practical_unit);
                }
            }
        }
        return $sum;
    }

    function is_repeat_selection($info){
        array_shift($info);
        foreach($info as $key => $value){
            $n=$value;
            $count=0;
            foreach($info as $k => $v){
                if($n==$v){
                    $count++;
                }
            }
            if($count>=2){
                return false;
            }
        }
        return true;
    }
}



