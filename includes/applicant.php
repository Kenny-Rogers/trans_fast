<?php
//applicant for a transcript
class Applicant{
  protected $tablename;
  protected $db_fields;
  private $school_id;
  private $first_name;
  private $last_name;
  private $middle_name;
  private $email;
  private $telephone;
  private $mode_of_delivery;
  private $pace_of_processing;
  private $date_of_application;
  private $date_delivered;

  //initialise variables
  private init(){
    $this->school_id = 0;
    $this->first_name = "";
    $this->last_name = "";
    $this->middle_name = "";
    $this->email = "";
    $this->telephone = "";
    $this->mode_of_delivery = "";
    $this->pace_of_processing = "";
    $this->date_of_application = "";
    $this->date_delivered = "";
  }

  //constructor
  public function Applicant(){
    //TODO:: continue
  }

  //display fullname
  public function fullname(){
    if(isset($this->first_name)&&isset($this->last_name)
      ||isset($this->middle_name)){
      return $this->last_name." ".$this->first_name;
    }else{
      return "";
    }
  }

}
?>
