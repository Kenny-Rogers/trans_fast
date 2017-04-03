<?php
//holds alll the info for the admin
class Admin{
  protected $table_name = "admin";
  protected $db_fields =
    array("user_id", "first_name", "last_name", "password", "email");
  private $user_id;
  private $first_name;
  private $last_name;
  private $password;
  private $email;


  public static function authenticate($email="", $password=""){
    //validates email and password
    global $database;
    $email=$database->escape_value($email);
    $password=$database->escape_value($password);
    $sql="SELECT * FROM ".$this->table_name." WHERE email='{$email}'
          AND password='{$password}' LIMIT 1";
    $result_array=self::find_by_sql($sql);
    //returns the first element in the array
    return !empty($result_array)?array_shift($result_array):false;
  }


  public function full_name(){
    //returns full name of admin
    if(isset($this->first_name)&&isset($this->last_name)){
      return $this->first_name." ".$this->last_name;
    }else{
      return "";
    }
  }

  public function register( $first_name, $last_name, $password, $email){
    //register administrators on to the system

  }

  public function change_password($old_password="", $new_password=""){
    //changing admin password
  }
}

?>
