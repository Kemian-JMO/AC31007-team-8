<?php
session_start();
if ($_SESSION["loggedIn"] != "true") {
    header('Location: http://oai-content.co.uk');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>baaam</title>
  </head>
  <body>
    <p>hi</p>

    <?php

    if (isset($_POST['submit']))
    {
      $test = $_POST['testing'];
      if ($_POST['formQuestion']) {

      	foreach ( $_POST['formQuestion'] as $key=>$value ) {

          var_dump($_POST['formQuestion']);

      	//$values = mysql_real_escape_string($value);
      	//$query = mysql_query("INSERT INTO my_hobbies (hobbies) VALUES ('$values')", $connection );

      	}

      	}
      var_dump($_POST['testing']);
    }





     ?>

     <p>hih</p>
  </body>
</html>
