<?php
class UserModel{
    private $con;
    public function __construct(){
        $this->con=new Database();
    }
      public function register($nom,$email,$age,$pwd,$user_type){
        $options = [
            'cost' => 12,
        ];
            $this->con->query("SELECT * FROM users WHERE email= :email");
            $this->con->bind(':email',$email);
            $row=$this->con->getSingleResult();
            if($this->con->getRowCount()>0){
                return false;
            }else{
             
            $this->con->query("INSERT INTO `users` (`nom`,`age`, `email`, `pwd`, `user_type`) VALUES (:nom, :age,:email, :pwd, :user_type)");
            $this->con->bind(':nom',$nom);
            $this->con->bind(':age',$age);
            $this->con->bind(':email',$email);
            $this->con->bind(':user_type',$user_type);
            $this->con->bind(':pwd', PASSWORD_HASH($pwd, PASSWORD_BCRYPT, $options));
            if($this->con->execute()){
                return true;
            }else{
                return false;
            }
        }
    }
    
    public function login($email,$pwd){
       
        $this->con->query("SELECT * FROM `users` WHERE email= :email ");
        $this->con->bind(':email',$email);
        $row=$this->con->getSingleResult();
    
        
        if($row){
            if (password_verify($pwd,$row->pwd)) {
               
                $array['status']=true;
                $array['data']=$row;
                return  $array;
            }else{
                $array['status']="false2";
                return $array;
            }
          
        }else{
            $array['status']=false;
            return $array;
        }
    }
}

?>