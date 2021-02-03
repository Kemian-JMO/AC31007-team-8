<!doctype html>
<html lang="en">

</html>
<?php
//Starts the session that's being used
  session_start();
  if ($_SESSION["loggedIn"] != "true") {
      header('Location: http://oai-content.co.uk');
  }

  $t = (date("Y.m.d"));
  @$fp=fopen("exportquestions/data_$username$t.txt", 'w');
  $data = array("agree","textdata","optradio","form");

      file_put_contents("exportquestions/data_$username$t.txt", serialize($data));

      $datas = unserialize(file_get_contents("data_$username$t.txt"));
?>
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

  <title>UoD Dashboard</title>
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
      <!-- nav bar -->

      <div class="clearfix"></div>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-md-12 text-center">
        <form id="questionnaire" action="AddtoDatabase.php" method="post">
            <h1 class="app-title">Questionnaire</h1>
            <div id="dynamicCheck">
              <div class="btn-group">
                  <button type="button" class="btn btn-primary" onclick="createNewFormElement();">Form</button>
                  <button type="button" class="btn btn-primary" onclick="createNewTextElement();">Small Text</button>
                  <button type="button" class="btn btn-primary">Multiple Choice</button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" id="dropdownMenuButton" >
                    <span class="caret"></span>
                  </button>

                  <button id="add_field" type="button" class="btn btn-primary">test</button>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" onclick="createNewMC2Element(2);" href="#">2</a>
                    <a class="dropdown-item" onclick="createNewMC2Element(3);" href="#">3</a>
                    <a class="dropdown-item" onclick="createNewMC2Element(4);" href="#">4</a>
                  </div>
                  <button type="button" class="btn btn-primary">Checkboxes</button>
            </div>
            <div id="newElementId">New inputbox goes here:</div>
            <input type="text" name = "testing"> trest</input>
            <input type="submit" name="submit" value="submit" class="btn btn-primary">Submit</input>
          </div>
          </form>
      </div>
    </div>
  </div>

            <script type="text/JavaScript">

            var counter = 0;

	           $(function(){
               $('#add_field').click(function(){
                 counter += 1;
                 $('#newElementId').append(
                   '<strong>Hobby No. ' + counter + '</strong><br />'
                   + '<input id="field_' + counter + '" name="dynfields[]' + '" type="text" /><br />' );
	                });
                });


                function setAttribute(newID) {
                  $('tempIDdiv').attr('data-IDElement',newID);
                }
                //This creates a new Form Element
                function createNewFormElement() {
                // First create a DIV element.
                var txtNewInputBox = document.createElement('div');
                // Then add the content (a new input box) of the element.
                txtNewInputBox.innerHTML = "<div id ='tempIDdiv' data-IDElement ='temp' class='card'><label class='title-question'><input type='Question' class='form-control' id='tempID' placeholder='Enter Question here' name='formQuestion'><div  contenteditable= 'true'> </div></label><textarea class=answer-text rows= '5' cols = '80' placeholder = Hello im a form></textarea></div>";
                // Finally put it where it is supposed to appear.
                document.getElementById("newElementId").appendChild(txtNewInputBox);
                // Now the ID Script needs to run
                var newID = Date.now()
                setAttribute(newID);
                var div = document.getElementById("tempIDdiv") //find id for div
                div.setAttribute("id", 'newID'); //set id for div
              //  var div = document.getElementById("tempID")
              //  div.setAttribute("tempID" + newID); // Set temp+ID for ID. TODO: the tempID should be then renamed to the question that was inputted by the user!
                console.log(newID);
                }

                //This creates a new text Element
                function createNewTextElement() {
                // First create a DIV element.
                var txtNewInputBox = document.createElement('div');
                // Then add the content (a new input box) of the element.
                txtNewInputBox.innerHTML = "<div id ='tempIDdiv' data-IDElement ='temp' div class='card'><label class='title-question'><input type='Question' class='form-control' id='tempID' placeholder='Enter Question here' name='textQuestion'><div  contenteditable= 'true'> </div></label><input type='Ans'class='form-control' id='// QUESTION: ' placeholder = 'hello'></textarea></div>";
                // Finally put it where it is supposed to appear.
                document.getElementById("newElementId").appendChild(txtNewInputBox);
                // Now the ID Script needs to run
                var newID = Date.now()
                setAttribute(newID);
                var div = document.getElementById("tempIDdiv") //find id for div
                div.setAttribute("id", 'newID'); //set id for div
              //  var div = document.getElementById("tempID")
              //  div.setAttribute("tempID" + newID); // Set temp+ID for ID. TODO: the tempID should be then renamed to the question that was inputted by the user!
                console.log(newID);
              }

              //This creates a Multiple choice Element
            function createNewMC2Element(amountOfChoices) {
                  // First create a DIV element.
              var txtNewInputBox = document.createElement('div');
              console.log(amountOfChoices);

              if (amountOfChoices == 2) {
                // Then add the content (a new input box) of the element.
                txtNewInputBox.innerHTML = "<div id ='tempIDdiv' data-IDElement ='temp' div class='card'><input type='Question' class='form-control' id='tempID' placeholder='Enter Question here' name='mult2Question'><input type='radio' id='answer1' name='multichoice2' value='answer1'><label for='answer1'><input type = 'Question' placeholder = 'answer 1'></input></label><br><input type='radio' id='answer2' name='multichoice2' value='answer2'> <label for='answer2'><input type = 'Question' placeholder = 'answer 2'></input></label><br></div>";
                console.log("oh no 2");
              }
              else if (amountOfChoices == 3) {
                // Then add the content (a new input box) of the element.
                txtNewInputBox.innerHTML = "<div id ='tempIDdiv' data-IDElement ='temp' div class='card'><input type='Question' class='form-control' id='tempID' placeholder='Enter Question here' name='mult3Question'><input type='radio' id='answer1' name='multichoice3' value='answer1'><label for='answer1'><input type = 'Question' placeholder = 'answer 1'></input></label><br><input type='radio' id='answer2' name='multichoice3' value='answer2'> <label for='answer2'><input type = 'Question' placeholder = 'answer 2'></input></label><br><input type='radio' id='answer3' name='multichoice3' value='answer3'> <label for='answer3'><input type = 'Question' placeholder = 'answer 3'></input></label><br></div>";
                console.log("oh no 3");
              }
              else if (amountOfChoices == 4) {
                // Then add the content (a new input box) of the element.
                txtNewInputBox.innerHTML = "<div id ='tempIDdiv' data-IDElement ='temp' div class='card'><input type='Question' class='form-control' id='tempID' placeholder='Enter Question here' name='mult4Question'><input type='radio' id='answer1' name='multichoice4' value='answer1'><label for='answer1'><input type = 'Question' placeholder = 'answer 1'></input></label><br><input type='radio' id='answer2' name='multichoice4' value='answer2'> <label for='answer2'><input type = 'Question' placeholder = 'answer 2'></input></label><br><input type='radio' id='answer3' name='multichoice4' value='answer3'> <label for='answer3'><input type = 'Question' placeholder = 'answer 3'></input></label><br><input type='radio' id='answer4' name='multichoice4' value='answer4'> <label for='answer4'><input type = 'Question' placeholder = 'answer 4'></input></label><br></div>";
                console.log("oh no 4");
              }
              // Finally put it where it is supposed to appear.
              document.getElementById("newElementId").appendChild(txtNewInputBox);
              // Now the ID Script needs to run
              var newID = Date.now()
              setAttribute(newID);
              var div = document.getElementById("tempIDdiv") //find id for div
              div.setAttribute("id", 'newID'); //set id for div
            //  var div = document.getElementById("tempID")
            //  div.setAttribute("tempID" + newID); // Set temp+ID for ID. TODO: the tempID should be then renamed to the question that was inputted by the user!
              console.log(newID);;
            }

            </script>
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
