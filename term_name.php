<?php
require_once('./lib/database.php');

class term_name{
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
}

if(isset($_POST['name'])){
    // echo 'you are sented '.$_POST['name'];
}else{
    // echo 'your are not sent anything';
}

    