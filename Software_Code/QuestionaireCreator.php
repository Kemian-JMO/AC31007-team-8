<!doctype html>
<html lang="en">
  ...
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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script type="text/javascript" src="file.js"></script>
  <link rel="stylesheet" href="Creator.css">
  <meta name="viewport" content="width=device-width, initial-scale=1"
</head>
<body>
          <form id="questionnaire">
              <h1 class="app-title">Questionnaire</h1>
              <div id="dynamicCheck">
                <div class="btn-group">
                    <button type="button" class="btn btn-primary" onclick="createNewFormElement();">Form</button>
                    <button type="button" class="btn btn-primary" onclick="createNewTextElement();">Small Text</button>
                    <button type="button" class="btn btn-primary">Multiple Choice</button>
                    <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown" id="dropdownMenuButton" >
                      <span class="caret"></span>
                    </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                      <a class="dropdown-item" onclick="createNewMC2Element(2);" href="#">2</a>
                      <a class="dropdown-item" onclick="createNewMC2Element(3);" href="#">3</a>
                      <a class="dropdown-item" onclick="createNewMC2Element(4);" href="#">4</a>
                    </div>
                    <button type="button" class="btn btn-primary">Checkboxes</button>
              </div>
              <div id="newElementId">New inputbox goes here:</div>
              <input type="submit" name="" value="">
            </div>
            </form>



            <script type="text/JavaScript">


                //This creates a new Form Element
                function createNewFormElement() {
                // First create a DIV element.
                var txtNewInputBox = document.createElement('div');
                // Then add the content (a new input box) of the element.
                txtNewInputBox.innerHTML = "<div class='card'><label class='title-question' h1 id='temp'><input type='Question' class='form-control' id='// QUESTION: ' placeholder='Enter Question here' name='Question'><div  contenteditable= 'true'> </div></label><textarea class=answer-text rows= '5' cols = '80' placeholder = Hello im a form></textarea></div>";
                // Finally put it where it is supposed to appear.
                document.getElementById("newElementId").appendChild(txtNewInputBox);
                // Now the ID Script needs to run
                var newID = innerID;
                callRefresh();
                var div = document.getElementById("temp")
                div.setAttribute("id", newID);
                console.log(newID);
                }

                //This creates a new text Element
                function createNewTextElement() {
                // First create a DIV element.
                var txtNewInputBox = document.createElement('div');
                // Then add the content (a new input box) of the element.
                txtNewInputBox.innerHTML = "<div class='card'><label class='title-question' h1 id='temp'><input type='Question' class='form-control' id='// QUESTION: ' placeholder='Enter Question here' name='Question'><div  contenteditable= 'true'> </div></label><input type='Ans'class='form-control' id='// QUESTION: ' placeholder = 'hello'></textarea></div>";
                // Finally put it where it is supposed to appear.
                document.getElementById("newElementId").appendChild(txtNewInputBox);
                // Now the ID Script needs to run
                var newID = innerID;
                callRefresh();
                var div = document.getElementById("temp");
                div.setAttribute("id", newID);
                console.log(newID)
              }

              //This creates a Multiple choice Element
            function createNewMC2Element(amountOfChoices) {
                  // First create a DIV element.
              var txtNewInputBox = document.createElement('div');
              console.log(amountOfChoices);

              if (amountOfChoices == 2) {
                // Then add the content (a new input box) of the element.
                txtNewInputBox.innerHTML = "<div class='card'><input type='Question' class='form-control' id='// QUESTION: ' placeholder='Enter Question here' name='Question'></input><br><input type = 'Question' placeholder = 'answer 1' name = 'mc2answer1'></input><br><input type = 'Question' placeholder = 'answer 2' name = 'mc2answer2'></input><br></div>";
                console.log("oh no 2");
              }
              else if (amountOfChoices == 3) {
                // Then add the content (a new input box) of the element.
                txtNewInputBox.innerHTML = "<div class='card'><input type='Question' class='form-control' id='// QUESTION: ' placeholder='Enter Question here' name='Question'></input><br><input type = 'Question' placeholder = 'answer 1' name = 'mc3answer1'></input><br><input type = 'Question' placeholder = 'answer 2' name = 'mc3answer2'><input type = 'Question' name = 'mc3answer3' placeholder = 'answer 3'></input><br></div>";
                console.log("oh no 3");
              }
              else if (amountOfChoices == 4) {
                // Then add the content (a new input box) of the element.
                txtNewInputBox.innerHTML = "<div class='card'><input type='Question' class='form-control' id='// QUESTION: ' placeholder='Enter Question here' name='Question'></input><br><input type = 'Question' placeholder = 'answer 1' name = 'mc4answer1'></input><br><input type = 'Question' placeholder = 'answer 2' name = 'mc4answer2'><input type = 'Question' placeholder = 'answer 3' name = 'mc4answer3'></input><br><input type = 'Question' placeholder = 'answer 4' name = 'mc4answer4'></input><br></div>";
                console.log("oh no 4");
              }
              // Finally put it where it is supposed to appear.
              document.getElementById("newElementId").appendChild(txtNewInputBox);
              // Now the ID Script needs to run
              var newID = innerID;
              callRefresh();
              var div = document.getElementById("temp")
              div.setAttribute("id", newID);
              console.log(newID);
            }

function callRefresh() {
                  setInterval(function(){
                  innerID++;
                  }, 1000)
            }

            innerID(callRefresh());

            </script>



      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>
