<?php
//Starts the session that's being used
  session_start();
  if($_SESSION["loggedIn"] != "true"){
    header('Location: http://oai-content.co.uk');
  }
?>


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
  <script type="text/javascript" src="./script.js"></script>

  <title>UoD Answer Questionnaire</title>
</head>

<body>
  <!-- nav bar -->
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
                              echo $_SESSION["username"];
                            ?>
                          </a></li>
                      </ul>
                  </div>
              </div>
          </div>
      </div>
      <div class="clearfix"></div>
</div>
<!-- nav bar -->

      <div class="clearfix"></div>
</div>
  <div class="loginSection">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-xs-1">
           <!--Something on left maybe-->
        </div>
        <div id="loginCol" class="col-md-4 col-xs-10">
          <h1>
            <?php
            $_SESSION['nameIn'] = $_POST['name'];
            $nameIn = $_SESSION['nameIn'];

            //Connect to database
            $conn = new mysqli("oaicontezoagile.mysql.db","oaicontezoagile","M5fgq184HDVu","oaicontezoagile");
            if ($conn -> connect_errno) {
              echo "<br>Failed to connect to MySQL: " . $conn -> connect_error;
              exit();
            }
            //Run Query
           $SQLInput = "Call getQuestionnaireTitle(\"$nameIn\")";
           $queryOutput = $conn->query($SQLInput);
           //Output Results of query
           echo $queryOutput->fetch_object()->Name;
           $conn -> close();
           ?>
        </h1> <hr>
          <form action="/submitQuestionnaire.php" method="POST">

            <?php
              $idIn = $_POST['name'];
              //Connect to database
              $conn = new mysqli("oaicontezoagile.mysql.db","oaicontezoagile","M5fgq184HDVu","oaicontezoagile");
              if ($conn -> connect_errno) {
                echo "<br>Failed to connect to MySQL: " . $conn -> connect_error;
                exit();
              }
              $SQLInput = "Call getQuestionnairesQuestions(\"$idIn\")";
              $queryOutput = $conn->query($SQLInput);
              $conn -> close();

              if($queryOutput->num_rows > 0){
                while($row = $queryOutput->fetch_object()){
                  echo "<div class=\"form-group\">";
                  echo "<label for=\"{$row->Identifier}\">{$row->Question}</label>";

                  if($row->Type == "Text"){
                    echo "<input type=\"text\" class=\"form-control\" placeholder=\"Type Here\" id=\"{$row->Identifier}\" name = \"{$row->Identifier}\"><br><br>";
                  }

                  if($row->Type == "Likert"){
                    echo "<table style=\"width:100%; word-wrap: break-word\"><tr>";
                    echo "<td style=\"width:20%\"> <input type=\"radio\" id=\"StrongDisagree\" value=\"Strongly Disagree\" name = \"{$row -> Identifier}\"> <label for=\"StrongDisagree\">Strongly Disagree</label></th>";
                    echo "<td style=\"width:20%\"> <input type=\"radio\" id=\"Disagree\" value=\"Disagree\" name = \"{$row -> Identifier}\"> <label for=\"Disagree\">Disagree</label></th>";
                    echo "<td style=\"width:20%\"> <input type=\"radio\" id=\"Neutral\" value=\"Neutral\" name = \"{$row -> Identifier}\"> <label for=\"Neutral\">Neutral</label></th>";
                    echo "<td style=\"width:20%\"> <input type=\"radio\" id=\"Agree\" value=\"Agree\" name = \"{$row -> Identifier}\"> <label for=\"Agree\">Agree</label></th>";
                    echo "<td style=\"width:20%\"> <input type=\"radio\" id=\"StrongAgree\" value=\"Strongly Agree\" name = \"{$row -> Identifier}\"> <label for=\"StrongAgree\">Strongly Agree</label></th>";
                    echo "</tr></table>";
                  }

                  if($row->Type == "Multiple Choice"){
                    echo "<br>";
                    //Connect to database
                    $conn = new mysqli("oaicontezoagile.mysql.db","oaicontezoagile","M5fgq184HDVu","oaicontezoagile");
                    if ($conn -> connect_errno) {
                      echo "<br>Failed to connect to MySQL: " . $conn -> connect_error;
                      exit();
                    }
                    $MultipleChoiceSQLInput = "Call FindQuestionAnswers(\"{$row->Identifier}\")";
                    $MultipleChoiceQueryOutput = $conn->query($MultipleChoiceSQLInput);
                    $conn -> close();
                    if($MultipleChoiceQueryOutput == 0){
                      echo "<br>Query Unsuccessful. ";
                    }

                    if($MultipleChoiceQueryOutput->num_rows > 0){
                      while($MultipleChoiceRow = $MultipleChoiceQueryOutput->fetch_object()){
                        echo "<input type=\"radio\" id=\"{$MultipleChoiceRow -> Identifier}\" value={$MultipleChoiceRow -> Answer} name = \"{$row -> Identifier}\"> <label for=\"{$MultipleChoiceRow -> Identifier}\">{$MultipleChoiceRow -> Answer}</label><br>";
                      }
                    }else{
                      echo "No multiple choice answers were found";}
                    }
                  echo "</div>";
                }
              }else{
                echo '<h1>This questionnaire doesnt have any questions</h1>';
              }
            ?>
            <br><br>
            <button id="submitBtn"type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
        <div class="col-md-4 col-xs-1">
          <!--Something on right maybe-->
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>

</html>






<?php
/*
//The PHP for the form input
  if(isset($_POST['submitBtn']) && isset($_POST['name']))
  {
    $name = $_POST["name"];
    //Connect to server
    $conn = new mysqli("oaicontezoagile.mysql.db","oaicontezoagile","M5fgq184HDVu","oaicontezoagile");
    if ($conn -> connect_errno) {
      echo "<br>Failed to connect to MySQL: " . $conn -> connect_error;
      exit();
    }

    $SQLInput = "CALL DeleteUser(\"{$usernameIn}\")";
    $queryOutput = $conn->query($SQLInput);

    //Check if query ran
    if($queryOutput == true){
      echo "<script type='text/javascript'>alert('Delete Successfully');</script>";
      die();
    }
    echo "<script type='text/javascript'>alert('Delete Failed');</script>";
  }
  */
?>
