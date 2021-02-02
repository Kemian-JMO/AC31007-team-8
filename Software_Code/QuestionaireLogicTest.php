<!DOCTYPE html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script type="text/javascript" src="file.js"></script>
<?php

//Starts the session that's being used

  session_start();

  if($_SESSION["loggedIn"] != "true"){

    header('Location: http://oai-content.co.uk');

  }

?>

<html>

<head>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <title>QuestionaireLogicTest</title<!DOCTYPE html>

<?php

//Starts the session that's being used

  session_start();

  if($_SESSION["loggedIn"] != "true"){

    header('Location: http://oai-content.co.uk');

  }

?>

<html>

<head>

    <title>QuestionaireLogicTest</title>



    <style type="text/css">

        body {

            font-family: sans-serif;

            background-color: #dedede;

            color: #333;

            padding: 20px 0 28px 0;

            margin: 0;

        }



        img {

            max-width: 100%;

            height: auto;

        }



        .app-title {

            text-align: center;

            font-weight: normal;

            font-size: 2.6rem;

        }



        .card {

            max-width: 650px;

            padding: 20px;

            margin: 30px auto;

            background-color: #fff;

            box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.1);

            overflow: hidden;

        }



            .card h4 {

                margin: 0 0 6px 0;

            }



        .pet-photo {

            float: left;

            width: 40%;

            margin-right: 15px;

        }



        .title-question {

            font-size: 2rem;

            font-weight: normal;

            margin: 0 0 1rem 0;

        }



        .species {

            font-size: 0.9rem;

            color: #888;

            vertical-align: middle;

        }



        .foods-list {

            margin: 0;

            padding: 0;

            position: relative;

            left: 17px;

            font-size: 0.85rem;

            line-height: 1.5;

        }



        .footer {

            font-size: 0.7rem;

            color: #888;

            text-align: center;

            margin: 0;

        }



        .answer-text {

            resize: vertical;

        }

    </style>

</head>



<body>



    <div>

        <form id="questionnaire">

            <h1 class="app-title">Questionnaire</h1>





            <div id="newElementId">New inputbox goes here:</div>



            <div id="dynamicCheck">
              <div class="btn-group">
                  <button type="button" class="Create Text" onclick="createNewFormElement();">Form</button>
                  <button type="button" class="Create Text" onclick="createNewTextElement();">Small Text</button>
                  <button type="button" class="Create Text">Multiple Choice</button>
                  <button type="button" class="btn btn-primary dropdown-toggle dropdown-toggle-split" data-toggle="dropdown">
                    <span class="caret"></span>
                  </button>
                    <div class="dropdown-menu">
                    <a class="dropdown-item" href="#">2</a>
                    <a class="dropdown-item" href="#">3</a>
                    <a class="dropdown-item" href="#">4</a>
                  <button type="button" class="btn btn-primary">Checkboxes</button>
                  </div>

            </div>



        </form>

    </div>







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
        var div = document.getElementById("temp")
        div.setAttribute("id", newID);
        console.log(newID)
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
        var div = document.getElementById("temp")
        div.setAttribute("id", newID);
        console.log(newID)
        }

        //This creates a Multiple choice Element
        function createNewTextElement() {
        // First create a DIV element.
        var txtNewInputBox = document.createElement('div');
        // Then add the content (a new input box) of the element.
        txtNewInputBox.innerHTML = "<div class='card'><label class='title-question' h1 id='temp'><input type='Question' class='form-control' id='// QUESTION: ' placeholder='Enter Question here' name='Question'><div  contenteditable= 'true'> </div></label><input type='Ans'class='form-control' id='// QUESTION: ' placeholder = 'hello'></textarea></div>";
        // Finally put it where it is supposed to appear.
        document.getElementById("newElementId").appendChild(txtNewInputBox);
        // Now the ID Script needs to run
        var newID = innerID;
        var div = document.getElementById("temp")
        div.setAttribute("id", newID);
        console.log(newID)
        }


    </script>












</body>



 <!-- <div id="container"></div>
  <div>
    <button id="submit">Create radio button</button>
  </div>
  <script type="text/javascript">
    document.getElementById('submit').onclick = function() {
      var radiobox = document.createElement('input');
      radiobox.type = 'radio';
      radiobox.id = 'contact';
      radiobox.value = 'email';
      var label = document.createElement('label')
      label.htmlFor = 'contact';
      var description = document.createTextNode('Email');
      label.appendChild(description);
      var newline = document.createElement('br');
      var container = document.getElementById('container');
      container.appendChild(radiobox);
      container.appendChild(label);
      container.appendChild(newline);-->

    }

  </script>
