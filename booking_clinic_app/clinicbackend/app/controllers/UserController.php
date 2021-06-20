
<?php
class UserController extends Controller {
   
    public function __construct(){
     $this->UserModel=$this->model('UserModel');
    }

    public function register(){
        $register=$this->UserModel->register($this->data->nom,$this->data->email,$this->data->age,$this->data->pwd,$this->data->user_type);
        print_r(json_encode($register));
    }


    public function login(){
        $checkuser=$this->UserModel->login($this->data->email,$this->data->pwd);
    
         print_r(json_encode($checkuser));
       
    }

}


?>