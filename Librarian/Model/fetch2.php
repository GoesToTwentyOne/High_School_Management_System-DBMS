<?php
$connect = mysqli_connect("localhost", "root", "nihadgo75", "school");
$output = '';
if (isset($_POST["query"])) {
    $search = mysqli_real_escape_string($connect, $_POST["query"]);
    $query = "
    SELECT uid, name, balance
    FROM teacher
    WHERE uid LIKE '%" . $search . "%'
    UNION
    SELECT uid, name, balance
    FROM student
    WHERE uid LIKE '%" . $search . "%';
    
     ";
} else {
    $query = "
    SELECT  uid,name,balance FROM teacher
    UNION
    SELECT uid,name,balance FROM student;
    

    
    
     ";
}
$result = mysqli_query($connect, $query);
if (mysqli_num_rows($result) > 0) {
    $output .= '
       <table class="w3-table-all w3-hoverable">
          <tr class="w3-blue">
           <th>User Id</th>
           <th>Name</th>
           <th>Balance</th>
          </tr>
     ';
    while ($row = mysqli_fetch_array($result)) {
        $output .= '
       <tr>
        <td>' . $row["uid"] . '</td>
        <td>' . $row["name"] . '</td>
        <td>' . $row["balance"] . '</td>
       </tr>
      ';
    }
    echo $output;
} else {
    echo 'Data Not Found';
}
?>