<?php
require_once('./lib/database.php');

class sign{
    
    public $db;
    public $name;
    public $lname;
    public $number;
    public $subscriber;
    public function __construct()
    {
        $this->db = new Database();
    }
    
    public function validate_user($new){
        if($this->subscriber){
            // header("Location: $old");
        }else{
            header("Location: $new");
        }
    }
    public function is_subscriber($infos){
        $data = $this->get_all_infos();
        $user_infos =array();
        foreach($data as $key => $value){
            array_push($user_infos,$value->name);
            array_push($user_infos,$value->fname);
            array_push($user_infos,$value->number);
        }
        $this->name = $this->validate_inpus($infos['name']);
        $this->lname = $this->validate_inpus($infos['lname']);
        $this->number = $this->validate_inpus($infos['number']);
        $_SESSION['user_id']=($this->get_user_id());
        //if data in database or validate
        if(in_array($this->name,$user_infos)){
            // echo 'name is <br >';
            if(in_array($this->lname,$user_infos)){
                // echo 'lname is <br >';
                if(in_array($this->number,$user_infos)){
                    // echo 'number is <br >';
                    $this->subscriber = true;
                }else{
                    $this->subscriber = false;

                }
            }else{
                $this->subscriber = false;                
            }
        }else{
            $this->subscriber = false;
        }
        return $this->subscriber;
        //if data was not in database
    }

    public function get_all_infos(){
        $sql = "SELECT * FROM users";
        $this->db->query($sql);
       return $this->db->resultSet();
          
    }

    public function validate_inpus($value){
        return htmlspecialchars(htmlentities(trim($value)));
    }

    public  function get_user_id(){
        //     $sql = "SELECT * FROM users";
        //     $db->query($sql);
        //    return $db->resultSet();
        $sql = "SELECT id FROM users WHERE name=:name and fname=:lname and number=:num";
                $this->db->query($sql);
                $this->db->bind(':name',$this->name,PDO::PARAM_STR);
                $this->db->bind(':lname',$this->lname,PDO::PARAM_STR);
                $this->db->bind(':num',$this->number);
                $data =$this->db->resultSet();
            foreach ($data as $key => $value) {
                return $_SESSION['user_id'] = ($value->id);  
            }
                
        }
        
        public function go(){
            echo $this->name;
        }


}