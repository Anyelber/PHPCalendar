<?php
require_once('../vendor/autoload.php');
use AnySlehider\PHPCalendar\PHPCalendar;

$calendar = new PHPCalendar();
$calendar->setConfig(array(
  //form data
   'form_action_url' => '',

   //db data
   'sql' => 'mysql',
   'db_host'=>'localhost',
   'db_user'=>'root',
   'db_password'=>'',
   'db_name'=>'PHPCalendar',

   //aditional info
   'delete_route' => '',
   'return_url' => 'default.php'
));
$calendar->initCalendar('calendar');


if(isset($_POST["save_event_anycal"])){
    $calendar->saveEvent(
        $_POST["event_name_anycal"],
        $_POST["event_date_anycal"]
    );  
}

if(isset($_GET['deleteAnyCalEvent'])){
  $calendar->deleteEvent($_GET['deleteAnyCalEvent']);
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