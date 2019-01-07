<?php
require_once('./lib/database.php');


class process{
    private $db;
    public function __construct()
    {
        $this->db = new Database();
    }

    //get all table from database
    public function get_tables(){
        $sql = "SELECT table_name FROM information_schema.tables where table_schema='u1'";
        $this->db->query($sql);
        $r= $this->db->resultSet();
        $tables = Array();
        foreach ($r as $key => $value) {
            array_push($tables,$value->table_name);
        }
        return $tables;
        
    }

    //check for find specifec year in array
    public function is_exist_table($year){
        return in_array($year,$this->get_tables());
    }

    //retrive all data from specefic table year
    public function get_all_info($year,$tem_name=0,$all=false){
        $year = $this->validate_inpus($year);
        $term_name = $this->validate_inpus($tem_name);
        $sql;
        if($term_name){
            if($all==false){
                $sql = "SELECT * FROM $year WHERE term_name= $term_name";
            }else{
                $sql = "SELECT * FROM $year WHERE term_name != $term_name";

            }
        }else{
            $sql = "SELECT * FROM $year";
        }
        $this->db->query($sql);
        $r= $this->db->resultSet();
        $h=Array();
        foreach ($r as $key => $value) {
            array_push($h,$value->id);
            array_push($h,'کد '.$value->book_code);
            array_push($h,$value->book_name);
            array_push($h,'واحد نظری '.$value->Theoretical_unit);
            array_push($h,'واحد عملی '.$value->Practical_unit);
            array_push($h,' پیش نیاز '.$value->prerequisite);
            array_push($h,' نوع کتاب '.$value->book_type);
        }
        
        return $h;
    }
    public function validate_inpus($value){
        return htmlspecialchars(htmlentities(trim($value)));
    }
    
   
}

$proc = new process();
// echo '</pre>';
// echo $_POST['name'].'<br >';
// var_dump($proc->is_exist_table($_POST['name']));

if(isset($_POST['name'])){
    
    $a=($proc->get_all_info($_POST['name']));
    echo implode(',',$a);
    
    if(isset($_POST['term_name'])){
        if(strlen($_POST['term_name']) == 25){
            
        }else{
        $a=($proc->get_all_info($_POST['name'],$_POST['term_name']));
            
        $b=($proc->get_all_info($_POST['name'],$_POST['term_name'],true));
            
            echo implode(',',array_merge($a,$b));
        }

    }

}
