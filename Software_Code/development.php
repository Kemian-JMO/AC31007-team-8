<script type="text/javascript" src="file.js"></script>
<head>

<div class="form-group">
<div name="title-question" id="temp"><b>uwu this better work</b>
    <input type="email" class="form-control" placeholder="Enter email" id="email">
  </div>
  <script>
    var newID = innerID;
    callRefresh();
    var div = document.getElementById("temp")
    div.setAttribute("id", newID);
    console.log(newID)

  function callRefresh() {
            setInterval(function(){
            innerID++;
    }, 1000)
  }

  </script>
