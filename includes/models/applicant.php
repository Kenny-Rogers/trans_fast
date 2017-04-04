<?php
//applicant Info
class Applicant extends DatabaseObject{
  protected static $table_name = "admin";
  protected static $db_fields =
    array("Id", "school_id", "first_name", "last_name", "password", "email",
          "telephone", "mode_of_delivery", "pace_of_processing", "date_applied",
          "date_delivered", "status");
  public $Id;
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
  protected $status;

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

  public static function get_list_by($check1 = "", $check2 = ""){
    //query string
    $sql = "";
    if (( $check1 == "paid" ) && (( $check2 == "express" ) || ( $check2 == "normal" ))){
      //for PAID Applicants EXPRESS OR NORMAL
      $sql = "SELECT * FROM applicant WHERE Id IN (SELECT paid_by FROM payment)
              AND pace_of_processing='$check2'";
    } elseif (( $check1 == "not_paid" ) && (( $check2 == "express" ) || ( $check2 == "normal" ))){
      //for NOT_PAID Applicants EXPRESS OR NORMAL
      $sql = "SELECT * FROM applicant WHERE Id NOT IN (SELECT paid_by FROM payment)
              AND pace_of_processing='$check2'";
    } elseif (( $check2 == "not_paid" ) && (( $check1 == "express" ) || ( $check1 == "normal" ))){
      //for EXPRESS OR NORMAL Applicants NOT_PAID
      $sql = "SELECT * FROM applicant WHERE Id NOT IN (SELECT paid_by FROM payment)
              AND pace_of_processing='$check1'";
    } elseif (( $check2 == "paid" ) && (( $check1 == "express" ) || ( $check1 == "normal" ))){
      //for EXPRESS OR NORMAL Applicants NOT_PAID
      $sql = "SELECT * FROM applicant WHERE Id IN (SELECT paid_by FROM payment)
              AND pace_of_processing='$check1'";
    } elseif (( $check2 == "Null" ) && (( $check1 == "express" ) || ( $check1 == "normal" ))){
      //for EXPRESS OR NORMAL Applicants
      $sql = "SELECT * FROM applicant WHERE pace_of_processing='$check1' AND
      Id IN (SELECT paid_by FROM payment)";
    } elseif (( $check1 == "paid" ) && ( $check2 == "Null" )){
      //for PAID Applicants
      $sql = "SELECT * FROM applicant WHERE Id IN (SELECT paid_by FROM payment)";
    } elseif (( $check1 == "not_paid" ) && ( $check2 == "Null" )){
      //for  NOT_PAID Applicants
      $sql = "SELECT * FROM applicant WHERE Id NOT IN (SELECT paid_by FROM payment)";
    } elseif ((( $check1 == "ems" ) || ( $check1 == "pick_up" ) || ( $check1 == "email" )) && ( $check2 == "Null" )){
      //for various delivery types
      $sql = "SELECT * FROM applicant WHERE Id IN (SELECT appl_id FROM recipient WHERE mode_of_delivery='$check1')";
    } else {
      //default
      $sql = "SELECT * FROM applicant ";
    }

    return $sql;
  }

  public static function find_next_page($check1 = "", $check2 = ""){
    //returns the next page to go
    $next_page = "";
    if (( $check1 == "paid" ) && (( $check2 == "express" ) || ( $check2 == "normal" ))){
      //for PAID Applicants EXPRESS OR NORMAL
      $next_page = "#";
    } elseif (( $check1 == "not_paid" ) && (( $check2 == "express" ) ||
                ( $check2 == "normal" ))){
      //for NOT_PAID Applicants EXPRESS OR NORMAL
      $next_page = "#";
    } elseif (( $check2 == "not_paid" ) && (( $check1 == "express" ) ||
                ( $check1 == "normal" ))){
      //for EXPRESS OR NORMAL Applicants NOT_PAID
      $next_page = "#";
    } elseif (( $check2 == "paid" ) && (( $check1 == "express" ) ||
                ( $check1 == "normal" ))){
      //for EXPRESS OR NORMAL Applicants NOT_PAID
      $next_page = "#";
    } elseif (( $check2 == "Null" ) && (( $check1 == "express" ) ||
                ( $check1 == "normal" ))){
      //for EXPRESS OR NORMAL Applicants
      $next_page = "create";
    } elseif (( $check1 == "paid" ) && ( $check2 == "Null" )){
      //for PAID Applicants
      $next_page = "#";
    } elseif (( $check1 == "not_paid" ) && ( $check2 == "Null" )){
      //for  NOT_PAID Applicants
      $next_page = "#";
    } elseif ((( $check1 == "ems" ) || ( $check1 == "pick_up" ) ||
            ( $check1 == "email" )) && ( $check2 == "Null" )){
      //for various delivery types
      $next_page = "send";
    } else {
      //default
      $next_page = "#";
    }
    return $next_page;
  }
}
?>
