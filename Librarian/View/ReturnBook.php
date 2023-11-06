<?php
	session_start();
	if (isset($_SESSION['userid'])) 
	{
    include '../template/admin_header.php';
		include "LoginHeader.php";
		include "Sidebar.php";
    
	}
	else
	{
    echo '<script>alert("Login First!")</script>';
    echo '<script>location.href="Login.php"</script>';
	}

 
 $check = 1;

 $bidErr = $uidErr = $idErr = $rdateErr = "";

 if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["bid"])) {
    $bidErr = "Book id is required";
    $check = 0;
  }

  if (empty($_POST["uid"])) {
    $uidErr = "User id is required";
    $check = 0;
  }

   if (empty($_POST["id"])) {
    $idErr = "Issue id is required";
    $check = 0;
  }

  if (empty($_POST["rdate"])) {
    $rdateErr = "Return date is required";
    $check = 0;
  }

 }

 if(isset($_POST["submit"]))  
  {
    if ($check == 1) { 
        $data['bid'] = $_POST["bid"];
        $data['uid'] = $_POST['uid'];
        $data['id'] = $_POST['id'];    
        $data['rdate'] = $_POST["rdate"];
        $data['status'] = "a";

        include '../Controller/Return.php';
        if( BookReturn($data)) {
          $message = "Book return Successfull!";
        }else {
          $message = "Book return Failed!";
        }

      }
    }


?>

<!DOCTYPE html>
<html>
<head>
	<title>Return Book</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  	<style>
		.error {color: #FF0000;}
	</style>

    <script>
    
    function ValidateReturnForm() {
      var bid = document.returnbook.bid.value;
      var uid = document.returnbook.uid.value;
      var id = document.returnbook.id.value;
      var rdate = document.returnbook.rdate.value;

      if (bid==null || bid==""){  
        alert("Book ID can't be blank");  
        return false;  
      }else if(uid==null || uid==""){  
          alert("User ID can't be blank");  
          return false;  
      }else if(id==null || id==""){  
          alert("Issue ID can't be blank");  
          return false;  
      }else if(rdate==null || rdate==""){  
          alert("Return date can't be blank");  
          return false;  
      }
    }

    function CheckBID() {
      if (document.getElementById("bid").value == "") {
          document.getElementById("bidErr").innerHTML = "Book ID can't be blank";
          document.getElementById("bidErr").style.color = "red";
          document.getElementById("bid").style.borderColor = "red";
      }else{
        document.getElementById("bidErr").innerHTML = "";
        document.getElementById("bid").style.borderColor = "black";
      }
    }

    function CheckUID() {
      if (document.getElementById("uid").value == "") {
          document.getElementById("uidErr").innerHTML = "User ID can't be blank";
          document.getElementById("uidErr").style.color = "red";
          document.getElementById("uid").style.borderColor = "red";
      }else{
        document.getElementById("uidErr").innerHTML = "";
        document.getElementById("uid").style.borderColor = "black";
      }
    }

    function CheckID() {
      if (document.getElementById("id").value == "") {
          document.getElementById("idErr").innerHTML = "Issue ID can't be blank";
          document.getElementById("idErr").style.color = "red";
          document.getElementById("id").style.borderColor = "red";
      }else{
        document.getElementById("idErr").innerHTML = "";
        document.getElementById("id").style.borderColor = "black";
      }
    }
  </script>
</head>
<body>
	<form method="post" enctype="multipart/form-data" name="returnbook" onsubmit="ValidateReturnForm()">
		<fieldset>
			<legend><b>RETURN BOOKS</b></legend>
      </br></br>
      <label>Book Name:</label>
<input type="text" name="" id="book_name" onkeyup="CheckBID()" onblur="CheckBID()">
<span class="error" id="bidErr"><?php echo $bidErr;?></span><hr>
<label>Book Id:</label>
<input type="text" name="bid" id="bid" readonly></br></br></br>



<script>
    function selectBook() {
        var bookList = document.getElementById("bookList");
        var bookId = bookList.options[bookList.selectedIndex].value;
        document.getElementById("bid").value = bookId;
    }

    let aData = {};

    $(document).ready(function() {
        $("#book_name").autocomplete({
            source: function(request, response) {
                $.ajax({
                    url: "../Model/fetch_3.php",
                    method: "GET",
                    dataType: "json",
                    success: function(data) {
                        aData = $.map(data, function(value, key) {
                            return {
                                id: value.bid,
                                label: value.bname,
                                bid: value.bid
                            };
                        });
                        var results = $.ui.autocomplete.filter(aData, request.term);
                        response(results);
                    }
                });
            },
            select: function(event, ui) {
                console.log(ui.item.bid);
                $('#bid').val(ui.item.bid);
            }
        });
    });
</script>

      		<label>User ID:</label>
      		<input type="text" name="uid" id="uid" onkeyup="CheckUID()" onblur="CheckUID()">
      		<span class="error" id="uidErr"><?php echo $uidErr;?></span><hr>

          <label>Issue ID:</label>
            <!-- <input type="text" name="id" id="id" onkeyup="CheckID()" onblur="CheckID()">
            <span class="error" id="idErr"><?php echo $idErr;?></span><hr> -->

            <select name="IssueList" id="IssueList" onchange="selectIssueId()">
              <option value="">Select an issue</option>
              <?php
                require_once '../Controller/issueList.php';
                $IssueList = fetchAllIssueId();
                foreach ($IssueList as $issueId => $issueName) {
                  echo "<option value='$issueId'>$issueName</option>";
                }
              ?>
            </select>
            <input type="text" name="id" id="id" readonly></br></br></br>

            <script>
              function selectIssueId() {
                var IssueList = document.getElementById("IssueList");
                var selectedIssueId = IssueList.options[IssueList.selectedIndex].value;
                document.getElementById("id").value = selectedIssueId;
              }
            </script>
            </br>









      		<label>Return Date:</label>
      		<input type="Date" name="rdate" id="rdate">
      		<span class="error" id="rdateErr"><?php echo $rdateErr;?></span><hr><br>
      		<input type="submit" name="submit" value="Submit">
      		<input type="reset" name="reset" value="Reset">







		</fieldset>
    <?php   
      if(isset($message))  
        {  
          echo $message;  
        }
    ?> 
    </form>
</body>

</html>
</table>
</br></br></br>
 <table>
<footer class="footer">
    <h4 class="footer_title"><h4>Welcome, Library...  </h4>
    <p class="head_foot_description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Non officiis quis nobis
        obcaecati amet sed unde delectus saepe modi ipsam!</p>
</footer>
</table>
