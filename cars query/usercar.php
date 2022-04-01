<?php
include 'connect.php';

$id = $_POST['id'];

$sql = "SELECT cars.name, cars.mark, cars.color FROM users JOIN cars ON users.id=cars.user_id WHERE cars.user_id={$id} ORDER BY cars.name ASC";
$result=mysqli_query($con,$sql);
while($row=mysqli_fetch_assoc($result)){
    $name=$row['name'];
    $mark=$row['mark'];
    $color=$row['color'];

    echo '
    <tr>
        <td>'.$name.'</td>
        <td>'.$mark.'</td>
        <td>'.$color.'</td>
    </tr>
    ';
};
?>