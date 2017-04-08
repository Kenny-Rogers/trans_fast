<?php

class Transcript extends DatabaseObject{
  protected static $table_name = "transcript";
  protected  $file_loc = "../transcripts/";
  protected static $db_fields =
    array("id", "file_name", "generated_for", "generated_by", "date_generated");
  protected $id;
  protected $file_name;
  protected $generated_for;
  protected $generated_by;
  protected $date_generated;

  public static function make($file_name, $generated_for, $generated_by){
        //creates the transcript record
    if (!empty($file_name) && !empty($generated_for) && !empty($generated_by)) {
        $new_transcript = new Transcript();
        $new_transcript->file_loc = $file_name;
        $new_transcript->generated_for = $generated_for;
        $new_transcript->generated_by = $generated_by;
        $new_transcript->date_generated = Strftime("%y-%m-%d %H:%M:%S", time());
        return $new_transcript;
      } else {
        return false;
      }
  }

  public function get_trans_file(){
    //return the location of transcript file
    return "../transcripts/test.pdf";
  }
}
?>
