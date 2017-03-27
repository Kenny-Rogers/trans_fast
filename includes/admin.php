<?php
//class to hold the admin information
class Admin extends DatabaseObject{
  //the db tablename for this class
  protected  static $tablename = "";
  protected static $db_fields[] = array('' => , );
  private $user_id;
  private $first_name;
  private $last_name;
  private $email;
  private $password;

  //initialise all the variables
  private init(){
    $this->password = "";
    $this->email = "";
    $this->last_name = "";
    $this->first_name = "";
    $this->user_id = "";
  }

  //constructor for this class
  public function __construct(){
    init();
  }

  //authenticate Admin
  public function authenticate($email="", $password=""){
    //YET TODO::
  }

  //display fullname
  public function fullname(){
    if(isset($this->first_name)&&isset($this->last_name)){
      return $this->last_name." ".$this->first_name;
    }else{
      return "";
    }
  }

}
?>
