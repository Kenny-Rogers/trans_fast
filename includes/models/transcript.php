<?php

class Transcript extends DatabaseObject{
  protected static $table_name = "transcript";
  protected static $db_fields =
    array("trans_id", "file_loc", "generated_for", "generated_by", "date_generated");
  protected $trans_id;
  protected $file_loc;
  protected $generated_for;
  protected $generated_by;
  protected $date_generated;

  public static function make($file_loc="", $generated_for="", $generated_by=""){
        //creates the transcript record
    if !empty($file_loc)&&!empty($generated_for)&&!empty($generated_by) {
        $transcript = new Transcript();
        $transcript->file_loc = $file_loc;
        $transcript->generated_for = $generated_for;
        $transcript->generated_by = $generated_by;
        $transcript->date_generated = Strftime("%y-%m-%d %H:%M:%S", time());
        return $transcript;
      } else {
        return false;
      }
  }
}
?>
