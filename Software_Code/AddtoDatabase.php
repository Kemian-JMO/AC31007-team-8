<p>ag</p>
<?php

session_start();
if ($_SESSION["loggedIn"] != "true") {
    header('Location: http://oai-content.co.uk');
}

?>

<?php

$_SESSION['nameIn'] = $_POST['name'];
$nameIn = $_SESSION['nameIn'];

//Connect to database
$conn = new mysqli("oaicontezoagile.mysql.db","oaicontezoagile","M5fgq184HDVu","oaicontezoagile");
if ($conn -> connect_errno) {
  echo "<br>Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script type="text/javascript" src="./script.js"></script>
    <script type="text/javascript" src="file.js"></script>
    <title>UoD Questionaire Creator</title>
  </head>
  <body id="bodyQuestion">
    <div class="navbar navbar-site navbar-default" role="navigation">
        <div class="navbar-main">
            <div class="container">
                <div class="row">
                    <div class="navbar-header">
                        <div class="logo-group clearfix">
                            <img src="img_UoDLogo.jpg" alt="logo" style="max-width:70%;">
                        </div>
                    </div>
                    <div class="navbar-collapse collapse navbar-responsive-collapse-1">
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="http://oai-content.co.uk/dashboard.php">Dashboard</a></li>
                            <li><a href="http://oai-content.co.uk/logout.php">
                              Sign Out,
                              <?php
                                echo $_SESSION["username"] . " (" . $_SESSION["role"] . ")";
                              ?>
                            </a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <div class="card">
            <p style="text-align:center;"> This questionaire has been added to the database. Please wait whilst you are redirected to the Dashboard</p>
          </div>
        </div>
      </div>
    </div>
<strong>
    <?php

   if (isset($_POST['submit']))
    {
      echo "1";
/
      if (isset($_POST['questionnaireTitle'])) {

        $name = $_POST['questionnaireTitle'];

        $query = "CALL CreateNewQuestionnaire(\"$name\")";
        $queryOutput = $conn->query($query);
        $query = "CALL getQuestionnaireIDFromName(\"$name\")";
        $questionnaireID = $conn->query($query);
        echo "4";
      }

      if ($_POST['formQuestion']) {


      	foreach ( $_POST['formQuestion'] as $key => $value ) {

          $query = "CALL CreateQuestion(\"$qNID\",\"$value\",\"Text\")";
          $queryOutput = $conn->query($query);


      }
    }
/*

        if ($_POST['mult2Question']) {
        foreach ( $_POST['mult2Question'] as $key => $value ) {
$_POST['mult2ans1'] = $ans1;
$_POST['mult2ans2'] = $ans2;
          var_dump($_POST['mult2ans2']);
          echo "  ah   ";
          var_dump($key);
          var_dump($value);
          echo "  no   ";
          var_dump($ans1);
          echo "    answer 1 = ";
          var_dump($ans1[$key]);
          var_dump($ans2);
          echo "    answer 2 = ";
          var_dump($ans2[$key]);
        }
/*


        foreach ( $_POST['mult2ans1'] as $key => $value ) {

          var_dump($value);
          var_dump($_POST['mult2ans1']);
        }



        foreach ( $_POST['mult2ans2'] as $key => $value ) {

          var_dump($value);
          var_dump($_POST['mult2ans2']);
        }
*/
      }

/*
        if (isset($_POST['mult3Question'])) {

          foreach ( $_POST['mult3Question'] as $key => $value ) {

            var_dump($value);
            var_dump($_POST['mult3Question']);
          }



          foreach ( $_POST['mult3ans1'] as $key => $value ) {

            var_dump($value);
            var_dump($_POST['mult3ans1']);
          }



          foreach ( $_POST['mult3ans2'] as $key => $value ) {

            var_dump($value);
            var_dump($_POST['mult3ans2']);
          }



          foreach ( $_POST['mult3ans3'] as $key => $value ) {

            var_dump($value);
            var_dump($_POST['mult3ans3']);
          }}



          if (isset($_POST['mult4Question'])) {

            foreach ( $_POST['mult4Question'] as $key => $value ) {

              var_dump($value);
              var_dump($_POST['mult4Question']);
            }
            foreach ( $_POST['mult4ans1'] as $key => $value ) {

              var_dump($value);
              var_dump($_POST['mult4ans1']);
            }
            foreach ( $_POST['mult4ans2'] as $key => $value ) {

              var_dump($value);
              var_dump($_POST['mult4ans2']);
            }
            foreach ( $_POST['mult4ans3'] as $key => $value ) {

              var_dump($value);
              var_dump($_POST['mult4ans3']);
            }
            foreach ( $_POST['mult4ans4'] as $key => $value ) {

              var_dump($value);
              var_dump($_POST['mult4ans4']);
            }
          }
*/
        }





     ?>
</strong>
     <?php
/*
   	 if (isset($_POST['submit'])) {
       if ($_POST['dynfields']) {
         foreach ( $_POST['dynfields'] as $key=>$value ) {
   	       //$values = mysql_real_escape_string($value);
   	       //$query = mysql_query("INSERT INTO my_hobbies (hobbies) VALUES ('$values')", $connection );
   	       var_dump($value);
         }
     	 }
       echo "<i><h2><strong>" . count($_POST['dynfields']) . "</strong> Hobbies Added</h2></i>";
   	   //mysql_close();
     }
     */
    ?>
     <p>hih</p>
  </body>
</html>
