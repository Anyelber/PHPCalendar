<?php
require_once('vendor/autoload.php');
use AnySlehider\PHPCalendar\PHPCalendar;

$calendar = new PHPCalendar();
$calendar->setConfig(array(
  //form data
   'form_action_url' => '',

   //db data
   'db_host'=>'localhost',
   'db_user'=>'root',
   'db_password'=>'',
   'db_name'=>'PHPCalendar',
));
$calendar->initCalendar('calendar');


if(isset($_POST["save_event_anycal"])){
    $calendar->saveEvent(
        $_POST["event_name_anycal"],
        $_POST["event_date_anycal"]
    );  
}
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8'/>
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>