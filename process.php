<?php
require_once('./lib/database.php');
if(isset($_POST['name'])){
    // echo 'you are sented '.$_POST['name'];
}else{
    // echo 'your are not sent anything';
}

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
    public function get_all_info($year){
        $year = trim(htmlspecialchars($year));
        $sql = "SELECT * FROM $year";
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
        
        echo implode(',',$h);
    }
    
   
}

$proc = new process();
// echo '</pre>';
// echo $_POST['name'].'<br >';
// var_dump($proc->is_exist_table($_POST['name']));

($proc->get_all_info($_POST['name']));
