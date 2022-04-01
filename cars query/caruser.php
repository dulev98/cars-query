<?php
include 'connect.php';

$sql = "SELECT cars.name, cars.mark, cars.color, users.first_name, users.last_name FROM `cars` JOIN `users` ON cars.user_id= users.id";

$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    $name=$row['name'];
    $mark=$row['mark'];
    $color=$row['color'];
    $fname=$row['first_name'];
    $lname=$row['last_name'];

    echo '
    <tr>
        <td>'.$name.'</td>
        <td>'.$mark.'</td>
        <td>'.$color.'</td>
        <td>'.$fname.'</td>
        <td>'.$lname.'</td>
    </tr>
    ';
};

?>