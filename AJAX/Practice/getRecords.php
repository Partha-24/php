<!DOCTYPE html>
<html>
<body>

<?php

session_start();

$user = 'root';
$password = 'pphhpp';
$database = 'test';
$servername='localhost';

$mysqli = new mysqli($servername, $user, $password, $database);

$fetchDataQuery = "SELECT * FROM person";

$result = $mysqli->query($fetchDataQuery);
$output = "";
if(mysqli_num_rows($result) > 0){
    $output = '<table border="1" width="100%" cellspacing="0" cellpadding="10px">
                    <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Gender</th>
                        <th>Email</th>
                        <th>User Type</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>';

                    while($row = mysqli_fetch_array($result)) {
                        // if($row['email'] != $_SESSION['userEmail']){
                            $output .= "<tr>";
                            $output .= "<td>" . $row['id'] . "</td>";
                            $output .= "<td>" . $row['first_name'] . "</td>";
                            $output .= "<td>" . $row['last_name'] . "</td>";
                            $output .= "<td>" . $row['gender'] . "</td>";
                            $output .= "<td>" . $row['email'] . "</td>";
                            $output .= "<td>" . $row['usertype'] . "</td>";
                            $output .= "<td><button class='editBtn' data-id='{$row['id']}' data-fname='{$row['first_name']}' data-lname='{$row['last_name']}' data-gender='{$row['gender']}' data-email='{$row['email']}' data-usertype='{$row['usertype']}'>Edit</button></td>";
                            $output .= "<td><button class='deleteBtn' data-id='{$row['id']}' data-usertype='{$row['usertype']}'>Delete</button></td>";
                            $output .= "</tr>";
                        // }
                    }
    $output .= '</table>';
    echo $output;
}else{
    echo '<h2>No Record Found.</h2>';
}

echo "</table>";

?>
</body>
</html>