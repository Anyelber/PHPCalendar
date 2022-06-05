<?php
require_once('vendor/autoload.php');
use AnySlehider\PHPCalendary\PHPCalendary;

$calendar = new PHPCalendary();
$calendar->setConfig(array(
    
));
$calendar->initCalendar('calendar');
?>

<!DOCTYPE html>
<html lang='en'>
  <head>
    <meta charset='utf-8' />
  </head>
  <body>
    <div id='calendar'></div>
  </body>
</html>