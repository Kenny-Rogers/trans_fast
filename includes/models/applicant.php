<?php
//applicant Info
class Applicant{
  protected $table_name = "admin";
  protected $db_fields =
    array("school_id", "first_name", "last_name", "password", "email",
          "telephone", "mode_of_delivery", "pace_of_processing", "date_applied",
          "date_delivered");
  protected $school_id;
  protected $first_name;
  protected $last_name;
  protected $middle_name;
  protected $password;
  protected $email;
  protected $telephone;
  protected $mode_of_delivery;
  protected $pace_of_processing;
  protected $date_applied;
  protected $date_delivered;

  public static function authenticate($email="", $password=""){
    //validates username and password
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
    //returns full name of applicant
    if(isset($this->first_name)&&isset($this->last_name)||isset($this->middle_name)){
      return $this->first_name." ".$this->middle_name." ".$this->last_name;
    }else{
      return "";
    }
  }

  public function find_application_date(){
    //finds application date for an applicant
    if (isset($this->date_applied)) {
      return $this->date_applied;
    }else {
      return "";
    }
  }

  public function find_date_delivered(){
    //finds delivery mode for an applicant
    if (isset($this->date_delivered)) {
      return $this->date_delivered;
    }else {
      return "";
    }
  }

  public function find_processing_pace(){
    //finds delivery mode for an applicant
    if (isset($this->pace_of_processing)) {
      return $this->pace_of_processing;
    }else {
      return "";
    }
  }
}
?>
