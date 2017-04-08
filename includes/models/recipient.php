<?php
//class for Recipients
class Recipient extends DatabaseObject{
  protected static $table_name = "recipient";
  protected static $db_fields =
    array("receip_id", "appl_id", "email", "name", "mode_of_delivery", "telephone",
          "region", "address", "country", "pcode", "zcode", "fax", "status");
  protected $receip_id;
  protected $appl_id;
  protected $email;
  protected $name;
  protected $mode_of_delivery;
  protected $telephone;
  protected $region;
  protected $address;
  protected $country;
  protected $pcode;
  protected $zcode;
  protected $fax;
  protected $status;

  public function name(){
    return $this->name;
  }
}
?>
