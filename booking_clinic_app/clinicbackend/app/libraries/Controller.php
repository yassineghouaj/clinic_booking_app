<?php


class Controller{
 
public $data=[];



  public function  index(){
     
  }
  public function model($model){
    require_once '../app/models/'.$model.'.php';
    return new $model();
  }

  
   
}



?>