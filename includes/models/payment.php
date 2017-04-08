<?php
//class for payment
class Payment extends DatabaseObject{
  protected static $table_name = "payment";
  protected static $db_fields =
    array("pay_id", "invoice_id", "amount", "paid_by", "date_paid");
  protected $pay_id;
  protected $invoice_no;
  protected $amount;
  protected $paid_by;
  protected $date_paid;


}
?>
